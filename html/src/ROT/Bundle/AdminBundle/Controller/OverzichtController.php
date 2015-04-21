<?php

namespace ROT\Bundle\AdminBundle\Controller;

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

		return array(
            'overzicht' => array(
                'gebruikers' => array(
                    'aantal' => $em->createQuery('SELECT COUNT(g.id) FROM ROTAdminBundle:Gebruiker g')->getSingleScalarResult()
                )
            )
        );
    }
}
