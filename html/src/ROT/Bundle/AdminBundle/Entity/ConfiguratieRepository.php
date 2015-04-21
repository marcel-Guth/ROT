<?php

namespace ROT\Bundle\AdminBundle\Entity;

use Doctrine\ORM\EntityRepository;

class ConfiguratieRepository extends EntityRepository
{
    public function getConfiguratieByNederlands($nederlands) {
        return $this->createQueryBuilder('c')
            ->where('c.nederlands = :nederlands')
            ->setParameter('nederlands', $nederlands)
            ->getQuery()
            ->getResult();
    }

    public function getContentByContenttargetAndNederlands($contenttarget, $nederlands) {
        return $this->getEntityManager()->createQuery("
            SELECT c.content FROM ROTAdminBundle:Configuratie c
            WHERE c.contenttarget = :contenttarget
            AND c.nederlands = :nederlands
        ")->setParameters(array(
            'contenttarget' => $contenttarget,
            'nederlands' => $nederlands
        ))->getSingleScalarResult();
    }

    public function getAlgemeenConfiguratie() {
        $algemeenconfiguratie = array();
        foreach ($this->getEntityManager()->createQuery("
            SELECT c FROM ROTAdminBundle:Configuratie c
			WHERE c.contenttarget IN ('sitetitel', 'siteondertitel', 'siteregistratietitel')
        ")->getResult() as $configuratie) {
            $algemeenconfiguratie[$configuratie->getContenttarget() . '_' . ($configuratie->getNederlands() ? 'nl' : 'en')] = $configuratie;
        }

        return $algemeenconfiguratie;
    }

    public function getStapConfiguratie($stap) {
        $stepconfiguratie = array();
        foreach ($this->getEntityManager()->createQuery("
            SELECT c FROM ROTAdminBundle:Configuratie c
			WHERE c.contenttarget = ?0
        ")->setParameter(0, 'registrationstep' . $stap)->getResult() as $configuratie) {
            $stepconfiguratie[$configuratie->getNederlands() ? 'nl' : 'en'] = $configuratie;
        }

        return $stepconfiguratie;
    }

    public function getMailConfiguratie($mail_type) {
        $algemeenconfiguratie = array();
        foreach ($this->getEntityManager()->createQuery("
            SELECT c FROM ROTAdminBundle:Configuratie c
			WHERE c.contenttarget IN (?0)
        ")->setParameter(0, array($mail_type . 'mailsubject', $mail_type . 'mailhtml', $mail_type . 'mailplain'))->getResult() as $configuratie) {
            $algemeenconfiguratie[str_replace($mail_type . 'mail', '', $configuratie->getContenttarget()) . '_' . ($configuratie->getNederlands() ? 'nl' : 'en')] = $configuratie;
        }

        return $algemeenconfiguratie;
    }
}