<?php

namespace ROT\Bundle\IISBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Response;

class OverzichtController extends Controller
{
    /**
     * @Route("/")
	 * @Method("GET")
     */
    public function overzichtAction() {
		$em = $this->getDoctrine()->getManager();
        $boot_repository = $em->getRepository('ROTIISBundle:Boot');
        $deelname_repository = $em->getRepository('ROTIISBundle:Deelname');
        $klasse_repository = $em->getRepository('ROTIISBundle:Klasse');
        $nationaliteit_repository = $em->getRepository('ROTIISBundle:Nationaliteit');
        $uitzondering_repository = $em->getRepository('ROTIISBundle:Uitzondering');
        $vereniging_repository = $em->getRepository('ROTIISBundle:Vereniging');

        $response = new Response();
        $response->setLastModified(max(array($boot_repository->getIndexModificationTime(), $deelname_repository->getIndexModificationTime(), $klasse_repository->getIndexModificationTime(), $nationaliteit_repository->getIndexModificationTime(), $uitzondering_repository->getIndexModificationTime(), $vereniging_repository->getIndexModificationTime())));
        if ($response->isNotModified($this->getRequest())) {
            return $response;
        }
//
//		$deelnemers_iedereen = array(
//			'totaal' => $em->createQuery("SELECT COUNT(d.id) FROM ROTIISBundle:Deelnemer d")->getSingleScalarResult(),
//			'nederlands' => $em->createQuery("SELECT COUNT(d.id) FROM ROTIISBundle:Deelnemer d JOIN d.nationaliteit n WHERE n.landcode = 'NL'")->getSingleScalarResult()
//		);
//		$deelnemers_iedereen['buitenlands'] = $deelnemers_iedereen['totaal'] - $deelnemers_iedereen['nederlands'];
//		$deelnemers_aanmelder = array(
//			'totaal' => $em->createQuery("SELECT COUNT(s.id) + COUNT(f.id) FROM ROTIISBundle:Deelname d JOIN d.stuurman s LEFT JOIN d.fokkemaat f WHERE d.deelnemerstatus = 2")->getSingleScalarResult(),
//			'nederlands' => $em->createQuery("SELECT COUNT(d.id) FROM ROTIISBundle:Deelname d JOIN d.stuurman s JOIN s.deelnemer sd JOIN sd.nationaliteit sdn WHERE d.deelnemerstatus = 2 AND sdn.landcode = 'NL'")->getSingleScalarResult() + $em->createQuery("SELECT COUNT(d.id) FROM ROTIISBundle:Deelname d JOIN d.fokkemaat f JOIN f.deelnemer fd JOIN fd.nationaliteit fdn WHERE d.deelnemerstatus = 2 AND fdn.landcode = 'NL'")->getSingleScalarResult(),
//		);
//		$deelnemers_aanmelder['buitenlands'] = $deelnemers_aanmelder['totaal'] - $deelnemers_aanmelder['nederlands'];
//		$deelnemers_potentiele_deelnemers = array(
//			'totaal' => $em->createQuery("SELECT COUNT(s.id) + COUNT(f.id) FROM ROTIISBundle:Deelname d JOIN d.stuurman s LEFT JOIN d.fokkemaat f WHERE d.deelnemerstatus = 1")->getSingleScalarResult(),
//			'nederlands' => $em->createQuery("SELECT COUNT(d.id) FROM ROTIISBundle:Deelname d JOIN d.stuurman s JOIN s.deelnemer sd JOIN sd.nationaliteit sdn WHERE d.deelnemerstatus = 1 AND sdn.landcode = 'NL'")->getSingleScalarResult() + $em->createQuery("SELECT COUNT(d.id) FROM ROTIISBundle:Deelname d JOIN d.fokkemaat f JOIN f.deelnemer fd JOIN fd.nationaliteit fdn WHERE d.deelnemerstatus = 1 AND fdn.landcode = 'NL'")->getSingleScalarResult(),
//		);
//		$deelnemers_potentiele_deelnemers['buitenlands'] = $deelnemers_potentiele_deelnemers['totaal'] - $deelnemers_potentiele_deelnemers['nederlands'];
//		$deelnemers_definitieve_deelnemers = array(
//			'totaal' => $em->createQuery("SELECT COUNT(s.id) + COUNT(f.id) FROM ROTIISBundle:Deelname d JOIN d.stuurman s LEFT JOIN d.fokkemaat f WHERE d.deelnemerstatus = 0")->getSingleScalarResult(),
//			'nederlands' => $em->createQuery("SELECT COUNT(d.id) FROM ROTIISBundle:Deelname d JOIN d.stuurman s JOIN s.deelnemer sd JOIN sd.nationaliteit sdn WHERE d.deelnemerstatus = 0 AND sdn.landcode = 'NL'")->getSingleScalarResult() + $em->createQuery("SELECT COUNT(d.id) FROM ROTIISBundle:Deelname d JOIN d.fokkemaat f JOIN f.deelnemer fd JOIN fd.nationaliteit fdn WHERE d.deelnemerstatus = 0 AND fdn.landcode = 'NL'")->getSingleScalarResult(),
//		);
//		$deelnemers_definitieve_deelnemers['buitenlands'] = $deelnemers_definitieve_deelnemers['totaal'] - $deelnemers_definitieve_deelnemers['nederlands'];
//		$deelnemers_silver_fleet = array(
//			'totaal' => $em->createQuery("SELECT COUNT(s.id) + COUNT(f.id) FROM ROTIISBundle:Deelname d JOIN d.stuurman s LEFT JOIN d.fokkemaat f WHERE d.fleet = 'silverFleet'")->getSingleScalarResult(),
//			'nederlands' => $em->createQuery("SELECT COUNT(d.id) FROM ROTIISBundle:Deelname d JOIN d.stuurman s JOIN s.deelnemer sd JOIN sd.nationaliteit sdn WHERE d.fleet = 'silverFleet' AND sdn.landcode = 'NL'")->getSingleScalarResult() + $em->createQuery("SELECT COUNT(d.id) FROM ROTIISBundle:Deelname d JOIN d.fokkemaat f JOIN f.deelnemer fd JOIN fd.nationaliteit fdn WHERE d.fleet = 'silverFleet' AND fdn.landcode = 'NL'")->getSingleScalarResult(),
//		);
//		$deelnemers_silver_fleet['buitenlands'] = $deelnemers_silver_fleet['totaal'] - $deelnemers_silver_fleet['nederlands'];
//		$deelnemers_gold_fleet = array(
//			'totaal' => $em->createQuery("SELECT COUNT(s.id) + COUNT(f.id) FROM ROTIISBundle:Deelname d JOIN d.stuurman s LEFT JOIN d.fokkemaat f WHERE d.fleet = 'goldFleet'")->getSingleScalarResult(),
//			'nederlands' => $em->createQuery("SELECT COUNT(d.id) FROM ROTIISBundle:Deelname d JOIN d.stuurman s JOIN s.deelnemer sd JOIN sd.nationaliteit sdn WHERE d.fleet = 'goldFleet' AND sdn.landcode = 'NL'")->getSingleScalarResult() + $em->createQuery("SELECT COUNT(d.id) FROM ROTIISBundle:Deelname d JOIN d.fokkemaat f JOIN f.deelnemer fd JOIN fd.nationaliteit fdn WHERE d.fleet = 'goldFleet' AND fdn.landcode = 'NL'")->getSingleScalarResult(),
//		);
//		$deelnemers_gold_fleet['buitenlands'] = $deelnemers_gold_fleet['totaal'] - $deelnemers_gold_fleet['nederlands'];
//
//		$aanwezigheidstatussen_result = $em->createQuery('SELECT COUNT(d.id) tot, d.aanwezigheidstatus FROM ROTIISBundle:Deelname d GROUP BY d.aanwezigheidstatus')->getResult();
//		$aanwezigheidstatussen = array();
//		foreach ($aanwezigheidstatussen_result as $entry) {
//			$aanwezigheidstatussen[$entry['aanwezigheidstatus']] = $entry['tot'];
//		}
//
//		$racestatussen_result = $em->createQuery('SELECT COUNT(d.id) tot, d.racestatus FROM ROTIISBundle:Deelname d GROUP BY d.racestatus')->getResult();
//		$racestatussen = array();
//		foreach ($racestatussen_result as $entry) {
//			$racestatussen[$entry['racestatus']] = $entry['tot'];
//		}
//
//		$statussen_result = $em->createQuery('SELECT COUNT(d.id) totaal, SUM(d.horstochtstatus) horstocht, SUM(d.dutchopenstatus) dutchopen, SUM(d.nacrachampstatus) nacrachamp, SUM(d.tochtnoordstatus) tochtnoord FROM ROTIISBundle:Deelname d')->getSingleResult();
//
//		$betalingen_result = $em->createQuery('SELECT COUNT(b.id) totaal,  SUM(b.bedrag) bedrag FROM ROTIISBundle:Betaling b')->getSingleResult();
//		$betalingen_niet_betaald = $em->createQuery("SELECT COUNT(b.id) FROM ROTIISBundle:Betaling b WHERE b.betaaldatum = '0000-00-00'")->getSingleScalarResult();
//
//		$borg_result = $em->createQuery('SELECT COUNT(b.id) totaal, SUM(b.terugbetaald) terugbetaald FROM ROTIISBundle:Borg b')->getSingleResult();
//
//        return array(
//			'deelnemers' => array(
//				'iedereen' => $deelnemers_iedereen,
//				'aanmelder' => $deelnemers_aanmelder,
//				'potentiele_deelnemers' => $deelnemers_potentiele_deelnemers,
//				'definitieve_deelnemers' => $deelnemers_definitieve_deelnemers,
//				'silver_fleet' => $deelnemers_silver_fleet,
//				'gold_fleet' => $deelnemers_gold_fleet
//			),
//			'statussen' => array(
//				'niet_aangemeld' => array(
//					'aantal' => isset($aanwezigheidstatussen['3']) ? $aanwezigheidstatussen['3'] : 0
//				),
//				'wel_aangemeld' => array(
//					'aantal' => isset($aanwezigheidstatussen['2']) ? $aanwezigheidstatussen['2'] : 0
//				),
//				'niet_afgemeld' => array(
//					'aantal' => isset($aanwezigheidstatussen['1']) ? $aanwezigheidstatussen['1'] : 0
//				),
//				'wel_afgemeld' => array(
//					'aantal' => isset($aanwezigheidstatussen['0']) ? $aanwezigheidstatussen['0'] : 0
//				),
//				'niet_gestart' => array(
//					'aantal' => isset($racestatussen['3']) ? $racestatussen['3'] : 0
//				),
//				'gestart' => array(
//					'aantal' => isset($racestatussen['2']) ? $racestatussen['2'] : 0
//				),
//				'uitzondering' => array(
//					'aantal' => isset($racestatussen['1']) ? $racestatussen['1'] : 0
//				),
//				'correct_gefinisht' => array(
//					'aantal' => isset($racestatussen['0']) ? $racestatussen['0'] : 0
//				)
//			),
//			'andere_races' => array(
//				'dutch_open' => array(
//					'doen_wel_mee' => $statussen_result['dutchopen'],
//					'doen_niet_mee' => $statussen_result['totaal'] - $statussen_result['dutchopen']
//				),
//				'horstocht' => array(
//					'doen_wel_mee' => $statussen_result['horstocht'],
//					'doen_niet_mee' => $statussen_result['totaal'] - $statussen_result['horstocht']
//				),
//				'nacrachamp' => array(
//					'doen_wel_mee' => $statussen_result['nacrachamp'],
//					'doen_niet_mee' => $statussen_result['totaal'] - $statussen_result['nacrachamp']
//				),
//				'tocht_naar_de_noord' => array(
//					'doen_wel_mee' => $statussen_result['tochtnoord'],
//					'doen_niet_mee' => $statussen_result['totaal'] - $statussen_result['tochtnoord']
//				)
//			),
//			'betaling' => array(
//				'inschrijfgeld' => array(
//					'totaal' => $betalingen_result['bedrag']
//				),
//				'inschrijfgeld_niet_betaald' => array(
//					'totaal' => $betalingen_niet_betaald
//				),
//				'inschrijfgeld_wel_betaald' => array(
//					'totaal' => $betalingen_result['totaal'] - $betalingen_niet_betaald
//				),
//				'borg_niet_terugbetaald' => array(
//					'totaal' => $borg_result['totaal'] - $borg_result['terugbetaald']
//				),
//				'borg_wel_terugbetaald' => array(
//					'totaal' => $borg_result['terugbetaald']
//				)
//			),
//			'overig' => array(
//				'boten' => array(
//					'totaal' => $em->createQuery('SELECT COUNT(b.id) FROM ROTIISBundle:Boot b')->getSingleScalarResult()
//				),
//				'verenigingen' => array(
//					'totaal' => $em->createQuery('SELECT COUNT(v.id) FROM ROTIISBundle:Vereniging v')->getSingleScalarResult()
//				),
//				'nationaliteiten' => array(
//					'totaal' => $em->createQuery('SELECT COUNT(n.id) FROM ROTIISBundle:Nationaliteit n')->getSingleScalarResult()
//				)
//			)
//		);
        return $this->render('ROTIISBundle:Overzicht:overzicht.html.twig', array(), $response);
    }
}
