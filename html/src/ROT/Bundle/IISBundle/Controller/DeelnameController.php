<?php

namespace ROT\Bundle\IISBundle\Controller;

use ROT\Bundle\IISBundle\Entity\Betaling;
use ROT\Bundle\IISBundle\Entity\Borg;
use ROT\Bundle\AdminBundle\Form\Type\FilterWrappingType;
use ROT\Bundle\IISBundle\Form\Type\DeelnameFilterType;
use ROT\Bundle\PBSBundle\Entity\Parkeerkaart;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Cache;
use JMS\SecurityExtraBundle\Annotation\Secure;
use ROT\Bundle\IISBundle\Entity\Deelname;
use ROT\Bundle\IISBundle\Form\Type\DeelnameType;
use ROT\Bundle\IISBundle\Entity\Deelnemer;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Response;


/**
 * @Route("/deelname")
 */
class DeelnameController extends Controller
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
	 * @Method("GET")
     */
    public function indexAction() {
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('ROTIISBundle:Deelname');

        $response = new Response();
        $response->setLastModified($repository->getIndexModificationTime());
        if ($response->isNotModified($this->getRequest())) {
            return $response;
        }

        return $this->render('ROTIISBundle:Deelname:index.html.twig', array(
            'active_filter' => false,
            'filters' => $em->getRepository('ROTAdminBundle:Filter')->findByTypeOrderedByName('Deelname'),
			"deelnames" => $repository->findAllWithJoins()
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
        $qb = $em->getRepository('ROTIISBundle:Deelname')->createQueryBuilder('d');
        $content = $filter->getContent();

        return array(
            'active_filter' => $filter,
            'filters' => $em->getRepository('ROTAdminBundle:Filter')->findByTypeOrderedByName('Deelname'),
            "deelnames" => $qb->getQuery()->getResults()
        );
    }
	
    /**
     * @Route("/new")
     * @Template()
     * @Method("GET")
     * @Secure(roles="ROLE_WIJZIG_IIS")
     */
    public function newAction() {
        return array(
			'form' => $this->createForm(new DeelnameType(), new Deelname())->createView()
		);
    }
    
    /**
     * @Route("/")
     * @Method("POST")
     * @Secure(roles="ROLE_WIJZIG_IIS")
     */
    public function createAction() {
		$deelname = new Deelname();
        $form = $this->createForm(new DeelnameType(), $deelname);
        $flash = $this->getRequest()->getSession()->getFlashBag();

        if ($this->handleForm($form)) {
            $flash->add('notice', 'Deelname "' . $deelname . '" aangemaakt');

            return $this->redirect($this->generateUrl('rot_iis_deelname_show', array(
                'id' => $deelname->getId()
            )));
        }

        $flash->add('error', 'Fouten gevonden, deelname is niet aangemaakt');

        return $this->render('ROTIISBundle:Deelname:new.html.twig', array(
            'form' => $form->createView()
        ));
    }
    
    /**
     * @Route("/{id}")
     * @Method("GET")
     */
    public function showAction($id) {
        $repository = $this->getDoctrine()->getRepository('ROTIISBundle:Deelname');

        $response = new Response();
        $response->setLastModified($repository->getModificationTime($id));
        if ($response->isNotModified($this->getRequest())) {
            return $response;
        }

        return $this->render('ROTIISBundle:Deelname:show.html.twig', array(
			'deelname' => $repository->findOneByIdWithJoins($id)
		), $response);
    }

    /**
     * @Route("/{id}/log", requirements={"id": "\d+"})
     * @Template()
     * @Method("GET")
     * @ParamConverter("deelname", class="ROTIISBundle:Deelname")
     */
    public function logAction(Deelname $deelname) {}

    /**
     * @Route("/{id}/revert/{version}", requirements={"id": "\d+", "version": "\d+"})
     * @Method("GET")
     * @ParamConverter("deelname", class="ROTIISBundle:Deelname")
     * @Secure(roles="ROLE_WIJZIG_IIS")
     */
    public function revertAction(Deelname $boot, $deelname) {}
    
    /**
     * @Route("/{id}/edit")
     * @Method("GET")
     * @Secure(roles="ROLE_WIJZIG_IIS")
     */
    public function editAction($id) {
        $repository = $this->getDoctrine()->getRepository('ROTIISBundle:Deelname');

        $response = new Response();
        $response->setLastModified($repository->getModificationTime($id));
        if ($response->isNotModified($this->getRequest())) {
            return $response;
        }

        $deelname = $repository->findOneByIdWithJoins($id);

        return $this->render('ROTIISBundle:Deelname:edit.html.twig', array(
			'deelname' => $deelname,
			'form' => $this->createForm(new DeelnameType(), $deelname)->createView()
		), $response);
    }
    
    /**
     * @Route("/{id}")
     * @Method("PUT")
     * @ParamConverter("deelname", class="ROTIISBundle:Deelname", options={"repository_method" = "findOneByIdWithJoins"})
     * @Secure(roles="ROLE_WIJZIG_IIS")
     */
    public function updateAction(Deelname $deelname) {
        $form = $this->createForm(new DeelnameType(), $deelname);
        $flash = $this->getRequest()->getSession()->getFlashBag();

        if ($this->handleForm($form)) {
            $flash->add('notice', 'Deelname "' . $deelname . '" opgeslagen');

            return $this->redirect($this->generateUrl('rot_iis_deelname_show', array(
                'id' => $deelname->getId()
            )));
        }

        $flash->add('error', 'Fouten gevonden, deelname "' . $deelname . '" is niet opgeslagen');

        return $this->render('ROTIISBundle:Deelname:edit.html.twig', array(
            'deelname' => $deelname,
            'form' => $form->createView()
        ));
    }
    
     /**
      * @Route("/{id}")
      * @Template()
      * @Method("DELETE")
      * @ParamConverter("deelname", class="ROTIISBundle:Deelname", options={"repository_method" = "findOneByIdWithJoins"})
      * @Secure(roles="ROLE_WIJZIG_IIS")
      */
    public function deleteAction(Deelname $deelname) {
        $em = $this->getDoctrine()->getManager();
        //$deelnemerid = $deelnemer->getId();
        //$em->createQuery("");
        $em->remove($deelname);
        $em->flush();
        $this->getRequest()->getSession()->getFlashBag()->add('notice', 'Deelname "' . $deelname . '" verwijderd');
		
		return $this->redirect($this->generateUrl('rot_iis_deelname_index'));
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
                'filter_class' => new DeelnameFilterType(),
                'filter_class_options' => array(
                    'em' => $this->getDoctrine()->getManager()
                )
            ))->createView()
        );
    }
    
    /**
     * @Route("/filter", requirements={"id"="\d+"})
     * @Method("POST")
     */
    public function createFilterAction() {
        $filter = new Filter();
        $filter->setType('Deelname');
        $form = $this->createForm(new FilterWrappingType(), $filter, array(
            'filter_class' => new DeelnameFilterType(),
            'filter_class_options' => array(
                'em' => $this->getDoctrine()->getManager()
            )
        ));

        if ($this->handleFilterForm($form)) {
            return $this->redirect($this->generateUrl('rot_iis_deelname_filter', array(
                'id' => $filter->getId()
            )));
        }

        return $this->render('ROTIISBundle:Deelname:newFilter.html.twig', array(
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
                'filter_class' => new DeelnameFilterType(),
                'filter_class_options' => array(
                    'em' => $this->getDoctrine()->getManager()
                )
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
            'filter_class' => new DeelnameFilterType(),
            'filter_class_options' => array(
                'em' => $this->getDoctrine()->getManager()
            )
        ));

        if ($this->handleFilterForm($form)) {
            return $this->redirect($this->generateUrl('rot_iis_deelname_filter', array(
                'id' => $filter->getId()
            )));
        }

        return $this->render('ROTIISBundle:Deelname:editFilter.html.twig', array(
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

        return $this->redirect($this->generateUrl('rot_iis_deelname_index'));
    }
}
