<?php

namespace ROT\Bundle\IISBundle\Controller;

use ROT\Bundle\AdminBundle\Entity\Filter;
use ROT\Bundle\AdminBundle\Form\Type\FilterWrappingType;
use ROT\Bundle\IISBundle\Form\Type\NationaliteitFilterType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Cache;
use JMS\SecurityExtraBundle\Annotation\Secure;
use ROT\Bundle\IISBundle\Entity\Nationaliteit;
use ROT\Bundle\IISBundle\Form\Type\NationaliteitType;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route("/nationaliteit")
 */
class NationaliteitController extends Controller
{
   /**
     * @Route("/")
	 * @Method("GET")
     */
    public function indexAction() {
        $em = $this->getDoctrine()->getManager();
        $respository = $em->getRepository('ROTIISBundle:Nationaliteit');

        $response = new Response();
        $response->setLastModified($respository->getIndexModificationTime());
        if ($response->isNotModified($this->getRequest())) {
            return $response;
        }

		return $this->render('ROTIISBundle:Nationaliteit:index.html.twig', array(
            'active_filter' => false,
            'filters' => $em->getRepository('ROTAdminBundle:Filter')->findByTypeOrderedByName('Nationaliteit'),
			'nationaliteiten' => $respository->findAll()
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
        $repository = $em->getRepository('ROTIISBundle:Nationaliteit');
        $qb = $repository->createQueryBuilder('n');
        $repository->applyFilterToQueryBuilder($filter->getContent(), 'n', $qb);

        return $this->render('ROTIISBundle:Nationaliteit:index.html.twig', array(
            'active_filter' => $filter,
            'filters' => $em->getRepository('ROTAdminBundle:Filter')->findByTypeOrderedByName('Nationaliteit'),
            'nationaliteiten' => $qb->getQuery()->getResult()
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
			'form' => $this->createForm(new NationaliteitType(), new Nationaliteit())->createView()
		);
    }
    
    /**
     * @Route("/")
     * @Method("POST")
     * @Secure(roles="ROLE_WIJZIG_IIS")
     */
    public function createAction() {
		$nationaliteit = new Nationaliteit();
        $form = $this->createForm(new NationaliteitType(), $nationaliteit);
        $flash = $this->getRequest()->getSession()->getFlashBag();
		
		$form->submit($this->getRequest());
		if ($form->isValid()) {
			$em = $this->getDoctrine()->getManager();
			$em->persist($nationaliteit);
			$em->flush();

            $flash->add('notice', 'Nationaliteit "' . $nationaliteit . '" aangemaakt');

			return $this->redirect($this->generateUrl('rot_iis_nationaliteit_show', array(
				'id' => $nationaliteit->getId()
			)));
		}

        $flash->add('error', 'Fouten gevonden, nationaliteit is niet aangemaakt');
		
		return $this->render('ROTIISBundle:Nationaliteit:new.html.twig', array(
			'form' => $form->createView()
		));
    }
    
    /**
     * @Route("/{id}")
     * @Method("GET")
     * @ParamConverter("nationaliteit", class="ROTIISBundle:Nationaliteit")
     */
    public function showAction(Nationaliteit $nationaliteit) {
        $response = new Response();
        $response->setLastModified($nationaliteit->getUpdatedAt());
        if ($response->isNotModified($this->getRequest())) {
            return $response;
        }

        return $this->render('ROTIISBundle:Nationaliteit:show.html.twig', array(
			'nationaliteit' => $nationaliteit
		), $response);
    }

    /**
     * @Route("/{id}/log", requirements={"id": "\d+"})
     * @Template()
     * @Method("GET")
     * @ParamConverter("nationaliteit", class="ROTIISBundle:Nationaliteit")
     */
    public function logAction(Nationaliteit $nationaliteit) {}

    /**
     * @Route("/{id}/revert/{version}", requirements={"id": "\d+", "version": "\d+"})
     * @Method("GET")
     * @ParamConverter("nationaliteit", class="ROTIISBundle:Nationaliteit")
     * @Secure(roles="ROLE_WIJZIG_IIS")
     */
    public function revertAction(Nationaliteit $nationaliteit, $version) {}
    
    /**
     * @Route("/{id}/edit")
     * @Template()
     * @Method("GET")
     * @ParamConverter("nationaliteit", class="ROTIISBundle:Nationaliteit")
     * @Secure(roles="ROLE_WIJZIG_IIS")
     */
    public function editAction(Nationaliteit $nationaliteit) {
        $response = new Response();
        $response->setLastModified($nationaliteit->getUpdatedAt());
        if ($response->isNotModified($this->getRequest())) {
            return $response;
        }

        return $this->render('ROTIISBundle:Nationaliteit:edit.html.twig', array(
			'nationaliteit' => $nationaliteit,
			'form' => $this->createForm(new NationaliteitType(), $nationaliteit)->createView()
		), $response);
    }
    
    /**
     * @Route("/{id}")
     * @Method("PUT")
     * @ParamConverter("nationaliteit", class="ROTIISBundle:Nationaliteit")
     * @Secure(roles="ROLE_WIJZIG_IIS")
     */
    public function updateAction(Nationaliteit $nationaliteit) {
        $form = $this->createForm(new NationaliteitType(), $nationaliteit);
        $flash = $this->getRequest()->getSession()->getFlashBag();

		$form->submit($this->getRequest());
		if ($form->isValid()) {
			$em = $this->getDoctrine()->getManager();
			$em->persist($nationaliteit);
			$em->flush();

            $flash->add('notice', 'Nationaliteit "' . $nationaliteit. '" opgeslagen');

			return $this->redirect($this->generateUrl('rot_iis_nationaliteit_show', array(
				'id' => $nationaliteit->getId()
			)));
		}

        $flash->add('error', 'Fouten gevonden, nationaliteit "' . $nationaliteit . '" is niet opgeslagen');
		
		return $this->render('ROTIISBundle:Nationaliteit:edit.html.twig', array(
            'nationaliteit' => $nationaliteit,
			'form' => $form->createView()
		));
    }
    
     /**
      * @Route("/{id}")
      * @Template()
      * @Method("DELETE")
      * @ParamConverter("nationaliteit", class="ROTIISBundle:Nationaliteit")
      * @Secure(roles="ROLE_WIJZIG_IIS")
      */
    public function deleteAction(Nationaliteit $nationaliteit) {
        $em = $this->getDoctrine()->getManager();
        $em->remove($nationaliteit);
        $em->flush();        
		
		return $this->redirect($this->generateUrl('rot_iis_nationaliteit_index'));
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
                'filter_class' => new NationaliteitFilterType()
            ))->createView()
        );
    }

    /**
     * @Route("/filter", requirements={"id"="\d+"})
     * @Method("POST")
     */
    public function createFilterAction() {
        $filter = new Filter();
        $filter->setType('Nationaliteit');
        $form = $this->createForm(new FilterWrappingType(), $filter, array(
            'filter_class' => new NationaliteitFilterType()
        ));

        if ($this->handleFilterForm($form)) {
            return $this->redirect($this->generateUrl('rot_iis_nationaliteit_filter', array(
                'id' => $filter->getId()
            )));
        }

        return $this->render('ROTIISBundle:Nationaliteit:newFilter.html.twig', array(
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
                'filter_class' => new NationaliteitFilterType()
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
            'filter_class' => new NationaliteitFilterType()
        ));

        if ($this->handleFilterForm($form)) {
            return $this->redirect($this->generateUrl('rot_iis_nationaliteit_filter', array(
                'id' => $filter->getId()
            )));
        }

        return $this->render('ROTIISBundle:Nationaliteit:editFilter.html.twig', array(
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

        return $this->redirect($this->generateUrl('rot_iis_nationaliteit_index'));
    }
}
