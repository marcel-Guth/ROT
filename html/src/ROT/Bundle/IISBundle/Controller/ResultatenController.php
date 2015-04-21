<?php

namespace ROT\Bundle\IISBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ResultatenController extends Controller
{
    
    /**
     * @Route("/results", name="results")
     * @Template("ROTIISBundle:Results:results.html.twig")
     * @Method("GET")
     */
    public function indexAction() {
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