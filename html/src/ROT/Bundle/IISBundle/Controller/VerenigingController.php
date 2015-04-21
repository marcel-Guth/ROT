<?php

namespace ROT\Bundle\IISBundle\Controller;

use ROT\Bundle\AdminBundle\Entity\Filter;
use ROT\Bundle\AdminBundle\Form\Type\FilterWrappingType;
use ROT\Bundle\IISBundle\Form\Type\VerenigingFilterType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Cache;
use JMS\SecurityExtraBundle\Annotation\Secure;
use ROT\Bundle\IISBundle\Entity\Vereniging;
use ROT\Bundle\IISBundle\Form\Type\VerenigingType;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route("/vereniging")
 */
class VerenigingController extends Controller
{
	
	/**
	 * @Route("/")
	 * @Template()
	 * @Method("GET")
	 */
	public function indexAction() {
        $em = $this->getDoctrine()->getManager();
        $respository = $em->getRepository('ROTIISBundle:Vereniging');

        $response = new Response();
        $response->setLastModified($respository->getIndexModificationTime());
        if ($response->isNotModified($this->getRequest())) {
            return $response;
        }

        return $this->render('ROTIISBundle:Vereniging:index.html.twig', array(
            'active_filter' => false,
            'filters' => $em->getRepository('ROTAdminBundle:Filter')->findByTypeOrderedByName('Vereniging'),
			'verenigingen' => $respository->findAll()
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
        $repository = $em->getRepository('ROTIISBundle:Vereniging');
        $qb = $repository->createQueryBuilder('v');
        $repository->applyFilterToQueryBuilder($filter->getContent(), 'v', $qb);

        return $this->render('ROTIISBundle:Vereniging:index.html.twig', array(
            'active_filter' => $filter,
            'filters' => $em->getRepository('ROTAdminBundle:Filter')->findByTypeOrderedByName('Vereniging'),
            'verenigingen' => $qb->getQuery()->getResult()
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
			'form' => $this->createForm(new VerenigingType(), new Vereniging())->createView()
		);
    }
    
    /**
     * @Route("/")
     * @Method("POST")
     * @Secure(roles="ROLE_WIJZIG_IIS")
     */
    public function createAction() {
		$vereniging = new Vereniging();
        $form = $this->createForm(new VerenigingType(), $vereniging);
        $flash = $this->getRequest()->getSession()->getFlashBag();
		
		$form->submit($this->getRequest());
		if ($form->isValid()) {
			$em = $this->getDoctrine()->getManager();
			$em->persist($vereniging);
			$em->flush();

            $flash->add('notice', 'Vereniging "' . $vereniging . '" aangemaakt');

			return $this->redirect($this->generateUrl('rot_iis_vereniging_show', array(
				'id' => $vereniging->getId()
			)));
		}

        $flash->add('error', 'Fouten gevonden, vereniging is niet aangemaakt');
		
		return $this->render('ROTIISBundle:Vereniging:new.html.twig', array(
			'form' => $form->createView()
		));
    }
    
    /**
     * @Route("/{id}", requirements={"id"="\d+"})
     * @Template()
     * @Method("GET")
     * @ParamConverter("vereniging", class="ROTIISBundle:Vereniging")
     */
    public function showAction(Vereniging $vereniging) {
        $response = new Response();
        $response->setLastModified($vereniging->getUpdatedAt());
        if ($response->isNotModified($this->getRequest())) {
            return $response;
        }

        return $this->render('ROTIISBundle:Vereniging:show.html.twig', array(
			'vereniging' => $vereniging
		), $response);
    }

    /**
     * @Route("/{id}/log", requirements={"id": "\d+"})
     * @Template()
     * @Method("GET")
     * @ParamConverter("vereniging", class="ROTIISBundle:Vereniging")
     */
    public function logAction(Vereniging $vereniging) {}

    /**
     * @Route("/{id}/revert/{version}", requirements={"id": "\d+", "version": "\d+"})
     * @Method("GET")
     * @ParamConverter("vereniging", class="ROTIISBundle:Vereniging")
     * @Secure(roles="ROLE_WIJZIG_IIS")
     */
    public function revertAction(Vereniging $vereniging, $version) {}
    
    /**
     * @Route("/{id}/edit", requirements={"id"="\d+"})
     * @Template()
     * @Method("GET")
     * @ParamConverter("vereniging", class="ROTIISBundle:Vereniging")
     * @Secure(roles="ROLE_WIJZIG_IIS")
     */
    public function editAction(Vereniging $vereniging) {
        $response = new Response();
        $response->setLastModified($vereniging->getUpdatedAt());
        if ($response->isNotModified($this->getRequest())) {
            return $response;
        }

        return $this->render('ROTIISBundle:Vereniging:show.html.twig', array(
			'vereniging' => $vereniging,
			'form' => $this->createForm(new VerenigingType(), $vereniging)->createView()
		), $response);
    }
    
    /**
     * @Route("/{id}", requirements={"id"="\d+"})
     * @Method("PUT")
     * @ParamConverter("vereniging", class="ROTIISBundle:Vereniging")
     * @Secure(roles="ROLE_WIJZIG_IIS")
     */
    public function updateAction(Vereniging $vereniging) {
        $form = $this->createForm(new VerenigingType(), $vereniging);
        $flash = $this->getRequest()->getSession()->getFlashBag();

		$form->submit($this->getRequest());
		if ($form->isValid()) {
			$em = $this->getDoctrine()->getManager();
			$em->persist($vereniging);
			$em->flush();

            $flash->add('notice', 'Vereniging "' . $vereniging . '" opgeslagen');

            return $this->redirect($this->generateUrl('rot_iis_vereniging_show', array(
				'id' => $vereniging->getId()
			)));
		}

        $flash->add('error', 'Fouten gevonden, vereniging "' . $vereniging . '" is niet opgeslagen');
		
		return $this->render('ROTIISBundle:Vereniging:edit.html.twig', array(
            'vereniging' => $vereniging,
			'form' => $form->createView()
		));
    }
    
     /**
      * @Route("/{id}", requirements={"id"="\d+"})
      * @Template()
      * @Method("DELETE")
      * @ParamConverter("vereniging", class="ROTIISBundle:Vereniging")
      * @Secure(roles="ROLE_WIJZIG_IIS")
      */
    public function deleteAction(Vereniging $vereniging) {
        $em = $this->getDoctrine()->getManager();
        $em->remove($vereniging);
        $em->flush();        
		
		return $this->redirect($this->generateUrl('rot_iis_vereniging_index'));
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
                'filter_class' => new VerenigingFilterType()
            ))->createView()
        );
    }

    /**
     * @Route("/filter", requirements={"id"="\d+"})
     * @Method("POST")
     */
    public function createFilterAction() {
        $filter = new Filter();
        $filter->setType('Vereniging');
        $form = $this->createForm(new FilterWrappingType(), $filter, array(
            'filter_class' => new VerenigingFilterType()
        ));

        if ($this->handleFilterForm($form)) {
            return $this->redirect($this->generateUrl('rot_iis_vereniging_filter', array(
                'id' => $filter->getId()
            )));
        }

        return $this->render('ROTIISBundle:Vereniging:newFilter.html.twig', array(
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
                'filter_class' => new VerenigingFilterType()
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
            'filter_class' => new VerenigingFilterType()
        ));

        if ($this->handleFilterForm($form)) {
            return $this->redirect($this->generateUrl('rot_iis_vereniging_filter', array(
                'id' => $filter->getId()
            )));
        }

        return $this->render('ROTIISBundle:Vereniging:editFilter.html.twig', array(
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

        return $this->redirect($this->generateUrl('rot_iis_vereniging_index'));
    }
}
