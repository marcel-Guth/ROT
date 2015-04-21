<?php

namespace ROT\Bundle\AdminBundle\Controller;

use ROT\Bundle\AdminBundle\Form\Type\SelectNorfilesType;
use ROT\Bundle\AdminBundle\Form\Type\UploadFinishtijdenType;
use ROT\Bundle\AdminBundle\Form\Type\UploadNorfileType;
use ROT\Bundle\AdminBundle\Form\Type\VariableCollectionType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Cache;
use JMS\SecurityExtraBundle\Annotation\Secure;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route("/beheer")
 */
class BeheerController extends Controller
{
    /**
     * @Route("/startnummers")
     * @Template()
	 * @Method("GET")
	 * @Secure(roles="ROLE_CONFIGUREER_RACE")
     */
    public function startnummersAction() {
        return array(
            'generate_form' => $this->createForm(new FormType())->createView(),
            'reset_form' => $this->createForm(new FormType())->createView()
        );
    }

    /**
     * @Route("/startnummers/generate")
     * @Method("POST")
     * @Secure(roles="ROLE_CONFIGUREER_RACE")
     */
    public function generateStartnummersAction() {
        $form = $this->createForm(new FormType());
        $request = $this->getRequest();
        $flash = $request->getSession()->getFlashBag();
        
        $form->submit($request);
        if ($form->isValid()) {
            $count = $this->getDoctrine()->getManager()->getRepository('ROTIISBundle:Deelname')->generateStartnummers();
            if($count != -1)
            {
                $flash->add('notice', $count . ' startnummers gegenereerd');
                return $this->redirect($this->generateUrl('rot_admin_beheer_startnummers'));
            }
            
        }

        $flash->add('error', 'Fout gevonden, startnummers niet gegenereerd');

        return $this->render('ROTAdminBundle:Beheer:startnummers', array(
            'generate_view' => $this->createForm(new FormType()),
            'reset_form' => $form->createView()
        ));
    }

    /**
     * @Route("/startnummers/reset")
     * @Method("POST")
     * @Secure(roles="ROLE_CONFIGUREER_RACE")
     */
    public function resetStartnummersAction() {
        $form = $this->createForm(new FormType());
        $request = $this->getRequest();
        $flash = $request->getSession()->getFlashBag();

        $form->submit($request);
        if ($form->isValid()) {
            $count = $this->getDoctrine()->getManager()->getRepository('ROTIISBundle:Deelname')->resetStartnummers();
            $flash->add('notice', $count . ' startnummers gereset');

            return $this->redirect($this->generateUrl('rot_admin_beheer_startnummers'));
        }

        $flash->add('error', 'Fout gevonden, startnummers niet gereset');

        return $this->render('ROTAdminBundle:Beheer:startnummers', array(
            'generate_view' => $this->createForm(new FormType()),
            'reset_form' => $form->createView()
        ));
    }
    
     /**
     * @Route("/startnummers/handmatig")
     * @Method("POST")
     * @Secure(roles="ROLE_CONFIGUREER_RACE")
     */
    public function generateHandmatigAction()
    {
        $form = $this->createForm(new FormType());
        $request = $this->getRequest();
        $flash = $request->getSession()->getFlashBag();
        $startnummer = $_POST['nummer'];
        $persoon = $_POST['persoon'];
        
        $form->submit($request);
        if ($form->isValid()) {
            if($persoon === null || $startnummer === null)
            {
                $flash->add('notice', 'Fout gevonden, startnummers niet gegenereerd');
            }
            else
            {
                $count = $this->getDoctrine()->getManager()->getRepository('ROTIISBundle:Deelname')->generateHandmatig();
                if($count == 1)
                {
                    $flash->add('notice', "Startnummer $startnummer toegewezen aan $persoon");
                    return $this->redirect($this->generateUrl('rot_admin_beheer_startnummers'));
                }
                else if($count == 0)
                {
                    $flash->add('notice', "Startnummer kon niet toegewezen worden aan $persoon");
                    return $this->redirect($this->generateUrl('rot_admin_beheer_startnummers'));
                }
                $flash->add('error', 'Fout gevonden, startnummers niet gegenereerd');
                return $this->render('ROTAdminBundle:Beheer:startnummers', array(
                    'generate_view' => $this->createForm(new FormType()),
                    'reset_form' => $form->createView()
                ));
            }
        }

        
    }

