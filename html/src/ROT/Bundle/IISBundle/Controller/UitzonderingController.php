<?php

namespace ROT\Bundle\IISBundle\Controller;

use ROT\Bundle\AdminBundle\Entity\Filter;
use ROT\Bundle\AdminBundle\Form\Type\FilterWrappingType;
use ROT\Bundle\IISBundle\Form\Type\UitzonderingFilterType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Cache;
use JMS\SecurityExtraBundle\Annotation\Secure;
use ROT\Bundle\IISBundle\Entity\Uitzondering;
use ROT\Bundle\IISBundle\Form\Type\UitzonderingType;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route("/uitzondering")
 */
class UitzonderingController extends Controller
{
	/**
     * @Route("/")
     * @Method("GET")
     */
    public function indexAction() {
        $em = $this->getDoctrine()->getManager();
        $respository = $em->getRepository('ROTIISBundle:Uitzondering');

        $response = new Response();
        $response->setLastModified($respository->getIndexModificationTime());
        if ($response->isNotModified($this->getRequest())) {
            return $response;
        }

        return $this->render('ROTIISBundle:Uitzondering:index.html.twig', array(
            'active_filter' => false,
            'filters' => $em->getRepository('ROTAdminBundle:Filter')->findByTypeOrderedByName('Uitzondering'),
            'uitzonderingen' => $respository->findAll()
        ), $response);
    }

    /**
     * @Route("/filter/{id}", requirements={"id": "\d+"})
     * @Template()
     * @Method("GET")
     * @ParamConverter("filter", class="ROTAdminBundle:Filter")
     */
    public function filterAction(Filter $filter) {
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('ROTIISBundle:Uitzondering');
        $qb = $repository->createQueryBuilder('u');
        $repository->applyFilterToQueryBuilder($filter->getContent(), 'u', $qb);

        return $this->render('ROTIISBundle:Uitzondering:index.html.twig', array(
            'active_filter' => $filter,
            'filters' => $em->getRepository('ROTAdminBundle:Filter')->findByTypeOrderedByName('Uitzondering'),
            'uitzonderingen' => $qb->getQuery()->getResult()
        ));
    }
    
    /**
     * @Route("/new")
     * @Template()
     * @Method("GET")
     * @Secure(roles="ROLE_WIJZIG_IIS")
     */
    public function newAction() {
        return array(
			'form' => $this->createForm(new UitzonderingType(), new Uitzondering())->createView()
		);
    }
    
    /**
     * @Route("/")
     * @Method("POST")
     * @Secure(roles="ROLE_WIJZIG_IIS")
     */
    public function createAction() {
		$uitzondering = new Uitzondering();
        $form = $this->createForm(new UitzonderingType(), $uitzondering);
        $flash = $this->getRequest()->getSession()->getFlashBag();
		
		$form->submit($this->getRequest());
		if ($form->isValid()) {
			$em = $this->getDoctrine()->getManager();
			$em->persist($uitzondering);
			$em->flush();

            $flash->add('notice', 'Uitzondering "' . $uitzondering . '" aangemaakt');

			return $this->redirect($this->generateUrl('rot_iis_uitzondering_show', array(
				'id' => $uitzondering->getId()
			)));
		}

        $flash->add('error', 'Fouten gevonden, uitzondering is niet aangemaakt');
		
		return $this->render('ROTIISBundle:Uitzondering:new.html.twig', array(
			'form' => $form->createView()
		));
    }
    
    /**
     * @Route("/{id}", requirements={"id"="\d+"})
     * @Method("GET")
     * @ParamConverter("uitzondering", class="ROTIISBundle:Uitzondering")
     */
    public function showAction(Uitzondering $uitzondering) {
        $response = new Response();
        $response->setLastModified($uitzondering->getUpdatedAt());
        if ($response->isNotModified($this->getRequest())) {
            return $response;
        }

        return $this->render('ROTIISBundle:Uitzondering:show.html.twig', array(
			'uitzondering' => $uitzondering
		), $response);
    }

    /**
     * @Route("/{id}/log", requirements={"id": "\d+"})
     * @Template()
     * @Method("GET")
     * @ParamConverter("uitzondering", class="ROTIISBundle:Uitzondering")
     */
    public function logAction(Uitzondering $uitzondering) {}

    /**
     * @Route("/{id}/revert/{version}", requirements={"id": "\d+", "version": "\d+"})
     * @Method("GET")
     * @ParamConverter("uitzondering", class="ROTIISBundle:Uitzondering")
     * @Secure(roles="ROLE_WIJZIG_IIS")
     */
    public function revertAction(Uitzondering $uitzondering, $version) {}
    
