<?php

namespace ROT\Bundle\PBSBundle\Controller;

use ROT\Bundle\AdminBundle\Entity\Filter;
use ROT\Bundle\AdminBundle\Form\Type\FilterWrappingType;
use ROT\Bundle\PBSBundle\Form\Type\ParkeerkaartFilterType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Cache;
use JMS\SecurityExtraBundle\Annotation\Secure;
use ROT\Bundle\PBSBundle\Entity\Parkeerkaart;
use ROT\Bundle\PBSBundle\Form\Type\ParkeerkaartType;
use Symfony\Component\Form\Form;
use Symfony\Component\Form\FormError;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route("/parkeerkaart")
 */
class ParkeerkaartController extends Controller
{
    private function handleForm(Form $form) {
        $form->submit($this->getRequest());
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($form->getData());
            $em->flush();

            return true;
        }

        var_dump($form->getErrors());

        return false;
    }

    /**
     * @Route("/")
	 * @Method("GET")
     */
    public function indexAction() {
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('ROTPBSBundle:Parkeerkaart');

        $response = new Response();
        $response->setLastModified($repository->getIndexModificationTime());
        if ($response->isNotModified($this->getRequest())) {
            return $response;
        }

        return $this->render('ROTPBSBundle:Parkeerkaart:index.html.twig', array(
            'active_filter' => false,
            'filters' => $em->getRepository('ROTAdminBundle:Filter')->findByTypeOrderedByName('Parkeerkaart'),
			'parkeerkaarten' => $repository->findAll()
		), $response);
    }

    /**
     * @Route("/filter/{id}", requirements={"id"="\d+"})
     * @Method("GET")
     * @ParamConverter("filter", class="ROTAdminBundle:Filter")
     */
    public function filterAction(Filter $filter) {
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('ROTPBSBundle:Parkeerkaart');
        $qb = $repository->createQueryBuilder('p');
        $repository->applyFilterToQueryBuilder($filter->getContent(), 'p', $qb);

        return $this->render('ROTPBSBundle:Parkeerkaart:index.html.twig', array(
            'active_filter' => $filter,
            'filters' => $em->getRepository('ROTAdminBundle:Filter')->findByTypeOrderedByName('Parkeerkaart'),
            'parkeerkaarten' => $qb->getQuery()->getResult()
        ));
    }

