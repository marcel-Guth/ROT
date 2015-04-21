<?php

namespace ROT\Bundle\InschrijfBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class StatusController extends Controller {

    /**
     * @Route("/inschrijvingen/json")
     * @Method("GET") 
     */
    public function aantalInschrijvingenAction() {
        return $this->fetchAmountOfDeelnames();
    }

    private function fetchAmountOfDeelnames() {
        $sql = "SELECT count(d.id) FROM ROTIISBundle:Deelnemer d";
        $query = $this->getDoctrine()->getManager()->createQuery($sql);
        $aantal = $query->getSingleScalarResult();

        $url = $this->generateUrl("overzicht", array(), true);
        $array = array("url" => $url, "aantalInschrijvingen" => $aantal);
        return new JsonResponse($array);
    }

    /**
     * @Route("/inschrijvingen", name="overzicht")
     * @Template
     * @Method("GET") 
     */
    public function inschrijvingenAction() {
        $sql = "SELECT d FROM ROTIISBundle:Deelname d ORDER BY d.id ASC";
        $query = $this->getDoctrine()->getManager()->createQuery($sql);
        $deelnames = $query->getResult();
        return array("deelnames" => $deelnames, "aantal" => count($deelnames));
    }
    
    /**
     * @Route ("/finishlijst", name="finishlijst")
     * @Template
     * @method("GET")
     **/
    public function finishlijstAction() {
        $klassen = $this->fetchKlassen();
        $verenigingklassen = array();
        foreach ($klassen as $klasse)
        {
            if($klasse->getType() == 'Vereniging')
            {
                $verenigingklassen[$klasse->getNaam()] = $klasse;
            }
        }
        return array(
            "klassen" => $klassen,
            "verenigingklassen" => $verenigingklassen);
    }
    
    private function fetchKlassen() {
        $em = $this->getDoctrine()->getManager();
        $sql = "SELECT k FROM ROTIISBundle:Klasse k";
        $query = $em->createQuery($sql);
        $klassen = $query->getResult();
        if (count($klassen) == 0) {
            return null;
        }
        return $klassen;
    }

}