	/**
     * @Route("/finishtijden")
     * @Template()
	 * @Method("GET")
	 * @Secure(roles="ROLE_CONFIGUREER_RACE")
     */
	public function finishtijdenAction() {
		return array(
            'upload_form' => $this->createForm(new UploadFinishtijdenType())->createView(),
            'correct_form' => $this->createForm(new FormType())->createView()
        );
	}

    /**
     * @Route("/finishtijden/upload")
     * @Method("POST")
     * @Secure(roles="ROLE_CONFIGUREER_RACE")
     */
    public function uploadFinishtijdenAction() {
        $form = $this->createForm(new UploadFinishtijdenType());
        $request = $this->getRequest();
        $flash = $request->getSession()->getFlashBag();

        $form->submit($request);
        if ($form->isValid()) {
            $tempname = tempnam(sys_get_temp_dir(), 'ROT');
            $form['bestand']->getData()->move(dirname($tempname), basename($tempname));
            $f = fopen($tempname, 'r');
            $finishtijden = array();
            while (($line = fgetcsv($f)) !== false) {
                $finishtijden[intval($line[0])] = $line[1];
            }
            fclose($f);
            unlink($tempname);
            $count = $this->getDoctrine()->getManager()->getRepository('ROTIISBundle:Deelname')->updateFinishtijden($finishtijden);

            $flash->add('notice', $count . ' finishtijden ingevoerd');

            return $this->redirect($this->generateUrl('rot_admin_beheer_finishtijden'));
        }

        $flash->add('error', 'Fout gevonden, finishtijden niet ingevoerd');

        return $this->render('ROTAdminBundle:Beheer:finishtijden.html.twig', array(
            'upload_form' => $form->createView(),
            'correct_form' => $this->createForm(new FormType())->createView()
        ));
    }

    /**
     * @Route("/finishtijden/generateCorrected")
     * @Method("POST")
     * @Secure(roles="ROLE_CONFIGUREER_RACE")
     */
    public function generateCorrectedfinishtijdenAction() {
        $form = $this->createForm(new FormType());
        $request = $this->getRequest();
        $flash = $request->getSession()->getFlashBag();

        $form->submit($request);
        if ($form->isValid()) {
            $count = $this->getDoctrine()->getManager()->getRepository('ROTIISBundle:Deelname')->generateCorrectedfinishtijden();
            $flash->add('notice', $count . ' gecorrigeerde finishtijden berekend');

            return $this->redirect($this->generateUrl('rot_admin_beheer_finishtijden'));
        }

        $flash->add('error', 'Fout gevonden, gecorrigeerde finishtijden niet berekend');

        return $this->render('ROTAdminBundle:Beheer:finishtijden', array(
            'upload_form' => $this->createForm(new UploadFinishtijdenType())->createView(),
            'reset_form' => $form->createView()
        ));
    }

    /**
     * @Route("/klassen")
     * @Template()
     * @Method("GET")
     * @Secure(roles="ROLE_CONFIGUREER_RACE")
     */
    public function klassenAction() {
        return array(
            'form' => $this->createForm(new FormType())->createView()
        );
    }

    /**
     * @Route("/klassen/generate")
     * @Method("POST")
     * @Secure(roles="ROLE_CONFIGUREER_RACE")
     */
    public function generateKlassen() {
        $form = $this->createForm(new FormType());
        $request = $this->getRequest();
        $flash = $request->getSession()->getFlashBag();

        $form->submit($this->getRequest());
        if ($form->isValid()) {
            $count = $this->getDoctrine()->getRepository('ROTIISBundle:Deelname')->generateKlassen();
            $flash->add('notice', $count . ' klasse aangemaakt');

            return $this->redirect($this->generateUrl('rot_admin_beheer_klassen'));
        }

        $flash->add('error', 'Fout gevonden, klassen niet aangemaakt');

        return $this->render('ROTAdminBundle:Beheer:klassen.html.twig', array(
            'form' => $form->createView()
        ));
    }
	
