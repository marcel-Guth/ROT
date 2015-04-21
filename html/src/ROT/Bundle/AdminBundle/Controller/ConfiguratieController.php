<?php

namespace ROT\Bundle\AdminBundle\Controller;

use ROT\Bundle\AdminBundle\Form\Type\AlgemeenConfiguratieType;
use ROT\Bundle\AdminBundle\Form\Type\StapConfiguratieType;
use ROT\Bundle\AdminBundle\Form\Type\MailConfiguratieType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use JMS\SecurityExtraBundle\Annotation\Secure;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Form\Form;

/**
 * @Route("/configuratie")
 */
class ConfiguratieController extends Controller
{
    private function handleForm(Form $form) {
        $form->submit($this->getRequest());
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $data = $form->getData();
            foreach ($data as $configuratie) {
                $em->persist($configuratie);
            }
            $em->flush();

            // Hack om vertalingen te verwijderen bij update
            $cacheDir = __DIR__ . "/../../../../../app/cache";

            $finder = new Finder();
            $cache_dirs = array();
            if (file_exists($cacheDir . "/dev/translations")) {
                $cache_dirs[] = $cacheDir . "/dev/translations";
            }
            if (file_exists($cacheDir . "/prod/translations")) {
                $cache_dirs[] = $cacheDir . "/prod/translations";
            }
            $finder->in($cache_dirs)->files();
            foreach($finder as $file){
                unlink($file->getRealpath());
            }

            return true;
        }

        return false;
    }

    /**
     * @Route("/algemeen")
     * @Template()
	 * @Method("GET")
	 * @Secure(roles="ROLE_CONFIGUREER_INSCHRIJF")
     */
    public function algemeenAction() {
        return array(
            'form' => $this->createForm(new AlgemeenConfiguratieType(), $this->getDoctrine()->getManager()->getRepository('ROTAdminBundle:Configuratie')->getAlgemeenConfiguratie())->createView()
        );
    }
	
	/**
     * @Route("/algemeen")
	 * @Method("PUT")
	 * @Secure(roles="ROLE_CONFIGUREER_INSCHRIJF")
     */
    public function updateAlgemeenAction() {
        $form = $this->createForm(new AlgemeenConfiguratieType(), $this->getDoctrine()->getManager()->getRepository('ROTAdminBundle:Configuratie')->getAlgemeenConfiguratie());

        if ($this->handleForm($form)) {
            return $this->redirect($this->generateUrl('rot_admin_configuratie_algemeen'));
        }

        return $this->render('ROTAdminBundle:Configuratie:algemeen.html.twig', array(
            'form' => $form
        ));
    }
	
	/**
     * @Route("/stap/{stap}")
     * @Template()
	 * @Method("GET")
	 * @Secure(roles="ROLE_CONFIGUREER_INSCHRIJF")
     */
    public function stapAction($stap) {
        return array(
            'stap' => $stap,
            'form' => $this->createForm(new StapConfiguratieType(), $this->getDoctrine()->getManager()->getRepository('ROTAdminBundle:Configuratie')->getStapConfiguratie($stap))->createView()
        );
    }
	
	/**
     * @Route("/stap/{stap}")
	 * @Method("PUT")
	 * @Secure(roles="ROLE_CONFIGUREER_INSCHRIJF")
     */
    public function updateStapAction($stap) {
        $form = $this->createForm(new StapConfiguratieType(), $this->getDoctrine()->getManager()->getRepository('ROTAdminBundle:Configuratie')->getStapConfiguratie($stap));

        if ($this->handleForm($form)) {
            return $this->redirect($this->generateUrl('rot_admin_configuratie_stap', array('stap' => $stap)));
        }

        return $this->render('ROTAdminBundle:Configuratie:stap.html.twig', array(
            'stap' => $stap,
            'form' => $form->createView()
        ));
    }
	
	/**
     * @Route("/mail/{mail_type}")
     * @Template()
	 * @Method("GET")
	 * @Secure(roles="ROLE_CONFIGUREER_INSCHRIJF")
     */
    public function mailAction($mail_type) {
        return array(
            'mail_type' => $mail_type,
            'form' => $this->createForm(new MailConfiguratieType(), $this->getDoctrine()->getManager()->getRepository('ROTAdminBundle:Configuratie')->getMailConfiguratie($mail_type))->createView()
        );
    }
	
	/**
     * @Route("/mail/{mail_type}")
	 * @Method("PUT")
	 * @Secure(roles="ROLE_CONFIGUREER_INSCHRIJF")
     */
    public function updateMailAction($mail_type) {
        $form = $this->createForm(new MailConfiguratieType(), $this->getDoctrine()->getManager()->getRepository('ROTAdminBundle:Configuratie')->getMailConfiguratie($mail_type));

        if ($this->handleForm($form)) {
            return $this->redirect($this->generateUrl('rot_admin_configuratie_mail', array('mail_type' => $mail_type)));
        }

        return $this->render('ROTAdminBundle:Configuratie:mail.html.twig', array(
            'mail_type' => $mail_type,
            'form' => $form->createView()
        ));
    }
}
