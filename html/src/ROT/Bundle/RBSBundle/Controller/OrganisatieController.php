<?php

namespace ROT\Bundle\RBSBundle\Controller;

use ROT\Bundle\AdminBundle\Form\Type\FilterWrappingType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Cache;
use JMS\SecurityExtraBundle\Annotation\Secure;
use ROT\Bundle\RBSBundle\Entity\Organisatie;
use ROT\Bundle\RBSBundle\Form\Type\OrganisatieType;
use ROT\Bundle\RBSBundle\Form\Type\OrganisatieFilterType;
use Symfony\Component\Form\Form;
use ROT\Bundle\AdminBundle\Entity\Filter;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route("/organisatie")
 */
class OrganisatieController extends Controller
{
    private function handleForm($form) {
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
     * @Route("/")
	 * @Method("GET")
     */
    public function indexAction() {
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('ROTRBSBundle:Organisatie');

        $response = new Response();
        $response->setLastModified($repository->getIndexModificationTime());
        if ($response->isNotModified($this->getRequest())) {
            return $response;
        }

        return $this->render('ROTRBSBundle:Organisatie:index.html.twig', array(
            'active_filter' => false,
            'filters' => $em->getRepository('ROTAdminBundle:Filter')->findByTypeOrderedByName('Organisatie'),
			'organisaties' => $repository->findAll()
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
        $repository = $em->getRepository('ROTRBSBundle:Organisatie');
        $qb = $repository->createQueryBuilder('o');
        $repository->applyFilterToQueryBuilder($filter->getContent(), 'o', $qb);

        return $this->render('ROTRBSBundle:Organisatie:index.html.twig', array(
            'active_filter' => $filter,
            'filters' => $em->getRepository('ROTAdminBundle:Filter')->findByTypeOrderedByName('Organisatie'),
            'organisaties' => $qb->getQuery()->getResult()
        ));
    }
	
    /**
     * @Route("/new")
     * @Template()
     * @Method("GET")
     * @Secure(roles="ROLE_WIJZIG_RBS")
     */
    public function newAction() {
        return array(
			'form' => $this->createForm(new OrganisatieType())->createView()
		);
    }
    
    /**
     * @Route("/")
     * @Method("POST")
     * @Secure(roles="ROLE_WIJZIG_RBS")
     */
    public function createAction() {
		$organisatie = new Organisatie();
        $form = $this->createForm(new OrganisatieType(), $organisatie);
        $flash = $this->getRequest()->getSession()->getFlashBag();

		if ($this->handleForm($form)) {
            $flash->add('notice', 'Organiisatie "' . $organisatie . '" aangemaakt');

			return $this->redirect($this->generateUrl('rot_rbs_organisatie_show', array(
				'id' => $organisatie->getId()
			)));
		}

        $flash->add('error', 'Fouten gevonden, organisatie is niet aangemaakt');
		
		return $this->render('ROTRBSBundle:Organisatie:new.html.twig', array(
			'form' => $form->createView()
		));
    }
    
    /**
     * @Route("/{id}", requirements={"id": "\d+"})
     * @Method("GET")
     * @ParamConverter("organisatie", class="ROTRBSBundle:Organisatie")
     */
    public function showAction(Organisatie $organisatie) {
        $response = new Response();
        $response->setLastModified($organisatie->getUpdatedAt());
        if ($response->isNotModified($this->getRequest())) {
            return $response;
        }

        return $this->render('ROTRBSBundle:Organisatie:show.html.twig', array(
			'organisatie' => $organisatie
		), $response);
    }

    /**
     * @Route("/{id}/log", requirements={"id": "\d+"})
     * @Template()
     * @Method("GET")
     * @ParamConverter("organisatie", class="ROTRBSBundle:Organisatie")
     */
    public function logAction(Organisatie $organisatie) {
        return array(
            'organisatie' => $organisatie,
            'log_entries' => $this->getDoctrine()->getManager()->getRepository('ROTAdminBundle:LogEntry')->getLogEntriesWithLimit($organisatie, 20)
        );
    }

    /**
     * @Route("/{id}/log/revert/{version}", requirements={"id": "\d+", "version": "\d+"})
     * @Method("POST")
     * @ParamConverter("organisatie", class="ROTRBSBundle:Organisatie")
     * @Secure(roles="ROLE_WIJZIG_RBS")
     */
    public function revertAction(Organisatie $organisatie, $version) {
        $em = $this->getDoctrine()->getManager();
        $em->getRepository('ROTAdminBundle:LogEntry')->revert($organisatie, $version);
        $em->persist($organisatie);
        $em->flush();

        $this->getRequest()->getSession()->getFlashBag()->add('notice', 'Organisatie "' . $organisatie . '" hersteld naar versie "' . $version . '"');

        return $this->redirect($this->generateUrl('rot_rbs_organisatie_show', array(
            'id' => $organisatie->getId()
        )));
    }
    
    /**
     * @Route("/{id}/edit", requirements={"id": "\d+"})
     * @Template()
     * @Method("GET")
     * @ParamConverter("organisatie", class="ROTRBSBundle:Organisatie")
     * @Secure(roles="ROLE_WIJZIG_RBS")
     */
    public function editAction(Organisatie $organisatie) {
        $response = new Response();
        $response->setLastModified($organisatie->getUpdatedAt());
        if ($response->isNotModified($this->getRequest())) {
            return $response;
        }

        return $this->render('ROTRBSBundle:Organisatie:edit.html.twig', array(
			'organisatie' => $organisatie,
			'form' => $this->createForm(new OrganisatieType(), $organisatie)->createView()			
		), $response);
    }
    
    /**
     * @Route("/{id}", requirements={"id": "\d+"})
     * @Method("PUT")
     * @ParamConverter("organisatie", class="ROTRBSBundle:Organisatie")
     * @Secure(roles="ROLE_WIJZIG_RBS")
     */
    public function updateAction(Organisatie $organisatie) {
        $form = $this->createForm(new OrganisatieType(), $organisatie);
        $flash = $this->getRequest()->getSession()->getFlashBag();

		if ($this->handleForm($form)) {
            $flash->add('notice', 'Organisatie "' . $organisatie . '" opgeslagen');

			return $this->redirect($this->generateUrl('rot_rbs_organisatie_show', array(
				'id' => $organisatie->getId()
			)));
		}

        $flash->add('error', 'Fouten gevonden, organisatie "' . $organisatie . '" is niet opgeslagen');
		
		return $this->render('ROTRBSBundle:Organisatie:edit.html.twig', array(
			'form' => $form->createView()
		));
    }
    
     /**
      * @Route("/{id}", requirements={"id": "\d+"})
      * @Template()
      * @Method("DELETE")
      * @ParamConverter("organisatie", class="ROTRBSBundle:Organisatie")
      * @Secure(roles="ROLE_WIJZIG_RBS")
      */
    public function deleteAction(Organisatie $organisatie) {
        $em = $this->getDoctrine()->getManager();
        $em->remove($organisatie);
        $em->flush();

        $this->getRequest()->getSession()->getFlashBag()->add('notice', 'Organisatie "' . $organisatie . '" verwijderd');
		
		return $this->redirect($this->generateUrl('rot_rbs_organisatie_index'));
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
                'filter_class' => new OrganisatieFilterType()
            ))->createView()
        );
    }

    /**
     * @Route("/filter", requirements={"id"="\d+"})
     * @Method("POST")
     */
    public function createFilterAction() {
        $filter = new Filter();
        $filter->setType('Organisatie');
        $form = $this->createForm(new FilterWrappingType(), $filter, array(
            'filter_class' => new OrganisatieFilterType()
        ));

        if ($this->handleFilterForm($form)) {
            return $this->redirect($this->generateUrl('rot_rbs_organisatie_filter', array(
                'id' => $filter->getId()
            )));
        }

        return $this->render('ROTRBSBundle:Organisatie:newFilter.html.twig', array(
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
                'filter_class' => new OrganisatieFilterType()
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
            'filter_class' => new OrganisatieFilterType()
        ));

        if ($this->handleFilterForm($form)) {
            return $this->redirect($this->generateUrl('rot_rbs_organisatie_filter', array(
                'id' => $filter->getId()
            )));
        }

        return $this->render('ROTRBSBundle:Organisatie:editFilter.html.twig', array(
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

        return $this->redirect($this->generateUrl('rot_rbs_organisatie_index'));
    }
}
