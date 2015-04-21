<?php

namespace ROT\Bundle\AdminBundle\Controller;

use ROT\Bundle\AdminBundle\Form\Type\PasswordType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Cache;
use JMS\SecurityExtraBundle\Annotation\Secure;
use ROT\Bundle\AdminBundle\Entity\Gebruiker;
use ROT\Bundle\AdminBundle\Form\Type\GebruikerType;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route("/gebruiker")
 */
class GebruikerController extends Controller {

	/**
	 * @Route("/")
	 * @Method("GET")
	 * @Secure(roles="ROLE_BEKIJK_GEBRUIKERS")
	 */
	public function indexAction() {
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('ROTAdminBundle:Gebruiker');

        $response = new Response();
        $response->setLastModified($repository->getIndexModificationTime());
        if ($response->isNotModified($this->getRequest())) {
            return $response;
        }

		return $this->render('ROTAdminBundle:Gebruiker:index.html.twig', array(
            'active_filter' => false,
            'filters' => $em->getRepository('ROTAdminBundle:Filter')->findByTypeOrderedByName('Gebruiker'),
			'gebruikers' => $repository->findAll()
		), $response);
	}

    /**
     * @Route("/filter")
     * @Method("GET")
     * @Secure(roles="ROLE_BEKIJK_GEBRUIKERS")
     */
    public function filterAction() {}

    /**
     * @Route("/new")
     * @Template()
     * @Method("GET")
     * @Secure(roles="ROLE_WIJZIG_GEBRUIKERS")
     */
    public function newAction() {
            return array(
                    'form' => $this->createForm(new GebruikerType(), new Gebruiker())->createView()
            );
    }

    /**
     * @Route("/")
     * @Method("POST")
     * @Secure(roles="ROLE_WIJZIG_GEBRUIKERS")
     */
    public function createAction() {
            $gebruiker = new Gebruiker();
            $form = $this->createForm(new GebruikerType(), $gebruiker);

            $request = $this->getRequest();
            if ($request->isMethod("POST")) {
                    $form->submit($request);
                    if ($form->isValid()) {
                            $em = $this->getDoctrine()->getManager();
                            $em->persist($gebruiker);
                            $em->flush();
                            return $this->redirect($this->generateUrl('rot_admin_gebruiker_show', array(
                                    'id' => $gebruiker->getId()
                            )));
                    }
            }

            return $this->render('ROTAdminBundle:Gebruiker:new.html.twig', array(
                    'form' => $form->createView()
            ));
    }

    /**
     * @Route("/{id}", requirements={"id": "\d+"})
     * @Method("GET")
     * @ParamConverter("gebruiker", class="ROTAdminBundle:Gebruiker")
     * @Secure(roles="ROLE_BEKIJK_GEBRUIKERS")
     */
    public function showAction(Gebruiker $gebruiker) {
    $response = new Response();
    $response->setLastModified($gebruiker->getUpdatedAt());

    if ($response->isNotModified($this->getRequest())) {
        return $response;
    }

            return $this->render('ROTAdminBundle:Gebruiker:show.html.twig', array(
                    'gebruiker' => $gebruiker
            ), $response);
    }

    /**
     * @Route("/{id}/log", requirements={"id": "\d+"})
     * @Template()
     * @Method("GET")
     * @ParamConverter("gebruiker", class="ROTAdminBundle:Gebruiker")
     * @Secure(roles="ROLE_BEKIJK_GEBRUIKERS")
     */
    public function logAction(Gebruiker $gebruiker) {}

    /**
     * @Route("/{id}/revert/{version}", requirements={"id": "\d+", "version": "\d+"})
     * @Method("GET")
     * @ParamConverter("gebruiker", class="ROTAdminBundle:Gebruiker")
     * @Secure(roles="ROLE_BEKIJK_GEBRUIKERS")
     */
    public function revertAction(Gebruiker $gebruiker, $version) {}

	/**
	 * @Route("/{id}/edit", requirements={"id": "\d+"})
	 * @Method("GET")
	 * @ParamConverter("gebruiker", class="ROTAdminBundle:Gebruiker")
	 * @Secure(roles="ROLE_WIJZIG_GEBRUIKERS")
	 */
	public function editAction(Gebruiker $gebruiker) {
        $response = new Response();
        $response->setLastModified($gebruiker->getUpdatedAt());

        if ($response->isNotModified($this->getRequest())) {
            return $response;
        }

		$form = $this->createForm(new GebruikerType(), $gebruiker);

		return $this->render('ROTAdminBundle:Gebruiker:edit.html.twig', array(
			'gebruiker' => $gebruiker,
			'form' => $form->createView()
		), $response);
	}