    /**
     * @Route("/{id}/edit", requirements={"id"="\d+"})
     * @Template()
     * @Method("GET")
     * @ParamConverter("uitzondering", class="ROTIISBundle:Uitzondering")
     * @Secure(roles="ROLE_WIJZIG_IIS")
     */
    public function editAction(Uitzondering $uitzondering) {
        $response = new Response();
        $response->setLastModified($uitzondering->getUpdatedAt());
        if ($response->isNotModified($this->getRequest())) {
            return $response;
        }

        return $this->render('ROTIISBundle:Uitzondering:edit.html.twig', array(
			'uitzondering' => $uitzondering,
			'form' => $this->createForm(new UitzonderingType(), $uitzondering)->createView()
		), $response);
    }
    
    /**
     * @Route("/{id}", requirements={"id"="\d+"})
     * @Method("PUT")
     * @ParamConverter("uitzondering", class="ROTIISBundle:Uitzondering")
     * @Secure(roles="ROLE_WIJZIG_IIS")
     */
    public function updateAction(Uitzondering $uitzondering) {
        $form = $this->createForm(new UitzonderingType(), $uitzondering);
        $flash = $this->getRequest()->getSession()->getFlashBag();

		$form->submit($this->getRequest());
		if ($form->isValid()) {
			$em = $this->getDoctrine()->getManager();
			$em->persist($uitzondering);
			$em->flush();

            $flash->add('notice', 'Uitzondering "' . $uitzondering . '" opgeslagen');

			return $this->redirect($this->generateUrl('rot_iis_uitzondering_show', array(
				'id' => $uitzondering->getId()
			)));
		}

        $flash->add('error', 'Fouten gevonden, uitzondering "' . $uitzondering . '" is niet opgeslagen');

		return $this->render('ROTIISBundle:Uitzondering:edit.html.twig', array(
            'uitzondering' => $uitzondering,
			'form' => $form->createView()
		));
    }
    
     /**
      * @Route("/{id}", requirements={"id"="\d+"})
      * @Template()
      * @Method("DELETE")
      * @ParamConverter("uitzondering", class="ROTIISBundle:Uitzondering")
      * @Secure(roles="ROLE_WIJZIG_IIS")
      */
    public function deleteAction(Uitzondering $uitzondering) {
        $em = $this->getDoctrine()->getManager();
        $em->remove($uitzondering);
        $em->flush();        
		
		return $this->redirect($this->generateUrl('rot_iis_uitzondering_index'));
    }

    private function handleFilterForm(Form $form) {
        $form->submit($this->getRequest());

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($form->getData());
            $em->flush();

            return true;
        }

        return false;
    }

    /**
     * @Route("/filter/new")
     * @Template()
     * @Method("GET")
     */
    public function newFilterAction() {
        return array(
            'form' => $this->createForm(new FilterWrappingType(), null, array(
                'filter_class' => new UitzonderingFilterType()
            ))->createView()
        );
    }

    /**
     * @Route("/filter", requirements={"id"="\d+"})
     * @Method("POST")
     */
    public function createFilterAction() {
        $filter = new Filter();
        $filter->setType('Uitzondering');
        $form = $this->createForm(new FilterWrappingType(), $filter, array(
            'filter_class' => new UitzonderingFilterType()
        ));

        if ($this->handleFilterForm($form)) {
            return $this->redirect($this->generateUrl('rot_iis_uitzondering_filter', array(
                'id' => $filter->getId()
            )));
        }

        return $this->render('ROTIISBundle:Uitzondering:newFilter.html.twig', array(
            'form' => $form->createView()
        ));
    }

    /**
     * @Route("/filter/{id}/edit", requirements={"id"="\d+"})
     * @Template()
     * @Method("GET")
     * @ParamConverter("filter", class="ROTAdminBundle:Filter")
     */
    public function editFilterAction(Filter $filter) {
        return array(
            'filter' => $filter,
            'form' => $this->createForm(new FilterWrappingType(), $filter, array(
                'filter_class' => new UitzonderingFilterType()
            ))->createView()
        );
    }

    /**
     * @Route("/filter/{id}", requirements={"id"="\d+"})
     * @Method("PUT")
     * @ParamConverter("filter", class="ROTAdminBundle:Filter")
     */
    public function updateFilterAction(Filter $filter) {
        $form = $this->createForm(new FilterWrappingType(), $filter, array(
            'filter_class' => new UitzonderingFilterType()
        ));

        if ($this->handleFilterForm($form)) {
            return $this->redirect($this->generateUrl('rot_iis_uitzondering_filter', array(
                'id' => $filter->getId()
            )));
        }

        return $this->render('ROTIISBundle:Uitzondering:editFilter.html.twig', array(
            'form' => $form->createView()
        ));
    }

    /**
     * @Route("/filter/{id}", requirements={"id"="\d+"})
     * @Method("DELETE")
     * @ParamConverter("filter", class="ROTAdminBundle:Filter")
     */
    public function deleteFilterAction(Filter $filter) {
        $em = $this->getDoctrine()->getManager();
        $em->remove($filter);
        $em->flush();

        return $this->redirect($this->generateUrl('rot_iis_uitzondering_index'));
    }
}