//    MWY: Toevoegen alleen mogelijk via Deelname/Betrokkene
//
//    /**
//     * @Route("/new")
//     * @Template()
//     * @Method("GET")
//     * @Secure(roles="ROLE_WIJZIG_PBS")
//     */
//    public function newAction() {
//        return array(
//			'form' => $this->createForm(new ParkeerkaartType(), new Parkeerkaart())->createView()
//		);
//    }
//
//    /**
//     * @Route("/")
//     * @Method("POST")
//     * @Secure(roles="ROLE_WIJZIG_PBS")
//     */
//    public function createAction() {
//		$parkeerkaart = new Parkeerkaart();
//        $form = $this->createForm(new ParkeerkaartType(), $parkeerkaart);
//        $flash = $this->getRequest()->getSession()->getFlashBag();
//
//		$form->submit($this->getRequest());
//		if ($this->handleForm($form)) {
//            $flash->add('notice', 'Parkeerkaart "' . $parkeerkaart . '" aangemaakt');
//
//			return $this->redirect($this->generateUrl('rot_pbs_parkeerkaart_show', array(
//				'id' => $parkeerkaart->getId()
//			)));
//		}
//
//        $flash->add('error', 'Fouten gevonden, parkeerkaart is niet aangemaakt');
//
//		return $this->render('ROTPBSBundle:Parkeerkaart:new.html.twig', array(
//			'form' => $form->createView()
//		));
//    }
    
    /**
     * @Route("/{id}", requirements={"id"="\d+"})
     * @Template()
     * @Method("GET")
     * @ParamConverter("parkeerkaart", class="ROTPBSBundle:Parkeerkaart")
     */
    public function showAction(Parkeerkaart $parkeerkaart) {
        $response = new Response();
        $response->setLastModified($parkeerkaart->getUpdatedAt());
        if ($response->isNotModified($this->getRequest())) {
            return $response;
        }

        return $this->render('ROTPBSBundle:Parkeerkaart:show.html.twig', array(
			'parkeerkaart' => $parkeerkaart
		), $response);
    }

    /**
     * @Route("/{id}/log", requirements={"id": "\d+"})
     * @Template()
     * @Method("GET")
     * @ParamConverter("parkeerkaart", class="ROTPBSBundle:Parkeerkaart")
     */
    public function logAction(Parkeerkaart $parkeerkaart) {}

    /**
     * @Route("/{id}/revert/{version}", requirements={"id": "\d+", "version": "\d+"})
     * @Method("GET")
     * @ParamConverter("parkeerkaart", class="ROTPBSBundle:Parkeerkaart")
     * @Secure(roles="ROLE_WIJZIG_PBS")
     */
    public function revertAction(Parkeerkaart $parkeerkaart, $version) {}
    
    /**
     * @Route("/{id}/edit", requirements={"id"="\d+"})
     * @Template()
     * @Method("GET")
     * @ParamConverter("parkeerkaart", class="ROTPBSBundle:Parkeerkaart")
     * @Secure(roles="ROLE_WIJZIG_PBS")
     */
    public function editAction(Parkeerkaart $parkeerkaart) {
        $response = new Response();
        $response->setLastModified($parkeerkaart->getUpdatedAt());
        if ($response->isNotModified($this->getRequest())) {
            return $response;
        }

        return $this->render('ROTPBSBundle:Parkeerkaart:edit.html.twig', array(
			'parkeerkaart' => $parkeerkaart,
			'form' => $this->createForm(new ParkeerkaartType(), $parkeerkaart)->createView()
		), $response);
    }
    
    /**
     * @Route("/{id}", requirements={"id"="\d+"})
     * @Method("PUT")
     * @ParamConverter("parkeerkaart", class="ROTPBSBundle:Parkeerkaart")
     * @Secure(roles="ROLE_WIJZIG_PBS")
     */
    public function updateAction(Parkeerkaart $parkeerkaart) {
        $form = $this->createForm(new ParkeerkaartType(), $parkeerkaart);
        $flash = $this->getRequest()->getSession()->getFlashBag();

		if ($this->handleForm($form)) {
            $flash->add('notice', 'Parkeerkaart "' . $parkeerkaart . '" opgeslagen');

			return $this->redirect($this->generateUrl('rot_pbs_parkeerkaart_show', array(
				'id' => $parkeerkaart->getId()
			)));
		}

        $flash->add('error', 'Fouten gevonden, parkeerkaart "' . $parkeerkaart . '" is niet opgeslagen');
		
		return $this->render('ROTPBSBundle:Parkeerkaart:edit.html.twig', array(
            'parkeerkaart' => $parkeerkaart,
			'form' => $form->createView()
		));
    }
    
     /**
      * @Route("/{id}", requirements={"id"="\d+"})
      * @Method("DELETE")
      * @ParamConverter("parkeerkaart", class="ROTPBSBundle:Parkeerkaart")
      * @Secure(roles="ROLE_WIJZIG_PBS")
      */
    public function deleteAction(Parkeerkaart $parkeerkaart) {
        $em = $this->getDoctrine()->getManager();
        $em->remove($parkeerkaart);
        $em->flush();

        $this->getRequest()->getSession()->getFlashBag()->add('notice', 'Parkeerkaart "' . $parkeerkaart . '" verwijderd');
		
		return $this->redirect($this->generateUrl('rot_pbs_parkeerkaart_index'));
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
                'filter_class' => new ParkeerkaartFilterType()
            ))->createView()
        );
    }

    /**
     * @Route("/filter", requirements={"id"="\d+"})
     * @Template()
     * @Method("POST")
     */
    public function createFilterAction() {
        $filter = new Filter();
        $filter->setType('Parkeerkaart');
        $form = $this->createForm(new FilterWrappingType(), $filter, array(
            'filter_class' => new ParkeerkaartFilterType()
        ));

        if ($this->handleFilterForm($form)) {
            return $this->redirect($this->generateUrl('rot_pbs_parkeerkaart_filter', array(
                'id' => $filter->getId()
            )));
        }

        return $this->render('ROTPBSBundle:Parkeerkaart:newFilter.html.twig', array(
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
                'filter_class' => new ParkeerkaartFilterType()
            ))->createView()
        );
    }

    /**
     * @Route("/filter/{id}", requirements={"id"="\d+"})
     * @Template()
     * @Method("PUT")
     * @ParamConverter("filter", class="ROTAdminBundle:Filter")
     */
    public function updateFilterAction(Filter $filter) {
        $form = $this->createForm(new FilterWrappingType(), $filter, array(
            'filter_class' => new ParkeerkaartFilterType()
        ));

        if ($this->handleFilterForm($form)) {
            return $this->redirect($this->generateUrl('rot_pbs_parkeerkaart_filter', array(
                'id' => $filter->getId()
            )));
        }

        return $this->render('ROTPBSBundle:Parkeerkaart:editFilter.html.twig', array(
            'form' => $form->createView()
        ));
    }

    /**
     * @Route("/filter/{id}", requirements={"id"="\d+"})
     * @Template()
     * @Method("DELETE")
     * @ParamConverter("filter", class="ROTAdminBundle:Filter")
     */
    public function deleteFilterAction(Filter $filter) {
        $em = $this->getDoctrine()->getManager();
        $em->remove($filter);
        $em->flush();

        return $this->redirect($this->generateUrl('rot_pbs_parkeerkaart_index'));
    }
}
