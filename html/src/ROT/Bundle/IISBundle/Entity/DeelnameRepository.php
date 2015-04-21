<?php

namespace ROT\Bundle\IISBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Query;
use Doctrine\ORM\QueryBuilder;

class DeelnameRepository extends EntityRepository
{
    public function applyFilterToQueryBuilder($filter, $alias, QueryBuilder $qb) {

    }
    
    public function getIndexModificationTime() {
        $time = max($this->getEntityManager()->createQuery("
            SELECT MAX(d.updatedAt), MAX(b.updatedAt), MAX(s.updatedAt), MAX(sd.updatedAt), MAX(sdn.updatedAt), MAX(f.updatedAt), MAX(fd.updatedAt), MAX(fdn.updatedAt), MAX(be.updatedAt), MAX(bo.updatedAt), MAX(p.updatedAt) FROM ROTIISBundle:Deelname d
            JOIN d.boot b
			JOIN d.stuurman s
			JOIN s.deelnemer sd
			JOIN sd.nationaliteit sdn
			LEFT JOIN d.fokkemaat f
			LEFT JOIN f.deelnemer fd
			LEFT JOIN fd.nationaliteit fdn
			LEFT JOIN d.betaling be
			LEFT JOIN d.borg bo
			LEFT JOIN d.parkeerkaart p
        ")->getSingleResult(Query::HYDRATE_ARRAY));

        if ($time !== null) {
            return new \DateTime($time);
        }
    }

    public function getModificationTime($id) {
        return max($this->getEntityManager()->createQuery("
            SELECT d.updatedAt d_u, b.updatedAt b_u, s.updatedAt s_u, sd.updatedAt sd_u, sdn.updatedAt sdn_u, f.updatedAt f_u, fd.updatedAt fd_u, fdn.updatedAt fdn_u, be.updatedAt be_u, bo.updatedAt bo_u, p.updatedAt p_u FROM ROTIISBundle:Deelname d
            JOIN d.boot b
			JOIN d.stuurman s
			JOIN s.deelnemer sd
			JOIN sd.nationaliteit sdn
			LEFT JOIN d.fokkemaat f
			LEFT JOIN f.deelnemer fd
			LEFT JOIN fd.nationaliteit fdn
			LEFT JOIN d.betaling be
			LEFT JOIN d.borg bo
			LEFT JOIN d.parkeerkaart p
			WHERE d.id = :id
        ")->setParameter('id', $id)->getSingleResult(Query::HYDRATE_ARRAY));
    }

	public function findAllWithJoins() {
		return $this->getEntityManager()->createQuery('
			SELECT d, b, s, sd, sdn, f, fd, fdn FROM ROTIISBundle:Deelname d
			JOIN d.boot b
			JOIN d.stuurman s
			JOIN s.deelnemer sd
			JOIN sd.nationaliteit sdn
			LEFT JOIN d.fokkemaat f
			LEFT JOIN f.deelnemer fd
			LEFT JOIN fd.nationaliteit fdn
			LEFT JOIN d.betaling be
			LEFT JOIN d.borg bo
			LEFT JOIN d.parkeerkaart p
		')->getResult();
	}
	
	public function findOneByIdWithJoins($id) {
		return $this->getEntityManager()->createQuery('
			SELECT d, b, s, sd, sdn, f, fd, fdn, bo, be, v FROM ROTIISBundle:Deelname d
			JOIN d.boot b
			JOIN d.stuurman s
			JOIN s.deelnemer sd
			JOIN sd.nationaliteit sdn
			LEFT JOIN d.fokkemaat f
			LEFT JOIN f.deelnemer fd
			LEFT JOIN fd.nationaliteit fdn
			LEFT JOIN d.borg bo
			LEFT JOIN d.betaling be
			LEFT JOIN d.vereniging v
			WHERE d.id = ?1
		')->setParameter(1, $id)->getSingleResult();
	}

    public function generateStartnummers() {
        try{
        $em = $this->getEntityManager();
        $count = 0;

        $max_assigned_startnummer = $em->createQuery('
            SELECT MAX(d.startnummer) FROM ROTIISBundle:Deelname d
        ')->getSingleScalarResult();

        $next_startnummer = $max_assigned_startnummer === null ? 1 : $max_assigned_startnummer + 1;

        $deelnames = $this->findAll();
        foreach ($deelnames as $deelname) {
            if ($deelname->getStartnummer() === null && $deelname->getAangemeld() === true) {
                $deelname->setStartnummer($next_startnummer++);
                $em->persist($deelname);
                $count++;
            }
        }

        $em->flush();

        return $count;
        }
        catch(Exception $e)
        {
            return -1;
        }
    }
    
    public function generateHandmatig()
    {  
        try
        {
            $em = $this->getEntityManager();
            $persoon = $_POST['persoon'];
            $nummer = $_POST['nummer'];

            $deelnames = $this->findAll();
            $toegewezen = false;
            foreach ($deelnames as $deelname) {
                if ($deelname->getStartnummer() === null && $deelname->getAangemeld() === true && $deelname->getStuurman()->getDeelnemer()->getNaam() === "$persoon") {
                    $deelname->setStartnummer($nummer);
                    $em->persist($deelname); 
                    $toegewezen = true;
                }
                $em->flush();
            }
            if($toegewezen)
                return 1;
            else
                return 0;
        }
        catch(Exception $e)
        {
            return -1;
        }
        
    }
    
    public function resetStartnummers() {
        $em = $this->getEntityManager();
        $count = 0;

        $deelnames = $this->findAll();      
        foreach ($deelnames as $deelname) {
            if ($deelname->getStartnummer() !== null) {
            $deelname->setStartnummer(null);
            $em->persist($deelname);
            $count++;
            }
        }

        $em->flush();

        return $count;
    }

    public function updateFinishtijden($finishtijden) {
        $em = $this->getEntityManager();
        $count = 0;

        $deelnames = $this->findAll();
        foreach ($deelnames as $deelname) {
            $startnummer = $deelname->getStartnummer();
            if (isset($finishtijden[$startnummer])) {
                $deelname->setFinishtijd($finishtijden[$startnummer]);
                $em->persist($deelname);
                $count++;
            }
        }

        $em->flush();

        return $count;
    }
    
    public function updateFinishtijd($id,$finishtijd) {
        return;
        $em = $this->getEntityManager();
        
        $deelnames = $this->findAll();
        foreach ($deelnames as $deelname) {
            if($deelname->getId() == $id)
            {
                $deelname->setFinishtijd($finishtijd);
                $em->persist($deelname);
            }
        }

        $em->flush();
    }

    public function generateCorrectedfinishtijden() {
        $em = $this->getEntityManager();
        $count = 0;

        $deelnames = $this->getEntityManager()->createQuery('
            SELECT d, b FROM ROTIISBundle:Deelname d
            JOIN d.boot b
            WHERE d.finishtijd IS NOT NULL
            AND d.finishtijd > 0
        ')->getResult();

        foreach ($deelnames as $deelname) {
            $finishtijd = $deelname->getFinishtijd();
            if ($finishtijd) {
                $boot = $deelname->getBoot();
                if ($deelname->getSpinnaker()) {
                    $deelname->setGecorrigeerdefinishtijd(($finishtijd / $boot->getSpinnakerrating()) * 100);
                } else {
                    $deelname->setGecorrigeerdefinishtijd(($finishtijd / $boot->getNormalrating()) * 100);
                }
                $modrating = $deelname->getModrating();
                if ($modrating) {
                    $finishtijd = $finishtijd * ($modrating / 100);
                }
                $em->persist($deelname);
                $count++;
            }
        }

        $em->flush();

        return $count;
    }
    
    public function correctCorrectedFinishtijd($correctiefactor, $correctie)
    {
        
    }

    public function generateKlassen() {
        $em = $this->getEntityManager();
        $count = 0;

        $deelnames = $this->getEntityManager()->createQuery('
			SELECT d, b, s, sd, sdn, f, fd, fdn FROM ROTIISBundle:Deelname d
			JOIN d.boot b
			JOIN d.stuurman s
			JOIN s.deelnemer sd
			JOIN sd.nationaliteit sdn
			LEFT JOIN d.fokkemaat f
			LEFT JOIN f.deelnemer fd
			LEFT JOIN fd.nationaliteit fdn
			WHERE d.finishtijd IS NOT NULL
			AND d.finishtijd > 0
		')->getResult();
        
        //remove all klassen
        $klasse_repository = $em->getRepository('ROTIISBundle:Klasse');
        foreach ($klasse_repository->findAll() as $klasse) {
            $em->remove($klasse);
        }

        //split deelnames on dsq
        //snelle, tijdelijke oplossing
        $deelnamesNoDSQ = array();
        $deelnamesDSQ = array();
        
        foreach($deelnames as $deelname)
        {
            if($deelname->getUitzondering() === null)
            {
                array_push($deelnamesNoDSQ, $deelname);
            }
            else if($deelname->getUitzondering()->getId() === 2)
            {
                array_push($deelnamesDSQ, $deelname);
            }
        }
         
        /*
         * first 3 finishers
         */
        $first3_klasse = new Klasse();
        $first3_klasse->setNaam('First 3 Finishers');
        $first3_klasse->setType('Custom');
        foreach ($deelnamesNoDSQ as $deelname) {
            $first3_klasse->addDeelname($deelname);
        }
        if ($first3_klasse->getDeelnames()->count() > 0) {
            $em->persist($first3_klasse);
            $count++;
        }
        
        /*
         * Overall
         */
        $overall_klasse = new Klasse();
        $overall_klasse->setNaam('Overall');
        $overall_klasse->setType('Custom');
        foreach ($deelnamesNoDSQ as $deelname) {
            $overall_klasse->addDeelname($deelname);
        }
        if ($overall_klasse->getDeelnames()->count() > 0) {
            $em->persist($overall_klasse);
            $count++;
        }
       
        /*
         * Single-handed
         */
        $singleHanded_klasse = new Klasse();
        $singleHanded_klasse->setNaam("Single-Handed");
        $singleHanded_klasse->setType('Custom');
        foreach ($deelnamesNoDSQ as $deelname) {
            $fokkemaat = $deelname->getFokkemaat();
            if ($fokkemaat === null) {
                $singleHanded_klasse->addDeelname($deelname);
            }
        }
        if ($singleHanded_klasse->getDeelnames()->count() > 0) {
            $em->persist($singleHanded_klasse);
            $count++;
        }
        
        /*
         * Boten
         */
        $spinnaker_boot_type_counts = array();
        $normal_boot_type_counts = array();
        foreach ($deelnamesNoDSQ as $deelname) {
            $boot_type = $deelname->getBoot()->getType();
            if ($deelname->getSpinnaker()) {
                if (isset($spinnaker_boot_type_counts[$boot_type])) {
                    $spinnaker_boot_type_counts[$boot_type] += 1;
                } else {
                    $spinnaker_boot_type_counts[$boot_type] = 1;
                }
            } else {
                if (isset($normal_boot_type_counts[$boot_type])) {
                    $normal_boot_type_counts[$boot_type] += 1;
                } else {
                    $normal_boot_type_counts[$boot_type] = 1;
                }
            }
        }
        $spinnaker_boot_klassen = array();
        $normal_boot_klassen = array();
        foreach ($spinnaker_boot_type_counts as $boot_type => $boot_type_count) {
            if ($boot_type_count >= 2) {
                $klasse = new Klasse();
                $klasse->setNaam($boot_type . ' met spinnaker');
                $klasse->setType('Boot');
                $spinnaker_boot_klassen[$boot_type] = $klasse;
            }
        }
        foreach ($normal_boot_type_counts as $boot_type => $boot_type_count) {
            if ($boot_type_count >= 2) {
                $klasse = new Klasse();
                $klasse->setNaam($boot_type . ' zonder spinnaker');
                $klasse->setType('Boot');
                $normal_boot_klassen[$boot_type] = $klasse;
            }
        }
        $open_klasse = new Klasse();
        $open_klasse->setNaam('Open');
        $open_klasse->setType('Boot');
        foreach ($deelnamesNoDSQ as $deelname) {
            $boot_type = $deelname->getBoot()->getType();
            if ($deelname->getSpinnaker()) {
                if (isset($spinnaker_boot_klassen[$boot_type])) {
                    $spinnaker_boot_klassen[$boot_type]->addDeelname($deelname);
                } else {
                    $open_klasse->addDeelname($deelname);
                }
            } else {
                if (isset($normal_boot_klassen[$boot_type])) {
                    $normal_boot_klassen[$boot_type]->addDeelname($deelname);
                } else {
                    $open_klasse->addDeelname($deelname);
                }
            }
        }
        foreach ($spinnaker_boot_klassen as $boot_klasse) {
            $em->persist($boot_klasse);
            $count++;
        }
        foreach ($normal_boot_klassen as $boot_klasse) {
            $em->persist($boot_klasse);
            $count++;
        }
        if ($open_klasse->getDeelnames()->count() > 0) {
            $em->persist($open_klasse);
            $count++;
        }

        /*
         * Verenigingen
         */
        $vereniging_klassen = array();
        foreach ($deelnamesNoDSQ as $deelname) {
            $vereniging = $deelname->getVereniging();
            if ($vereniging !== null) {
                $vereniging_naam = $vereniging->getNaam();
                if (!isset($vereniging_klassen[$vereniging_naam])) {
                    $klasse = new Klasse();
                    $klasse->setNaam($vereniging_naam);
                    $klasse->setType('Vereniging');
                    $vereniging_klassen[$vereniging_naam] = $klasse;
                }

                $vereniging_klassen[$vereniging_naam]->addDeelname($deelname);
            }
        }
        foreach ($vereniging_klassen as $vereniging_klasse) {
            $em->persist($vereniging_klasse);
            $count++;
        }

        /*
         * Texel team
         */
        $texel_team_klasse = new Klasse();
        $texel_team_klasse->setNaam('Texel team');
        $texel_team_klasse->setType('Custom');
        foreach ($deelnamesNoDSQ as $deelname) {
            if ($deelname->getFokkemaat() != null)
            {
                if ($deelname->getStuurman()->getDeelnemer()->getNationaliteit()->getNationaliteit() === 'Texel' && $deelname->getFokkemaat()->getDeelnemer()->getNationaliteit()->getNationaliteit() === 'Texel') 
                {
                    $texel_team_klasse->addDeelname($deelname);
                }
            }
            else
            {
                if ($deelname->getStuurman()->getDeelnemer()->getNationaliteit()->getNationaliteit() === 'Texel')
                {
                    $texel_team_klasse->addDeelname($deelname);
                }
            }
            
        }
        if ($texel_team_klasse->getDeelnames()->count() > 0) {
            $em->persist($texel_team_klasse);
            $count++;
        }

        /*
         * Mixed
         */
        $mixed_klasse = new Klasse();
        $mixed_klasse->setNaam('Mixed');
        $mixed_klasse->setType('Custom');
        foreach ($deelnamesNoDSQ as $deelname) {
            if ($deelname->getFokkemaat() !== null && $deelname->getStuurman()->getDeelnemer()->getGeslacht() != $deelname->getFokkemaat()->getDeelnemer()->getGeslacht()) {
                $mixed_klasse->addDeelname($deelname);
            }
        }
        if ($mixed_klasse->getDeelnames()->count() > 0) {
            $em->persist($mixed_klasse);
            $count++;
        }

        /*
         * Dames
         */
        $dames_klasse = new Klasse();
        $dames_klasse->setNaam("Dames");
        $dames_klasse->setType('Custom');
        foreach ($deelnamesNoDSQ as $deelname) {
            $fokkemaat = $deelname->getFokkemaat();
            if ($deelname->getStuurman()->getDeelnemer()->getGeslacht() === 'V' && ($fokkemaat === null || $fokkemaat->getDeelnemer()->getGeslacht() === 'V')) {
                $dames_klasse->addDeelname($deelname);
            }
        }
        if ($dames_klasse->getDeelnames()->count() > 0) {
            $em->persist($dames_klasse);
            $count++;
        }

        /*
         * Jeugd
         */
        $jeugd_klasse = new Klasse();
        $jeugd_klasse->setNaam('Jeugd');
        $jeugd_klasse->setType('Custom');
        foreach ($deelnamesNoDSQ as $deelname) {
            $fokkemaat = $deelname->getFokkemaat();
            if ($deelname->getStuurman()->getDeelnemer()->getLeeftijd() < 21 && ($fokkemaat === null || $fokkemaat->getDeelnemer()->getLeeftijd() < 21)) {
                $jeugd_klasse->addDeelname($deelname);
            }
        }
        if ($jeugd_klasse->getDeelnames()->count() > 0) {
            $em->persist($jeugd_klasse);
            $count++;
        }

        /*
         * DSQ
         */
        $DSQ_klasse = new Klasse();
        $DSQ_klasse->setNaam('Disqualified');
        $DSQ_klasse->setType('Custom');
        foreach ($deelnamesDSQ as $deelname) {
            $DSQ_klasse->addDeelname($deelname);
        }
        if ($DSQ_klasse->getDeelnames()->count() > 0) {
            $em->persist($DSQ_klasse);
            $count++;
        }

        $em->flush();

        return $count;
    }
}