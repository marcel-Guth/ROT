<?php

namespace ROT\Bundle\IISBundle\Controller;

use ROT\Bundle\AdminBundle\Entity\Filter;
use ROT\Bundle\AdminBundle\Form\Type\FilterWrappingType;
use ROT\Bundle\IISBundle\Form\Type\BootFilterType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Cache;
use JMS\SecurityExtraBundle\Annotation\Secure;
use ROT\Bundle\IISBundle\Entity\Boot;
use ROT\Bundle\IISBundle\Form\Type\BootType;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route("/boot")
 */
class BootController extends Controller
{
	/**
     * @Route("/")
     * @Method("GET")
     */
    public function indexAction() {
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('ROTIISBundle:Boot');

        $response = new Response();
        $response->setLastModified($repository->getIndexModificationTime());
        if ($response->isNotModified($this->getRequest())) {
            return $response;
        }

        return $this->render('ROTIISBundle:Boot:index.html.twig', array(
            'active_filter' => false,
            'filters' => $em->getRepository('ROTAdminBundle:Filter')->findByTypeOrderedByName('Boot'),
            'boten' => $repository->findAll()
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
        $repository = $em->getRepository('ROTIISBundle:Boot');
        $qb = $repository->createQueryBuilder('b');
        $repository->applyFilterToQueryBuilder($filter->getContent(), 'b', $qb);

        return $this->render('ROTIISBundle:Boot:index.html.twig', array(
            'active_filter' => $filter,
            'filters' => $em->getRepository('ROTAdminBundle:Filter')->findByTypeOrderedByName('Boot'),
            'boten' => $qb->getQuery()->getResult()
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
			'form' => $this->createForm(new BootType(), new Boot())->createView()
		);
    }
    
    /**
     * @Route("/")
     * @Method("POST")
     * @Secure(roles="ROLE_WIJZIG_IIS")
     */
    public function createAction() {
		$boot = new Boot();
        $form = $this->createForm(new BootType(), $boot);
        $flash = $this->getRequest()->getSession()->getFlashBag();
		
		$form->submit($this->getRequest());
		if ($form->isValid()) {
			$em = $this->getDoctrine()->getManager();
			$em->persist($boot);
			$em->flush();

            $flash->add('notice', 'Boot "' . $boot . '" aangemaakt');

			return $this->redirect($this->generateUrl('rot_iis_boot_show', array(
				'id' => $boot->getId()
			)));
		}

        $flash->add('error', 'Fouten gevonden, boot is niet aangemaakt');
		
		return $this->render('ROTIISBundle:Boot:new.html.twig', array(
			'form' => $form->createView()
		));
    }
    
    /**
     * @Route("/{id}", requirements={"id"="\d+"})
     * @Method("GET")
     * @ParamConverter("boot", class="ROTIISBundle:Boot")
     */
    public function showAction(Boot $boot) {
        $response = new Response();
        $response->setLastModified($boot->getUpdatedAt());
        if ($response->isNotModified($this->getRequest())) {
            return $response;
        }

        return $this->render('ROTIISBundle:Boot:show.html.twig', array(
			'boot' => $boot
		), $response);
    }

    /**
     * @Route("/{id}/log", requirements={"id": "\d+"})
     * @Template()
     * @Method("GET")
     * @ParamConverter("boot", class="ROTIISBundle:Boot")
     */
    public function logAction(Boot $boot) {}

    /**
     * @Route("/{id}/revert/{version}", requirements={"id": "\d+", "version": "\d+"})
     * @Method("GET")
     * @ParamConverter("boot", class="ROTIISBundle:Boot")
     * @Secure(roles="ROLE_WIJZIG_IIS")
     */
    public function revertAction(Boot $boot, $version) {}
    
    /**
     * @Route("/{id}/edit", requirements={"id"="\d+"})
     * @Method("GET")
     * @ParamConverter("boot", class="ROTIISBundle:Boot")
     * @Secure(roles="ROLE_WIJZIG_IIS")
     */
    public function editAction(Boot $boot) {
        $response = new Response();
        $response->setLastModified($boot->getUpdatedAt());
        if ($response->isNotModified($this->getRequest())) {
            return $response;
        }

        return $this->render('ROTIISBundle:Boot:edit.html.twig', array(
			'boot' => $boot,
			'form' => $this->createForm(new BootType(), $boot)->createView()
		), $response);
    }
    
    /**
     * @Route("/{id}", requirements={"id"="\d+"})
     * @Method("PUT")
     * @ParamConverter("boot", class="ROTIISBundle:Boot")
     * @Secure(roles="ROLE_WIJZIG_IIS")
     */
    public function updateAction(Boot $boot) {
        $form = $this->createForm(new BootType(), $boot);
        $flash = $this->getRequest()->getSession()->getFlashBag();

		$form->submit($this->getRequest());
		if ($form->isValid()) {
			$em = $this->getDoctrine()->getManager();
			$em->persist($boot);
			$em->flush();

            $flash->add('notice', 'Boot "' . $boot . '" opgeslagen');

			return $this->redirect($this->generateUrl('rot_iis_boot_show', array(
				'id' => $boot->getId()
			)));
		}

        $flash->add('error', 'Fouten gevonden, boot "' . $boot . '" is niet opgeslagen');

		return $this->render('ROTIISBundle:Boot:edit.html.twig', array(
            'boot' => $boot,
			'form' => $form->createView()
		));
    }
    
     /**
      * @Route("/{id}", requirements={"id"="\d+"})
      * @Template()
      * @Method("DELETE")
      * @ParamConverter("boot", class="ROTIISBundle:Boot")
      * @Secure(roles="ROLE_WIJZIG_IIS")
      */
    public function deleteAction(Boot $boot) {
        $em = $this->getDoctrine()->getManager();
        $em->remove($boot);
        $em->flush();        
		
		return $this->redirect($this->generateUrl('rot_iis_boot_index'));
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
                'filter_class' => new BootFilterType()
            ))->createView()
        );
    }

    /**
     * @Route("/filter", requirements={"id"="\d+"})
     * @Method("POST")
     */
    public function createFilterAction() {
        $filter = new Filter();
        $filter->setType('Boot');
        $form = $this->createForm(new FilterWrappingType(), $filter, array(
            'filter_class' => new BootFilterType()
        ));

        if ($this->handleFilterForm($form)) {
            return $this->redirect($this->generateUrl('rot_iis_boot_filter', array(
                'id' => $filter->getId()
            )));
        }

        return $this->render('ROTIISBundle:Boot:newFilter.html.twig', array(
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
                'filter_class' => new BootFilterType()
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
            'filter_class' => new BootFilterType()
        ));

        if ($this->handleFilterForm($form)) {
            return $this->redirect($this->generateUrl('rot_iis_boot_filter', array(
                'id' => $filter->getId()
            )));
        }

        return $this->render('ROTIISBundle:Boot:editFilter.html.twig', array(
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

        return $this->redirect($this->generateUrl('rot_iis_boot_index'));
    }
}
