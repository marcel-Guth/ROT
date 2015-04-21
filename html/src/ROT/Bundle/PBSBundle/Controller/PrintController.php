<?php

namespace ROT\Bundle\PBSBundle\Controller;

use ROT\Bundle\AdminBundle\Entity\Filter;
use ROT\Bundle\AdminBundle\Form\Type\FilterWrappingType;
use ROT\Bundle\PBSBundle\Form\Type\ParkeerkaartFilterType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Cache;
use JMS\SecurityExtraBundle\Annotation\Secure;
use ROT\Bundle\PBSBundle\Entity\Parkeerkaart;
use ROT\Bundle\PBSBundle\Form\Type\ParkeerkaartType;
use Symfony\Component\Form\Form;
use Symfony\Component\Form\FormError;
use Symfony\Component\HttpFoundation\Response;


class PrintController extends Controller
{
    /**
     * @Route("/print", name="print")
     * @Template("ROTPBSBundle:Print:print.html.twig")
     * @Method("GET")
     */
    public function indexAction() {
        $deelnames = $this->fetchDeelnames();
        return array("deelnames" => $deelnames);
    }
    
    public function fetchDeelnames($id = -1) {
        $em = $this->getDoctrine()->getManager();
        $sql = "SELECT d FROM ROTIISBundle:Deelname d WHERE d.startnummer IS NOT NULL";
        if($id !== -1)
        {
            $sql = $sql." AND d.id = ".$id;
        }
        $query = $em->createQuery($sql);
        $deelnames = $query->getResult();
        return $deelnames;
    }
    
    public function fetchParkeerkaarten($id = -1) 
    {
        $em = $this->getDoctrine()->getManager();
        $sql = "";
        if($id === -1)
        {
            $sql = "SELECT p FROM ROTPBSBundle:Parkeerkaart p";
        }
        else
        {
            $sql = "SELECT p FROM ROTIISBundle:Deelname d JOIN d.parkeerkaart p WHERE d.id = ".$id;
        }
        $query = $em->createQuery($sql);
        $parkeerkaarten = $query->getResult();
        return $parkeerkaarten;
    }
    
    /**
     * @Route("/print")
     * @Template("ROTPBSBundle:Print:print.html.twig")
     * @Method("POST")
     */
    public function insertParkeerkaartAction()
    {
        //input has been checked. no need to do that here
        //also doesnt reach this point if printing failed
        
        $em = $this->getDoctrine()->getManager();
        
        if($_POST["soort"] == "zeiler")
        {
            //if(checkAlreadyPrinted())
            
            $parkeerkaartNew = new Parkeerkaart();
            $parkeerkaartNew->setKenteken($_POST["kenteken"]);
            $parkeerkaartNew->setKaarttype("Zeiler");
            $parkeerkaartNew->setStrandvergunningsoort("geen");  //zeilers krijgen geen strandvergunning
            $parkeerkaartNew->setVergunningsoort("geen");
            $parkeerkaartNew->setUitgegeven(true);
            $parkeerkaartNew->setUitgavecount(1);
            $parkeerkaartNew->setUitgavedatum(new \DateTime(date('Y-m-d')));
            
            $deelnames = $this->fetchDeelnames($_POST["hidden1"]);
            if(count($deelnames) > 0)
            {
                $deelname = $deelnames[0];
                $deelname->setParkeerkaart($parkeerkaartNew);
                $em->persist($deelname);
            }
            $em->persist($parkeerkaartNew);
        }
        else //medewerker
        {
            $parkeerkaartNew = new Parkeerkaart();
            $parkeerkaartNew->setKenteken($_POST["kenteken"]);
            $parkeerkaartNew->setKaarttype($_POST["hidden2"]);
            $strandvergunning = $_POST["soortVergunning"];
            $vergunningsoort = $_POST["onderdeelVergunning"];
            if($_POST["soortMedewerker"] !== "vergunning")
            {
                $strandvergunning = "geen";
                $vergunningsoort = "geen";
            }
            $parkeerkaartNew->setStrandvergunningsoort($strandvergunning);
            $parkeerkaartNew->setVergunningsoort($vergunningsoort);
            
            $parkeerkaartNew->setDonderdag(isset($_POST["don"]));
            $parkeerkaartNew->setVrijdag(isset($_POST["vrij"]));
            $parkeerkaartNew->setZaterdag(isset($_POST["zat"]));
            $parkeerkaartNew->setUitgegeven(true);
            $parkeerkaartNew->setUitgavecount(1);
            $parkeerkaartNew->setUitgavedatum(new \DateTime(date('Y-m-d')));
            
            $em->persist($parkeerkaartNew);
        }
        $em->flush();
        $deelnames = $this->fetchDeelnames();
        return array("deelnames" => $deelnames);
    }
    
    public function checkAlreadyPrinted()
    {
        $parkeerkaarten = $this->fetchParkeerkaarten();
        return (count($parkeerkaarten) > 0);
    }
}