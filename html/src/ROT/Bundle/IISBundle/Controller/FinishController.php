<?php

namespace ROT\Bundle\IISBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class FinishController extends Controller {

    /**
     * @Route("/finish", name="finish")
     * @Template("ROTIISBundle:Finish:finish.html.twig")
     * @Method("GET")
     */
    public function indexAction() {
        $startRaceDateString = $this->getStartTime();
        $dateFormat = "d-m-Y H:i:s";
        $startRace = date($dateFormat, strtotime($startRaceDateString));
        return array(
            "deelnames" => $this->fetchDeelnames(),
            "dateFormat" => $dateFormat,
            "startRaceDateString" => $startRaceDateString,
            "startRaceDate" => $startRace);
    }

    /**
     * @Route("finish/save", name="finish/save")
     * @Method("POST")
     */
    public function saveFinishtijdenAction(Request $request)
    {
        $finishtijden = $request->get("finishtijden");
        $em = $this->getDoctrine()->getManager();
        while (list($key, $val) = each($finishtijden))
        {
            if($val != null)
            {
                $deelname = $this->fetchDeelname($key);
                $deelname->setFinishtijd($val);
                $em->persist($deelname);
            }
        }
        $em->flush();
        return new Response("Saving succeeded");       
    }
    
    function fetchDeelnames() {
        $em = $this->getDoctrine()->getManager();
        $sql = "SELECT d FROM ROTIISBundle:Deelname d "
                . "where d.startnummer IS NOT NULL ORDER BY d.startnummer";
        $query = $em->createQuery($sql);
        $deelnames = $query->getResult();
        return $deelnames;
    }
    
    function fetchDeelname($id)
    {
        $deelnames = $this->fetchDeelnames();
        foreach ($deelnames as $deelname)
        {
            if($deelname->getId() === $id)
            {
                return $deelname;
            }
        }
        return null;
    }

    public function getStartTime()
    {
        return "28-06-2014 9:00:00";
    }  
    
    /**
     * @Route("commit", name="commit")
     * @Method("POST")
     */
    function commitAction(Request $request)
    {
        $id = $request->get("id");
        $finishtijd = $request->get("finishtijd");
        if(!is_numeric($finishtijd))
        {
            return new Response("");
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
            return new Response("");
        }
        $deelname->setFinishtijd($finishtijd);
        $em = $this->getDoctrine()->getManager();
        $em->persist($deelname);
        $em->flush();
        return new Response($finishtijd);
    }
}
