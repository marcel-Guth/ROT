<?php

namespace ROT\Bundle\RBSBundle\Controller;

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
        $betrokkene_repository = $em->getRepository('ROTRBSBundle:Betrokkene');
        $organisatie_repository = $em->getRepository('ROTRBSBundle:Organisatie');

        $response = new Response();
        $response->setLastModified(max(array($betrokkene_repository->getIndexModificationTime(), $organisatie_repository->getIndexModificationTime())));
        if ($response->isNotModified($this->getRequest())) {
            return $response;
        }
		
		return $this->render('ROTRBSBundle:Overzicht:overzicht.html.twig', array(
			'overzicht' => array(
				'organisaties' => array(
					'aantal' => $em->createQuery('SELECT COUNT(o.id) FROM ROTRBSBundle:Organisatie o')->getSingleScalarResult()
				),
				'betrokkenen' => array(
					'aantal' => $em->createQuery('SELECT COUNT(b.id) FROM ROTRBSBundle:Betrokkene b')->getSingleScalarResult()
				)
			)
		), $response);
    }
}