	/**
	 * @Route("/{id}", requirements={"id": "\d+"})
	 * @Method("PUT")
	 * @ParamConverter("gebruiker", class="ROTAdminBundle:Gebruiker")
	 * @Secure(roles="ROLE_WIJZIG_GEBRUIKERS")
	 */
	public function updateAction(Gebruiker $gebruiker) {
		$form = $this->createForm(new GebruikerType(), $gebruiker);

		$form->submit($this->getRequest());
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($gebruiker);
            $em->flush();

            return $this->redirect($this->generateUrl('rot_admin_gebruiker_show', array(
                'id' => $gebruiker->getId()
            )));
        }

		return $this->render('ROTAdminBundle:Gebruiker:edit.html.twig', array(
            'gebruiker' => $gebruiker,
            'form' => $form->createView()
		));
	}

    /**
     * @Route("/{id}/password/edit", requirements={"id": "\d+"})
     * @Method("GET")
     * @ParamConverter("gebruiker", class="ROTAdminBundle:Gebruiker")
     * @Secure(roles="ROLE_WIJZIG_GEBRUIKERS")
     */
    public function editPasswordAction(Gebruiker $gebruiker) {
        $response = new Response();
        $response->setLastModified($gebruiker->getUpdatedAt());

        if ($response->isNotModified($this->getRequest())) {
            return $response;
        }

        return $this->render('ROTAdminBundle:Gebruiker:editPassword.html.twig', array(
            'gebruiker' => $gebruiker,
            'form' => $this->createForm(new PasswordType())->createView()
        ), $response);
    }

    /**
     * @Route("/{id}/password", requirements={"id": "\d+"})
     * @Method("PUT")
     * @ParamConverter("gebruiker", class="ROTAdminBundle:Gebruiker")
     * @Secure(roles="ROLE_WIJZIG_GEBRUIKERS")
     */
    public function updatePasswordAction(Gebruiker $gebruiker) {
        $form = $this->createForm(new PasswordType());
        $flash = $this->getRequest()->getSession()->getFlashBag();
        
        $form->submit($this->getRequest());
        if ($form->isValid()) 
        {
            $password = $form->getData()['password'];
            if(preg_match('/(?=.*[A-Z])(?=.*[?\~!@#$%^&*()_+|}{><,.;])(?=.*[0-9])(?=.*[a-z]).{8}/', $password))
            {
            $em = $this->getDoctrine()->getManager();
            $gebruiker->setPassword($this->container->get('security.encoder_factory')->getEncoder($gebruiker)->encodePassword($form->getData()['password'], $gebruiker->getSalt()));
            $em->persist($gebruiker);
            $em->flush();

            $flash->add('notice', 'Wachtwoord gewijzigd voor gebruiker "' . $gebruiker . "");

            return $this->redirect($this->generateUrl('rot_admin_gebruiker_show', array(
                'id' => $gebruiker->getId()
            )));
            }
            else
            {
                $flash->add('error', 'Uw wachtwoord voldoet niet aan de gestelde eisen. (Minimaal 1 hoofletter, 1 kleine letter, 1 cijfer , 1 speciaal teken en een minimum van 8 karakters.) "' . $gebruiker . '"');
            }
        }

        return $this->render('ROTAdminBundle:Gebruiker:editPassword.html.twig', array(
            'gebruiker' => $gebruiker,
            'form' => $form->createView()
        ));
    }

	/**
	 * @Route("/{id}", requirements={"id": "\d+"})
	 * @Template()
	 * @Method("DELETE")
	 * @ParamConverter("gebruiker", class="ROTAdminBundle:Gebruiker")
	 * @Secure(roles="ROLE_WIJZIG_GEBRUIKERS")
	 */
	public function deleteAction(Gebruiker $gebruiker) {
		$em = $this->getDoctrine()->getManager();
		$em->remove($gebruiker);
		$em->flush();

		return $this->redirect($this->generateUrl('rot_admin_gebruiker_index'), 303);
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
                'filter_class' => new GebruikerFilterType()
            ))->createView()
        );
    }

    /**
     * @Route("/filter", requirements={"id"="\d+"})
     * @Method("POST")
     */
    public function createFilterAction() {
        $filter = new Filter();
        $filter->setType('Gebruiker');
        $form = $this->createForm(new FilterWrappingType(), $filter, array(
            'filter_class' => new GebruikerFilterType()
        ));

        if ($this->handleFilterForm($form)) {
            return $this->redirect($this->generateUrl('rot_iis_gebruiker_filter', array(
                'id' => $filter->getId()
            )));
        }

        return $this->render('ROTIISBundle:Gebruiker:newFilter.html.twig', array(
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
                'filter_class' => new GebruikerFilterType()
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
            'filter_class' => new GebruikerFilterType()
        ));

        if ($this->handleFilterForm($form)) {
            return $this->redirect($this->generateUrl('rot_iis_gebruiker_filter', array(
                'id' => $filter->getId()
            )));
        }

        return $this->render('ROTIISBundle:Gebruiker:editFilter.html.twig', array(
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

        return $this->redirect($this->generateUrl('rot_iis_gebruiker_index'));
    }
}
