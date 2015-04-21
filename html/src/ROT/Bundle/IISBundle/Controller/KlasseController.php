<?php

namespace ROT\Bundle\IISBundle\Controller;

use ROT\Bundle\AdminBundle\Entity\Filter;
use ROT\Bundle\AdminBundle\Form\Type\FilterWrappingType;
use ROT\Bundle\IISBundle\Form\Type\KlasseFilterType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Cache;
use JMS\SecurityExtraBundle\Annotation\Secure;
use ROT\Bundle\IISBundle\Entity\Klasse;
use ROT\Bundle\IISBundle\Form\Type\KlasseType;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route("/klasse")
 */
class KlasseController extends Controller
{
	/**
     * @Route("/")
     * @Method("GET")
     */
    public function indexAction() {
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('ROTIISBundle:Klasse');

        $response = new Response();
        $response->setLastModified($repository->getIndexModificationTime());
        if ($response->isNotModified($this->getRequest())) {
            return $response;
        }

        return $this->render('ROTIISBundle:Klasse:index.html.twig', array(
            'active_filter' => false,
            'filters' => $em->getRepository('ROTAdminBundle:Filter')->findByTypeOrderedByName('Klasse'),
            'klassen' => $repository->findAll()
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
        $repository = $em->getRepository('ROTIISBundle:Klasse');
        $qb = $repository->createQueryBuilder('u');
        $repository->applyFilterToQueryBuilder($filter->getContent(), 'u', $qb);

        return $this->render('ROTIISBundle:Klasse:index.html.twig', array(
            'active_filter' => $filter,
            'filters' => $em->getRepository('ROTAdminBundle:Filter')->findByTypeOrderedByName('Klasse'),
            'klassen' => $qb->getQuery()->getResult()
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
			'form' => $this->createForm(new KlasseType(), new Klasse())->createView()
		);
    }
    
    /**
     * @Route("/")
     * @Method("POST")
     * @Secure(roles="ROLE_WIJZIG_IIS")
     */
    public function createAction() {
		$klasse = new Klasse();
        $form = $this->createForm(new KlasseType(), $klasse);
        $flash = $this->getRequest()->getSession()->getFlashBag();
		
		$form->submit($this->getRequest());
		if ($form->isValid()) {
			$em = $this->getDoctrine()->getManager();
			$em->persist($klasse);
			$em->flush();

            $flash->add('notice', 'Klasse "' . $klasse . '" aangemaakt');

			return $this->redirect($this->generateUrl('rot_iis_klasse_show', array(
				'id' => $klasse->getId()
			)));
		}

        $flash->add('error', 'Fouten gevonden, klasse is niet aangemaakt');
		
		return $this->render('ROTIISBundle:Klasse:new.html.twig', array(
			'form' => $form->createView()
		));
    }
    
    /**
     * @Route("/{id}", requirements={"id"="\d+"})
     * @Template()
     * @Method("GET")
     * @ParamConverter("klasse", class="ROTIISBundle:Klasse")
     */
    public function showAction(Klasse $klasse) {
        $response = new Response();
        $response->setLastModified($klasse->getUpdatedAt());
        if ($response->isNotModified($this->getRequest())) {
            return $response;
        }

        return $this->render('ROTIISBundle:Klasse:show.html.twig', array(
			'klasse' => $klasse
		), $response);
    }

    /**
     * @Route("/{id}/log", requirements={"id": "\d+"})
     * @Template()
     * @Method("GET")
     * @ParamConverter("klasse", class="ROTIISBundle:Klasse")
     */
    public function logAction(Klasse $klasse) {}

    /**
     * @Route("/{id}/revert/{version}", requirements={"id": "\d+", "version": "\d+"})
     * @Method("GET")
     * @ParamConverter("klasse", class="ROTIISBundle:Klasse")
     * @Secure(roles="ROLE_WIJZIG_IIS")
     */
    public function revertAction(Klasse $klasse, $version) {}
    
    /**
     * @Route("/{id}/edit", requirements={"id"="\d+"})
     * @Template()
     * @Method("GET")
     * @ParamConverter("klasse", class="ROTIISBundle:Klasse")
     * @Secure(roles="ROLE_WIJZIG_IIS")
     */
    public function editAction(Klasse $klasse) {
        $response = new Response();
        $response->setLastModified($klasse->getUpdatedAt());
        if ($response->isNotModified($this->getRequest())) {
            return $response;
        }

        return $this->render('ROTIISBundle:Klasse:show.html.twig', array(
			'klasse' => $klasse,
			'form' => $this->createForm(new KlasseType(), $klasse)->createView()
		), $response);
    }
    
    /**
     * @Route("/{id}", requirements={"id"="\d+"})
     * @Method("PUT")
     * @ParamConverter("klasse", class="ROTIISBundle:Klasse")
     * @Secure(roles="ROLE_WIJZIG_IIS")
     */
    public function updateAction(Klasse $klasse) {
        $form = $this->createForm(new KlasseType(), $klasse);
        $flash = $this->getRequest()->getSession()->getFlashBag();

		$form->submit($this->getRequest());
		if ($form->isValid()) {
			$em = $this->getDoctrine()->getManager();
			$em->persist($klasse);
			$em->flush();

            $flash->add('notice', 'Klasse "' . $klasse . '" opgeslagen');

			return $this->redirect($this->generateUrl('rot_iis_klasse_show', array(
				'id' => $klasse->getId()
			)));
		}

        $flash->add('error', 'Fouten gevonden, klasse "' . $klasse . '" is niet opgeslagen');

		return $this->render('ROTIISBundle:Klasse:edit.html.twig', array(
            'klasse' => $klasse,
			'form' => $form->createView()
		));
    }
    
     /**
      * @Route("/{id}", requirements={"id"="\d+"})
      * @Template()
      * @Method("DELETE")
      * @ParamConverter("klasse", class="ROTIISBundle:Klasse")
      * @Secure(roles="ROLE_WIJZIG_IIS")
      */
    public function deleteAction(Klasse $klasse) {
        $em = $this->getDoctrine()->getManager();
        $em->remove($klasse);
        $em->flush();        
		
		return $this->redirect($this->generateUrl('rot_iis_klasse_index'));
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
                'filter_class' => new KlasseFilterType()
            ))->createView()
        );
    }

    /**
     * @Route("/filter", requirements={"id"="\d+"})
     * @Method("POST")
     */
    public function createFilterAction() {
        $filter = new Filter();
        $filter->setType('Klasse');
        $form = $this->createForm(new FilterWrappingType(), $filter, array(
            'filter_class' => new KlasseFilterType()
        ));

        if ($this->handleFilterForm($form)) {
            return $this->redirect($this->generateUrl('rot_iis_klasse_filter', array(
                'id' => $filter->getId()
            )));
        }

        return $this->render('ROTIISBundle:Klasse:newFilter.html.twig', array(
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
                'filter_class' => new KlasseFilterType()
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
            'filter_class' => new KlasseFilterType()
        ));

        if ($this->handleFilterForm($form)) {
            return $this->redirect($this->generateUrl('rot_iis_klasse_filter', array(
                'id' => $filter->getId()
            )));
        }

        return $this->render('ROTIISBundle:Klasse:editFilter.html.twig', array(
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

        return $this->redirect($this->generateUrl('rot_iis_klasse_index'));
    }
}
