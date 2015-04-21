<?php

namespace ROT\Bundle\IISBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

/**
 * Echte start datum race
  $startRaceDateString = "20-03-2014 14:00:00";
 */
class NAWExportController extends Controller {

    /**
     * @Route("/NAWExport", name="NAWExport")
     * @Template("ROTIISBundle:NAWExport:NAWExport.html.twig")
     * @Method("GET")
     */
    public function indexAction() {
        return array(
            "deelnames" => $this->fetchDeelnames());
    }
    
    private function fetchDeelnames() {
        $em = $this->getDoctrine()->getManager();
        $sql = "SELECT d FROM ROTIISBundle:Deelname d "
                . "ORDER BY d.id";
        $query = $em->createQuery($sql);
        $deelnames = $query->getResult();
        if (count($deelnames) == 0) {
            return null;
        }
        return $deelnames;
    }
}

