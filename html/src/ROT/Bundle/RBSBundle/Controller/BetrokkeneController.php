<?php

namespace ROT\Bundle\RBSBundle\Controller;

use ROT\Bundle\AdminBundle\Entity\Filter;
use ROT\Bundle\AdminBundle\Form\Type\FilterWrappingType;
use ROT\Bundle\PBSBundle\Entity\Parkeerkaart;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Cache;
use JMS\SecurityExtraBundle\Annotation\Secure;
use ROT\Bundle\RBSBundle\Entity\Betrokkene;
use ROT\Bundle\RBSBundle\Form\Type\BetrokkeneType;
use ROT\Bundle\RBSBundle\Form\Type\BetrokkeneFilterType;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route("/betrokkene")
 */
class BetrokkeneController extends Controller
{
    private function handleForm(Form $form) {
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
     * @Template()
	 * @Method("GET")
     */
    public function indexAction() {
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('ROTRBSBundle:Betrokkene');

        $response = new Response();
        $response->setLastModified($repository->getIndexModificationTime());
        if ($response->isNotModified($this->getRequest())) {
            return $response;
        }

        return $this->render('ROTRBSBundle:Betrokkene:index.html.twig', array(
            'active_filter' => false,
            'filters' => $em->getRepository('ROTAdminBundle:Filter')->findByTypeOrderedByName('Betrokkene'),
			'betrokkenen' => $em->getRepository('ROTRBSBundle:Betrokkene')->findAll()
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
        $repository = $em->getRepository('ROTRBSBundle:Betrokkene');
        $qb = $repository->createQueryBuilder('b');
        $repository->applyFilterToQueryBuilder($filter->getContent(), 'b', $qb);

        return $this->render('ROTRBSBundle:Betrokkene:index.html.twig', array(
            'active_filter' => $filter,
            'filters' => $em->getRepository('ROTAdminBundle:Filter')->findByTypeOrderedByName('Betrokkene'),
			'betrokkenen' => $qb->getQuery()->getResult()
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
			'form' => $this->createForm(new BetrokkeneType())->createView()
		);
    }
    
    /**
     * @Route("/")
     * @Method("POST")
     * @Secure(roles="ROLE_WIJZIG_RBS")
     */
    public function createAction() {
		$betrokkene = new Betrokkene();
        $form = $this->createForm(new BetrokkeneType(), $betrokkene);
        $flash = $this->getRequest()->getSession()->getFlashBag();

		if ($this->handleForm($form)) {
            $flash->add('notice', 'Betrokkene "' . $betrokkene . '" aangemaakt');

			return $this->redirect($this->generateUrl('rot_rbs_betrokkene_show', array(
				'id' => $betrokkene->getId()
			)));
		}

        $flash->add('error', 'Fouten gevonden, betrokkene is niet aangemaakt');
		
		return $this->render('ROTRBSBundle:Betrokkene:new.html.twig', array(
			'form' => $form->createView()
		));
    }
    
    /**
     * @Route("/{id}", requirements={"id": "\d+"})
     * @Method("GET")
     */
    public function showAction($id) {
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('ROTRBSBundle:Betrokkene');

        $response = new Response();
        $response->setLastModified($repository->getModificationTime($id));
        if ($response->isNotModified($this->getRequest())) {
            return $response;
        }

        return $this->render('ROTRBSBundle:Betrokkene:show.html.twig', array(
			'betrokkene' => $repository->findOneById($id)
		), $response);
    }

    /**
     * @Route("/{id}/log", requirements={"id": "\d+"})
     * @Template()
     * @Method("GET")
     * @ParamConverter("betrokkene", class="ROTRBSBundle:Betrokkene")
     */
    public function logAction(Betrokkene $betrokkene) {
        $parkeerkaart_log_entries = array();

        return array(
            'betrokkene' => $betrokkene,
            'log_entries' => $this->getDoctrine()->getManager()->getRepository('ROTAdminBundle:LogEntry')->getLogEntriesWithLimit($betrokkene, 20),
            'parkeerkaart_log_entries' => $parkeerkaart_log_entries
        );
    }

    /**
     * @Route("/{id}/log/revert/{version}", requirements={"id": "\d+", "version": "\d+"})
     * @Method("POST")
     * @ParamConverter("betrokkene", class="ROTRBSBundle:Betrokkene")
     * @Secure(roles="ROLE_WIJZIG_RBS")
     */
    public function revertAction(Betrokkene $betrokkene, $version) {
        $em = $this->getDoctrine()->getManager();
        $em->getRepository('ROTAdminBundle:LogEntry')->revert($betrokkene, $version);
        $em->persist($betrokkene);
        $em->flush();

        $this->getRequest()->getSession()->getFlashBag()->add('notice', 'Betrokkene "' . $betrokkene . '" hersteld naar versie "' . $version . '"');

        return $this->redirect($this->generateUrl('rot_rbs_betrokkene_show', array(
            'id' => $betrokkene->getId()
        )));
    }
    
    /**
     * @Route("/{id}/edit", requirements={"id": "\d+"})
     * @Method("GET")
     * @Secure(roles="ROLE_WIJZIG_RBS")
     */
    public function editAction($id) {
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('ROTRBSBundle:Betrokkene');

        $response = new Response();
        $response->setLastModified($repository->getModificationTime($id));
        if ($response->isNotModified($this->getRequest())) {
            return $response;
        }

        $betrokkene = $repository->findOneById($id);

        return $this->render('ROTRBSBundle:Betrokkene:edit.html.twig', array(
			'betrokkene' => $betrokkene,
			'form' => $this->createForm(new BetrokkeneType(), $betrokkene)->createView()
		), $response);
    }
    
    /**
     * @Route("/{id}", requirements={"id": "\d+"})
     * @Method("PUT")
     * @ParamConverter("betrokkene", class="ROTRBSBundle:Betrokkene")
     * @Secure(roles="ROLE_WIJZIG_RBS")
     */
    public function updateAction(Betrokkene $betrokkene) {
        $form = $this->createForm(new BetrokkeneType(), $betrokkene);
        $flash = $this->getRequest()->getSession()->getFlashBag();

		if ($this->handleForm($form)) {
            $flash->add('notice', 'Betrokkene "' . $betrokkene . '" opgeslagen');

			return $this->redirect($this->generateUrl('rot_rbs_betrokkene_show', array(
				'id' => $betrokkene->getId()
			)));
		}

        $flash->add('error', 'Fouten gevonden, betrokkene is niet opgeslagen');
		
		return $this->render('ROTRBSBundle:Betrokkene:edit.html.twig', array(
            'betrokkene' => $betrokkene,
			'form' => $form->createView()
		));
    }
    
     /**
      * @Route("/{id}", requirements={"id": "\d+"})
      * @Template()
      * @Method("DELETE")
      * @ParamConverter("betrokkene", class="ROTRBSBundle:Betrokkene")
      * @Secure(roles="ROLE_WIJZIG_RBS")
      */
    public function deleteAction(Betrokkene $betrokkene) {
        $em = $this->getDoctrine()->getManager();
        $em->remove($betrokkene);
        $em->flush();

        $this->getRequest()->getSession()->getFlashBag()->add('notice', 'Betrokkene "' . $betrokkene . '" verwijderd');
		
		return $this->redirect($this->generateUrl('rot_rbs_betrokkene_index'));
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
                'filter_class' => new BetrokkeneFilterType(),
                'filter_class_options' => array(
                    'em' => $this->getDoctrine()->getManager(),
                )
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
        $filter->setType('Betrokkene');
        $form = $this->createForm(new FilterWrappingType(), $filter, array(
            'filter_class' => new BetrokkeneFilterType(),
            'filter_class_options' => array(
                'em' => $this->getDoctrine()->getManager()
            )
        ));

        if ($this->handleFilterForm($form)) {
            return $this->redirect($this->generateUrl('rot_rbs_betrokkene_filter', array(
                'id' => $filter->getId()
            )));
        }

        return $this->render('ROTRBSBundle:Betrokkene:newFilter.html.twig', array(
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
                'filter_class' => new BetrokkeneFilterType(),
                'filter_class_options' => array(
                    'em' => $this->getDoctrine()->getManager()
                )
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
            'filter_class' => new BetrokkeneFilterType(),
            'filter_class_options' => array(
                'em' => $this->getDoctrine()->getManager()
            )
        ));

        if ($this->handleFilterForm($form)) {
            return $this->redirect($this->generateUrl('rot_rbs_betrokkene_filter', array(
                'id' => $filter->getId()
            )));
        }

        return $this->render('ROTRBSBundle:Betrokkene:editFilter.html.twig', array(
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

        return $this->redirect($this->generateUrl('rot_rbs_betrokkene_index'));
    }
}