	/**
     * @Route("/norfile")
     * @Template()
	 * @Method("GET")
	 * @Secure(roles="ROLE_CONFIGUREER_APPLICATIE")
     */
	public function norfilesAction() {
		return array(
            'select_form' => $this->createForm(new SelectNorfilesType(), null, array(
                'em' => $this->getDoctrine()->getManager()
            ))->createView(),
            'upload_form' => $this->createForm(new UploadNorfileType())->createView()
        );
	}

    /**
     * @Route("/norfile/select")
     * @Method("POST")
     * @Secure(roles="ROLE_CONFIGUREER_APPLICATIE")
     */
    public function selectNorfilesAction() {
        $form = $this->createForm(new SelectNorfilesType(), null, array(
            'em' => $this->getDoctrine()->getManager()
        ));
        $request = $this->getRequest();
        $flash = $request->getSession()->getFlashBag();

        $form->submit($request);
        if ($form->isValid()) {

            $flash->add('notice', 'Geselecteerde bestanden geupdate');

            return $this->redirect($this->generate('rot_admin_beheer_norfiles'));
        }

        $flash->add('error', 'Fout gevonden, geselecteerde bestanden niet geupdate');

        return $this->render('ROTAdminBundle:Beheer:norfiles', array(
            'select_form' => $form->createView(),
            'upload_from' => $this->createForm(new UploadNorfileType())->createView()
        ));
    }

    /**
     * @Route("/norfile/upload")
     * @Method("POST")
     * @Secure(roles="ROLE_CONFIGUREER_APPLICATIE")
     */
    public function uploadNorfileAction() {

    }
	
	/**
     * @Route("/variabelen")
	 * @Method("GET")
	 * @Secure(roles="ROLE_CONFIGUREER_APPLICATIE")
     */
	public function variabelenAction() {
        $repository = $this->getDoctrine()->getManager()->getRepository('ROTAdminBundle:Variable');

        $response = new Response();
        $response->setLastModified($repository->getIndexModificationTime());
        if ($response->isNotModified($this->getRequest())) {
            return $response;
        }

        $variables = array();
        foreach ($repository->findAll() as $variable) {
            $variables[$variable->getDescription()] = $variable;
        }

		return $this->render('ROTAdminBundle:Beheer:variabelen.html.twig', array(
            'form' => $this->createForm(new VariableCollectionType(), array(
                'variablecollection' => $this->getDoctrine()->getManager()->getRepository('ROTAdminBundle:Variable')->findAll()
            ))->createView()
        ), $response);
	}
	
	/**
     * @Route("/variabelen")
	 * @Method("PUT")
	 * @Secure(roles="ROLE_CONFIGUREER_APPLICATIE")
     */
	public function updateVariabelenAction() {
        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(new VariableCollectionType(), array(
            'variablecollection' => $em->getRepository('ROTAdminBundle:Variable')->findAll()
        ));

        $form->submit($this->getRequest());
        if ($form->isValid()) {
            $data = $form->getData();

            foreach ($data['variablecollection'] as $variable) {
                $em->persist($variable);
            }
            $em->flush();

            return $this->redirect($this->generateUrl('rot_admin_beheer_variabelen'));
        }

		return $this->render('ROTAdminBundle:Beheer:variabelen.html.twig', array(
            'form' => $form
        ));
	}
	
	/**
     * @Route("/powerpoint")
     * @Template()
	 * @Method("GET")
	 * @Secure(roles="ROLE_CONFIGUREER_APPLICATIE")
     */
	public function powerpointAction() {
		return array();
	}

    /**
     * @Route("/powerpoint/generate")
     * @Method("POST")
     * @Secure(roles="ROLE_CONFIGUREER_APPLICATIE")
     */
    public function generatePowerpointAction() {

    }
}
