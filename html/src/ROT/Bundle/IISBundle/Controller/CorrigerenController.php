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
class CorrigerenController extends Controller {

    /**
     * @Route("/corrigeren", name="corrigeren")
     * @Template("ROTIISBundle:Corrigeren:corrigeren.html.twig")
     * @Method("GET")
     */
    public function indexAction() {
        return array(
            "deelnames" => $this->fetchDeelnames());
    }
    
    function fetchDeelnames() {
        $em = $this->getDoctrine()->getManager();
        $sql = "SELECT d FROM ROTIISBundle:Deelname d "
                . "where d.startnummer IS NOT NULL ORDER BY d.startnummer";
        $query = $em->createQuery($sql);
        $deelnames = $query->getResult();
        return $deelnames;
    }
    
    /**
     * @Route("corrigeren", name="corirgeren")
     * @Method("POST")
     */
    function corrigerenAction(Request $request)
    {
        $id = $request->get("id");
        $correctiefactor = $request->get("correctiefactor");
        $correctie = $request->get("correctie");
        if(!is_numeric($correctiefactor) || !is_numeric($correctie))
        {
            return new Response("Correctiefactor en correctie moeten getallen zijn.");
        }
        $deelname = null;
        $deelnames = $this->fetchDeelnames();
        foreach($deelnames as $d)
        {
            if($d->getId() == $id)
            {
                $deelname = $d;
                break;
            }
        }
        if($deelname === null)
        {
            return new Response("Deelname niet gevonden in database");
        }
        $gecorrigeerdeFinishtijdNew = $deelname->getGecorrigeerdeFinishtijd();
        $gecorrigeerdeFinishtijdNew *= $correctiefactor;
        $gecorrigeerdeFinishtijdNew += $correctie;
        $deelname->setGecorrigeerdeFinishtijd($gecorrigeerdeFinishtijdNew);
        $em = $this->getDoctrine()->getManager();
        $em->persist($deelname);
        $em->flush();
        return new Response("Finishtijd succesvol gecorrigeerd.");
    }
}

