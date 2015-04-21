<?php

namespace ROT\Bundle\PBSBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

class OverzichtController extends Controller
{
    /**
     * @Route("/")
     * @Template()
     * @Method("GET")
     */
    public function overzichtAction() {
        $em = $this->getDoctrine()->getManager();
        $sql = "SELECT p.vergunningsoort as soort, count(p.vergunningsoort) as aantal FROM ROTPBSBundle:Parkeerkaart p GROUP BY p.vergunningsoort";
        $licenseTypeCounts = $em->createQuery($sql)->getResult();
        $sql = "SELECT  p.kaarttype as kaarttype, count(p.kaarttype)as aantalKaarttype FROM ROTPBSBundle:Parkeerkaart p GROUP BY p.kaarttype";
        $licences = $em->createQuery($sql)->getResult();
        $sql = "SELECT p FROM ROTPBSBundle:Parkeerkaart p WHERE p.kaarttype != 'Zeiler' AND p.vergunningsoort != 'geen' ORDER BY p.strandvergunningsoort";
        $vergunningen = $em->createQuery($sql)->getResult();
        return $this->render('ROTPBSBundle:Overzicht:overzicht.html.twig', array(
			'overzicht' => $licenseTypeCounts,
                        'kaarten' => $licences,
                        'vergunningen' => $vergunningen
		));
    }
}
