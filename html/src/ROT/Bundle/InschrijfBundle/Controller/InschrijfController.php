<?php

namespace ROT\Bundle\InschrijfBundle\Controller;

use DateTime;
use ROT\Bundle\IISBundle\Entity\Fokkemaat;
use ROT\Bundle\IISBundle\Entity\Stuurman;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use ROT\Bundle\InschrijfBundle\Form\Type\Stap1Type;
use ROT\Bundle\InschrijfBundle\Form\Type\Stap2Type;
use ROT\Bundle\InschrijfBundle\Form\Type\Stap3Type;
use ROT\Bundle\InschrijfBundle\Form\Type\Stap4Type;
use ROT\Bundle\InschrijfBundle\Form\Type\Stap5Type;
use ROT\Bundle\InschrijfBundle\Form\Type\Stap6Type;
use ROT\Bundle\InschrijfBundle\Form\Type\Stap7Type;
use ROT\Bundle\InschrijfBundle\Form\Type\Stap8Type;
use ROT\Bundle\InschrijfBundle\Form\Type\Stap9Type;
use Doctrine\Common\Persistence\ObjectManager;
use ROT\Bundle\IISBundle\Entity\Boot;
use ROT\Bundle\IISBundle\Entity\Deelnemer;
use ROT\Bundle\IISBundle\Entity\Vereniging;
use ROT\Bundle\IISBundle\Entity\Deelname;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use ROT\Bundle\InschrijfBundle\Controller\Navigator;

class InschrijfController extends Controller {

    private $navigator = null;

    private function allowNavigationTo($step) {
        $this->getNavigator()->allowNavigationTo($step);
    }

    private function getAlternativeResponse($currentStep) {
        return $this->getNavigator()->getAlternativeResponse($currentStep);
    }

    private function getNavigator() {
        if ($this->navigator == null) {
            $this->navigator = new Navigator($this);
        }
        return $this->navigator;
    }

    function saveData() {
        /*
         * In deze functie wordt de inschrijving opgeslagen in
         * de database.
         */
        $session = $this->getRequest()->getSession();
        $manager = $this->getDoctrine()->getEntityManager();
        $data_stap1 = $session->get('lang');
//        $data_stap3 = $session->get('data_stap3'); // wordt nu niet gebruikt
        $data_stap4 = $session->get('inschrijf.stap4'); //Data stuurman
        $data_stap5 = $session->get('inschrijf.stap5'); //Data fokkemaat
        $data_stap6 = $session->get('inschrijf.stap6'); //Data boot
        $deelname = new Deelname();

        /*
         * Variabelen uit data halen
         */
        $stuurmanDlnr = new Deelnemer();
        $stuurman = new Stuurman();
        $stuurman->setDeelnemer($stuurmanDlnr);
        $stuurman->setStartlicentie($data_stap4['watersportStuurman']);
        $stuurman->setStartlicentienummer($data_stap4['watersportNrStuurman']);
        $stuurmanDlnr->setVoornaam($data_stap4['stuurmanVoornaam']);
        $stuurmanDlnr->setTussenvoegsel($data_stap4['stuurmanTussenVoegsel']);
        $stuurmanDlnr->setAchternaam($data_stap4['stuurmanAchternaam']);
        $stuurmanDlnr->setAdres($data_stap4['stuurmanAdres']);
        $stuurmanDlnr->setHuisnummer($data_stap4['stuurmanHuisnummer']);
        $stuurmanDlnr->setWoonplaats($data_stap4['stuurmanWoonplaats']);
        $stuurmanDlnr->setPostcode($data_stap4['stuurmanPostcode']);
        $stuurmanDlnr->setLand($data_stap4['stuurmanLand']);
        $stuurmanDlnr->setNationaliteit($manager->getRepository('ROTIISBundle:Nationaliteit')->findOneBy(array('id' => $data_stap4['stuurmanNationaliteit'])));
        $stuurmanDlnr->setGeslacht($data_stap4['stuurmanGeslacht']);
        $stuurmanDlnr->setTelefoon($data_stap4['stuurmanMobielnr']);
		$stuurmanDlnr->setMobiel($data_stap4['stuurmanMobiel']);
        $stuurmanDlnr->setNoodtelefoon($data_stap4['stuurmanNoodnr']);
        $stuurmanDlnr->setGeboortedatum($data_stap4['stuurmanDOB']);
        $stuurmanDlnr->setEmail($data_stap4['stuurmanEmail']);
        $deelname->setStuurman($stuurman);
        $deelname->setAangemeld(false);


//        Controleer of stappen zijn ingevuld MITS stap niet is verplicht voor deelname
        if ($data_stap5 != null) {

            $fokkemaatDlnr = new Deelnemer();
            $fokkemaat = new Fokkemaat();
            $fokkemaat->setDeelnemer($fokkemaatDlnr);
            $fokkemaat->setBemanningslicentie($data_stap5['fokmaatBemanningslicentie']);
            $fokkemaat->setBemanningslicentienummer($data_stap5['fokmaatBemanningslicentieNr']);
            $fokkemaatDlnr->setVoornaam($data_stap5['fokmaatVoornaam']);
            $fokkemaatDlnr->setTussenvoegsel($data_stap5['fokmaatTussenVoegsel']);
            $fokkemaatDlnr->setAchternaam($data_stap5['fokmaatAchternaam']);
            $fokkemaatDlnr->setAdres($data_stap5['fokmaatAdres']);
            $fokkemaatDlnr->setHuisnummer($data_stap5['fokmaatHuisnummer']);
            $fokkemaatDlnr->setWoonplaats($data_stap5['fokmaatWoonplaats']);
            $fokkemaatDlnr->setPostcode($data_stap5['fokmaatPostcode']);
            $fokkemaatDlnr->setLand($data_stap5['fokmaatLand']);
            $fokkemaatDlnr->setNationaliteit($manager->getRepository('ROTIISBundle:Nationaliteit')->findOneBy(array('id' => $data_stap5['fokmaatNationaliteit'])));
            $fokkemaatDlnr->setGeslacht($data_stap5['fokmaatGeslacht']);
            $fokkemaatDlnr->setTelefoon($data_stap5['fokmaatMobielnr']);
			$fokkemaatDlnr->setMobiel($data_stap5['fokmaatMobiel']);
            $fokkemaatDlnr->setNoodtelefoon($data_stap5['fokmaatNoodnr']);
            $fokkemaatDlnr->setGeboortedatum($data_stap5['fokmaatDOB']);
            $fokkemaatDlnr->setEmail($data_stap5['fokmaatEmail']);
            $deelname->setFokkemaat($fokkemaat);
        }

        if ($data_stap6['boottypeCustom'] != null) {
            $newBoot = new Boot();
            $newBoot->setType($data_stap6['boottypeCustom']);
            $newBoot->setKlasse('NogGeenKlasse');
            $newBoot->setNormalrating('0');
            $newBoot->setSpinnakerrating('0');
            $newBoot->setIscustom('1');
            $manager->persist($newBoot);
            $deelname->setBoot($newBoot);
        } else {
            $deelname->setBoot($manager->getRepository('ROTIISBundle:Boot')->findOneBy(array('id' => $data_stap6['boottype'])));
        }

        if ($data_stap6['verenigingCustom'] != null) {
            $newVereniging = new Vereniging();
            $newVereniging->setNaam($data_stap6['verenigingCustom']);
            $newVereniging->setIscustom('1');
            $manager->persist($newVereniging);
            $deelname->setVereniging($newVereniging);
        } else {
            $deelname->setVereniging($manager->getRepository('ROTIISBundle:Vereniging')->findOneBy(array('id' => $data_stap6['vereniging'])));
        }

        $deelname->setReserveringscode(substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 10)); //check if exists?
        $deelname->setKenteken($data_stap6['kenteken'] . '');
        $deelname->setZeilnummer($data_stap6['zeilnummer']);
        $deelname->setMeetbrief($data_stap6['meetbrief']);
        $deelname->setMeetbriefnummer($data_stap6['meetbriefNr']);
        $deelname->setPersoonlijkereclamelicentie($data_stap6['reclame']);
        $deelname->setReclame($data_stap6['reclame']);
        $deelname->setSponsor($data_stap6['akkoordSponsor']);
        $deelname->setSpinnaker($data_stap6['spinnaker']);
        $deelname->setDutchopenstatus($data_stap6['DutchOpen']);
// Set de taal waarin wordt gemaild naar de deelnemer
        $deelname->setNederlands($data_stap1 == 'nl');


//        if ($data_stap1 != 'nl') {
//            //Standaard op Nederlands, is het Engels dan False
//            $deelname->setNederlands(false);
//        }
//        else {
//            $deelname->setNederlands(true);
//        }
        $emailAttributes = array();
        $emailAttributes["[aanmelder]"] = $stuurmanDlnr->getNaam();
        $emailAttributes["[reserveringscode]"] = $deelname->getReserveringscode();
        $emailAttributes["[fleetchoice]"] = "Gold Fleet";
        $session->set("emailAttributes", $emailAttributes);
        $lang = $session->get('lang');
        $_SESSION["mail-preview"] = $this->getEmailPreview($lang);
        $this->storeMailBody($_SESSION["mail-preview"]);
        $manager->persist($deelname);
        $logarray = array();
        if($deelname->getFokkemaat() !== null)
        {
            $logarray = array("Boot" => $deelname->getBoot(),
                "getBootklasse" => $deelname->getBootklasse(),
                "getDutchopenstatus" => $deelname->getDutchopenstatus(),
                "getFleet" => $deelname->getFleet(),
                "getFokkemaat()->getBemanningslicentie" => $deelname->getFokkemaat()->getBemanningslicentie(),
                "getFokkemaat()->getBemanningslicentienummer" => $deelname->getFokkemaat()->getBemanningslicentienummer(),
                "getFokkemaat()->getDeelnemer()->getAchternaam" => $deelname->getFokkemaat()->getDeelnemer()->getAchternaam(),
                "getFokkemaat()->getDeelnemer()->getAdres" => $deelname->getFokkemaat()->getDeelnemer()->getAdres(),
                "getFokkemaat()->getDeelnemer()->getEmail" => $deelname->getFokkemaat()->getDeelnemer()->getEmail(),
                "getFokkemaat()->getDeelnemer()->getGeboortedatum" => $deelname->getFokkemaat()->getDeelnemer()->getGeboortedatum(),
                "getFokkemaat()->getDeelnemer()->getGeslacht" => $deelname->getFokkemaat()->getDeelnemer()->getGeslacht(),
                "getFokkemaat()->getDeelnemer()->getHuisnummer" => $deelname->getFokkemaat()->getDeelnemer()->getHuisnummer(),
                "getFokkemaat()->getDeelnemer()->getLand" => $deelname->getFokkemaat()->getDeelnemer()->getLand(),
                "getFokkemaat()->getDeelnemer()->getLeeftijd" => $deelname->getFokkemaat()->getDeelnemer()->getLeeftijd(),
                "getFokkemaat()->getDeelnemer()->getNaam" => $deelname->getFokkemaat()->getDeelnemer()->getNaam(),
                "getFokkemaat()->getDeelnemer()->getNationaliteit" => $deelname->getFokkemaat()->getDeelnemer()->getNationaliteit(),
                "getFokkemaat()->getDeelnemer()->getNoodtelefoon" => $deelname->getFokkemaat()->getDeelnemer()->getNoodtelefoon(),
                "getFokkemaat()->getDeelnemer()->getPostcode" => $deelname->getFokkemaat()->getDeelnemer()->getPostcode(),
                "getFokkemaat()->getDeelnemer()->getRotmember" => $deelname->getFokkemaat()->getDeelnemer()->getRotmember(),
                "getFokkemaat()->getDeelnemer()->getRotmembernummer" => $deelname->getFokkemaat()->getDeelnemer()->getRotmembernummer(),
                "getFokkemaat()->getDeelnemer()->getTelefoon" => $deelname->getFokkemaat()->getDeelnemer()->getTelefoon(),
                "getFokkemaat()->getDeelnemer()->getTussenvoegsel" => $deelname->getFokkemaat()->getDeelnemer()->getTussenvoegsel(),
                "getFokkemaat()->getDeelnemer()->getVoornaam" => $deelname->getFokkemaat()->getDeelnemer()->getVoornaam(),
                "getFokkemaat()->getDeelnemer()->getWoonplaats" => $deelname->getFokkemaat()->getDeelnemer()->getWoonplaats(),
                "getInschrijfdatum" => $deelname->getInschrijfdatum(),
                "getKenteken" => $deelname->getKenteken(),
                "getMeetbrief" => $deelname->getMeetbrief(),
                "getMeetbriefnummer" => $deelname->getMeetbriefnummer(),
                "getMemberstatus" => $deelname->getMemberstatus(),
                "getModrating" => $deelname->getModrating(),
                "getNacrachampstatus" => $deelname->getNacrachampstatus(),
                "getNederlands" => $deelname->getNederlands(),
                "getReserveringscode" => $deelname->getReserveringscode(),
                "getSpinnaker" => $deelname->getSpinnaker(),
                "getSponsor" => $deelname->getSponsor(),
                "getStartnummer" => $deelname->getStartnummer(),
                "getStuurman()->getDeelnemer()->getAchternaam" => $deelname->getStuurman()->getDeelnemer()->getAchternaam(),
                "getStuurman()->getDeelnemer()->getAdres" => $deelname->getStuurman()->getDeelnemer()->getAdres(),
                "getStuurman()->getDeelnemer()->getEmail" => $deelname->getStuurman()->getDeelnemer()->getEmail(),
                "getStuurman()->getDeelnemer()->getGeboortedatum" => $deelname->getStuurman()->getDeelnemer()->getGeboortedatum(),
                "getStuurman()->getDeelnemer()->getGeslacht" => $deelname->getStuurman()->getDeelnemer()->getGeslacht(),
                "getStuurman()->getDeelnemer()->getHuisnummer" => $deelname->getStuurman()->getDeelnemer()->getHuisnummer(),
                "getStuurman()->getDeelnemer()->getLand" => $deelname->getStuurman()->getDeelnemer()->getLand(),
                "getStuurman()->getDeelnemer()->getLeeftijd" => $deelname->getStuurman()->getDeelnemer()->getLeeftijd(),
                "getStuurman()->getDeelnemer()->getNaam" => $deelname->getStuurman()->getDeelnemer()->getNaam(),
                "getStuurman()->getDeelnemer()->getNationaliteit" => $deelname->getStuurman()->getDeelnemer()->getNationaliteit(),
                "getStuurman()->getDeelnemer()->getNoodtelefoon" => $deelname->getStuurman()->getDeelnemer()->getNoodtelefoon(),
                "getStuurman()->getDeelnemer()->getPostcode" => $deelname->getStuurman()->getDeelnemer()->getPostcode(),
                "getStuurman()->getDeelnemer()->getRotmember" => $deelname->getStuurman()->getDeelnemer()->getRotmember(),
                "getStuurman()->getDeelnemer()->getRotmembernummer" => $deelname->getStuurman()->getDeelnemer()->getRotmembernummer(),
                "getStuurman()->getDeelnemer()->getTelefoon" => $deelname->getStuurman()->getDeelnemer()->getTelefoon(),
                "getStuurman()->getDeelnemer()->getTussenvoegsel" => $deelname->getStuurman()->getDeelnemer()->getTussenvoegsel(),
                "getStuurman()->getDeelnemer()->getVoornaam" => $deelname->getStuurman()->getDeelnemer()->getVoornaam(),
                "getStuurman()->getDeelnemer()->getWoonplaats" => $deelname->getStuurman()->getDeelnemer()->getWoonplaats(),
                "getStuurman()->getStartlicentie" => $deelname->getStuurman()->getStartlicentie(),
                "getStuurman()->getStartlicentienummer" => $deelname->getStuurman()->getStartlicentienummer(),
                "getTochtnoordstatus" => $deelname->getTochtnoordstatus(),
                "getVereniging" => $deelname->getVereniging(),
                "getVerzekeringsbewijsstatus" => $deelname->getVerzekeringsbewijsstatus(),
                "getXcbstatus" => $deelname->getXcbstatus(),
                "getZeilnumme" => $deelname->getZeilnummer());
        }
        else
        {
            $logarray = array("Boot" => $deelname->getBoot(),
                "getBootklasse" => $deelname->getBootklasse(),
                "getDutchopenstatus" => $deelname->getDutchopenstatus(),
                "getFleet" => $deelname->getFleet(),
                "getInschrijfdatum" => $deelname->getInschrijfdatum(),
                "getKenteken" => $deelname->getKenteken(),
                "getMeetbrief" => $deelname->getMeetbrief(),
                "getMeetbriefnummer" => $deelname->getMeetbriefnummer(),
                "getMemberstatus" => $deelname->getMemberstatus(),
                "getModrating" => $deelname->getModrating(),
                "getNacrachampstatus" => $deelname->getNacrachampstatus(),
                "getNederlands" => $deelname->getNederlands(),
                "getReserveringscode" => $deelname->getReserveringscode(),
                "getSpinnaker" => $deelname->getSpinnaker(),
                "getSponsor" => $deelname->getSponsor(),
                "getStartnummer" => $deelname->getStartnummer(),
                "getStuurman()->getDeelnemer()->getAchternaam" => $deelname->getStuurman()->getDeelnemer()->getAchternaam(),
                "getStuurman()->getDeelnemer()->getAdres" => $deelname->getStuurman()->getDeelnemer()->getAdres(),
                "getStuurman()->getDeelnemer()->getEmail" => $deelname->getStuurman()->getDeelnemer()->getEmail(),
                "getStuurman()->getDeelnemer()->getGeboortedatum" => $deelname->getStuurman()->getDeelnemer()->getGeboortedatum(),
                "getStuurman()->getDeelnemer()->getGeslacht" => $deelname->getStuurman()->getDeelnemer()->getGeslacht(),
                "getStuurman()->getDeelnemer()->getHuisnummer" => $deelname->getStuurman()->getDeelnemer()->getHuisnummer(),
                "getStuurman()->getDeelnemer()->getLand" => $deelname->getStuurman()->getDeelnemer()->getLand(),
                "getStuurman()->getDeelnemer()->getLeeftijd" => $deelname->getStuurman()->getDeelnemer()->getLeeftijd(),
                "getStuurman()->getDeelnemer()->getNaam" => $deelname->getStuurman()->getDeelnemer()->getNaam(),
                "getStuurman()->getDeelnemer()->getNationaliteit" => $deelname->getStuurman()->getDeelnemer()->getNationaliteit(),
                "getStuurman()->getDeelnemer()->getNoodtelefoon" => $deelname->getStuurman()->getDeelnemer()->getNoodtelefoon(),
                "getStuurman()->getDeelnemer()->getPostcode" => $deelname->getStuurman()->getDeelnemer()->getPostcode(),
                "getStuurman()->getDeelnemer()->getRotmember" => $deelname->getStuurman()->getDeelnemer()->getRotmember(),
                "getStuurman()->getDeelnemer()->getRotmembernummer" => $deelname->getStuurman()->getDeelnemer()->getRotmembernummer(),
                "getStuurman()->getDeelnemer()->getTelefoon" => $deelname->getStuurman()->getDeelnemer()->getTelefoon(),
                "getStuurman()->getDeelnemer()->getTussenvoegsel" => $deelname->getStuurman()->getDeelnemer()->getTussenvoegsel(),
                "getStuurman()->getDeelnemer()->getVoornaam" => $deelname->getStuurman()->getDeelnemer()->getVoornaam(),
                "getStuurman()->getDeelnemer()->getWoonplaats" => $deelname->getStuurman()->getDeelnemer()->getWoonplaats(),
                "getStuurman()->getStartlicentie" => $deelname->getStuurman()->getStartlicentie(),
                "getStuurman()->getStartlicentienummer" => $deelname->getStuurman()->getStartlicentienummer(),
                "getTochtnoordstatus" => $deelname->getTochtnoordstatus(),
                "getVereniging" => $deelname->getVereniging(),
                "getVerzekeringsbewijsstatus" => $deelname->getVerzekeringsbewijsstatus(),
                "getXcbstatus" => $deelname->getXcbstatus(),
                "getZeilnumme" => $deelname->getZeilnummer());
        }
        
        $log = json_encode($logarray)."\n";
        $file = 'inschrijvingen.log';
        file_put_contents($file, $log, FILE_APPEND);
// Het daadwerkelijk opslaan van de data in de database,
// lukt er een niet, wordt er NIETS opgeslagen.
        $manager->flush();
    }

    function zetStap($_stap) {
        /*
         * In deze functie wordt $step verhoogd of gelijk gelaten
         * Als je een stap verder gaat -> verhogen
         *                             -> gelijk laten
         */
    }

    /**
     * @Route("/")
     * @Template()
     * @Method("GET")
     */
    public function inschrijfAction() {
        $alternativeResponse = $this->getAlternativeResponse(1);
        if ($alternativeResponse != null) {
            return $alternativeResponse;
        }
//Hier wordt de pagina geladen
        $request = $this->getRequest();
        $session = $request->getSession();
        $step = $session->get('step', 1); //Is er nog geen step in de sessie -> zet hem op 1
        $pStep = "";
        $lang = $session->get('lang', 'nl'); //Is er geen taal geselecteerd -> zet hem op NL
        $hStap = $session->get('hStap', 0); //Deze houdt de hoogst complete stap bij
//Build the form
        $defaultData = array('taal' => $lang);
        $form = $this->createForm(new Stap1Type(), $defaultData);

// {% = logische functies zoals IF
// {{ = echo
// {# = comment
//H1 "De ronde om Texel"
//H2 "Pagina titel"
//H3 "Pagina sub-titel"
        try {
            return array(
                'lang' => $lang,
                'step' => $step,
                'pStep' => $pStep,
                'hStap' => $hStap,
                'content' => $this->getDoctrine()->getManager()->createQuery("SELECT c.content FROM ROTAdminBundle:Configuratie c WHERE c.contenttarget = 'registrationstep1' AND c.nederlands = 1")->getSingleScalarResult(), //Dat is 1 "input"
                'contentENG' => $this->getDoctrine()->getManager()->createQuery("SELECT c.content FROM ROTAdminBundle:Configuratie c WHERE c.contenttarget = 'registrationstep1' AND c.nederlands = 0")->getSingleScalarResult(), //Dat is 1 "inp
                'siteTitel' => $this->getDoctrine()->getManager()->createQuery("SELECT c.content FROM ROTAdminBundle:Configuratie c WHERE c.contenttarget = 'sitetitel' AND c.nederlands = 1")->getSingleScalarResult(), //Dat is 1 "input"
                'siteTitelENG' => $this->getDoctrine()->getManager()->createQuery("SELECT c.content FROM ROTAdminBundle:Configuratie c WHERE c.contenttarget = 'sitetitel' AND c.nederlands = 0")->getSingleScalarResult(), //Dat is 1 "input"
                'siteOnderTitel' => $this->getDoctrine()->getManager()->createQuery("SELECT c.content FROM ROTAdminBundle:Configuratie c WHERE c.contenttarget = 'siteondertitel' AND c.nederlands = 1")->getSingleScalarResult(), //Dat is 1 "input"
                'siteOnderTitelENG' => $this->getDoctrine()->getManager()->createQuery("SELECT c.content FROM ROTAdminBundle:Configuratie c WHERE c.contenttarget = 'siteondertitel' AND c.nederlands = 0")->getSingleScalarResult(), //Dat is 1 "input"
                'siteRegistratieTitel' => $this->getDoctrine()->getManager()->createQuery("SELECT c.content FROM ROTAdminBundle:Configuratie c WHERE c.contenttarget = 'siteregistratietitel' AND c.nederlands = 1")->getSingleScalarResult(), //Dat is 1 "input"
                'siteRegistratieTitelENG' => $this->getDoctrine()->getManager()->createQuery("SELECT c.content FROM ROTAdminBundle:Configuratie c WHERE c.contenttarget = 'siteregistratietitel' AND c.nederlands = 0")->getSingleScalarResult(), //Dat is 1 "input"
                'form' => $form->createView());
        } catch (\Doctrine\ORM\NoResultException $e) {
            return array(
                'lang' => $lang,
                'step' => $step,
                'pStep' => $pStep,
                'hStap' => $hStap,
                'content' => NULL,
                'contentENG' => NULL,
                'siteTitel' => NULL,
                'siteTitelENG' => NULL,
                'siteOnderTitel' => NULL,
                'siteOnderTitelENG' => NULL,
                'siteRegistratieTitel' => NULL,
                'siteRegistratieTitelENG' => NULL,
                'form' => $form->createView());
        }
    }

    /**
     * @Route("/")
     * @Method("POST")
     */
    public function saveInschrijfAction() {
//Na de taalselectie
        $request = $this->getRequest();
        $session = $request->getSession();
        $step = $session->get('step');
        $pStep = "";
        $lang = $session->get('lang');
        $hStap = $session->get('hStap');

//Form afhandelen
        $form = $this->createForm(new Stap1Type());
//Variabelen uit POST halen en in array zetten
        $form->submit($request);


//Validatie

        if ($form->isValid()) {
//Data ophalen als array
            $data = $form->getData();
            $session->set('lang', $data['taal']);
            $this->allowNavigationTo(2);
            return $this->redirect($this->generateUrl('rot_inschrijf_inschrijf_stap2'));
        }

        return $this->render('ROTInschrijfBundle:Inschrijf:inschrijf.html.twig', array(
                    'lang' => $lang,
                    'step' => $step,
                    'pStep' => $pStep,
                    'hStap' => $hStap,
                    'content' => $this->getDoctrine()->getManager()->createQuery("SELECT c.content FROM ROTAdminBundle:Configuratie c WHERE c.contenttarget = 'registrationstep1' AND c.nederlands = 1")->getSingleScalarResult(), //Dat is 1 "input"
                    'contentENG' => $this->getDoctrine()->getManager()->createQuery("SELECT c.content FROM ROTAdminBundle:Configuratie c WHERE c.contenttarget = 'registrationstep1' AND c.nederlands = 0")->getSingleScalarResult(), //Dat is 1 "inp
                    'siteTitel' => $this->getDoctrine()->getManager()->createQuery("SELECT c.content FROM ROTAdminBundle:Configuratie c WHERE c.contenttarget = 'sitetitel' AND c.nederlands = 1")->getSingleScalarResult(), //Dat is 1 "input"
                    'siteTitelENG' => $this->getDoctrine()->getManager()->createQuery("SELECT c.content FROM ROTAdminBundle:Configuratie c WHERE c.contenttarget = 'sitetitel' AND c.nederlands = 0")->getSingleScalarResult(), //Dat is 1 "input"
                    'siteOnderTitel' => $this->getDoctrine()->getManager()->createQuery("SELECT c.content FROM ROTAdminBundle:Configuratie c WHERE c.contenttarget = 'siteondertitel' AND c.nederlands = 1")->getSingleScalarResult(), //Dat is 1 "input"
                    'siteOnderTitelENG' => $this->getDoctrine()->getManager()->createQuery("SELECT c.content FROM ROTAdminBundle:Configuratie c WHERE c.contenttarget = 'siteondertitel' AND c.nederlands = 0")->getSingleScalarResult(), //Dat is 1 "input"
                    'siteRegistratieTitel' => $this->getDoctrine()->getManager()->createQuery("SELECT c.content FROM ROTAdminBundle:Configuratie c WHERE c.contenttarget = 'siteregistratietitel' AND c.nederlands = 1")->getSingleScalarResult(), //Dat is 1 "input"
                    'siteRegistratieTitelENG' => $this->getDoctrine()->getManager()->createQuery("SELECT c.content FROM ROTAdminBundle:Configuratie c WHERE c.contenttarget = 'siteregistratietitel' AND c.nederlands = 0")->getSingleScalarResult(), //Dat is 1 "input"
                    'form' => $form->createView()
        ));
    }

    /**
     * @Route("/stap2")
     * @Template()
     * @Method("GET")
     */
    public function stap2Action() {

        $alternativeResponse = $this->getAlternativeResponse(2);
        if ($alternativeResponse != null) {
            return $alternativeResponse;
        }
//Hier wordt stap 2 geladen
        $request = $this->getRequest();
        $session = $request->getSession();
        $session->set('step', 2);
        $step = $session->get('step'); //Haal de huidige step op uit de sessie
        $pStep = "'rot_inschrijf_inschrijf_inschrijf'";
        $lang = $session->get('lang'); //Haal de huidige taal op uit de sessie
        $hStap = $session->get('hStap'); //Haal de hoogste stap op uit de sessie
//Build the form
//$defaultData = array('' => );
        $form = $this->createForm(new Stap2Type(), $session->get('inschrijf.stap2', array()));

// {% = logische functies zoals IF
// {{ = echo
// {# = comment
        try {
            return array(
                'lang' => $lang,
                'step' => $step,
                'pStep' => $pStep,
                'hStap' => $hStap,
                'content' => $this->getDoctrine()->getManager()->createQuery("SELECT c.content FROM ROTAdminBundle:Configuratie c WHERE c.contenttarget = 'registrationstep2' AND c.nederlands = 1")->getSingleScalarResult(), //Dat is 1 "input"
                'contentENG' => $this->getDoctrine()->getManager()->createQuery("SELECT c.content FROM ROTAdminBundle:Configuratie c WHERE c.contenttarget = 'registrationstep2' AND c.nederlands = 0")->getSingleScalarResult(), //Dat is 1 "inp
                'siteTitel' => $this->getDoctrine()->getManager()->createQuery("SELECT c.content FROM ROTAdminBundle:Configuratie c WHERE c.contenttarget = 'sitetitel' AND c.nederlands = 1")->getSingleScalarResult(), //Dat is 1 "input"
                'siteTitelENG' => $this->getDoctrine()->getManager()->createQuery("SELECT c.content FROM ROTAdminBundle:Configuratie c WHERE c.contenttarget = 'sitetitel' AND c.nederlands = 0")->getSingleScalarResult(), //Dat is 1 "input"
                'siteOnderTitel' => $this->getDoctrine()->getManager()->createQuery("SELECT c.content FROM ROTAdminBundle:Configuratie c WHERE c.contenttarget = 'siteondertitel' AND c.nederlands = 1")->getSingleScalarResult(), //Dat is 1 "input"
                'siteOnderTitelENG' => $this->getDoctrine()->getManager()->createQuery("SELECT c.content FROM ROTAdminBundle:Configuratie c WHERE c.contenttarget = 'siteondertitel' AND c.nederlands = 0")->getSingleScalarResult(), //Dat is 1 "input"
                'siteRegistratieTitel' => $this->getDoctrine()->getManager()->createQuery("SELECT c.content FROM ROTAdminBundle:Configuratie c WHERE c.contenttarget = 'siteregistratietitel' AND c.nederlands = 1")->getSingleScalarResult(), //Dat is 1 "input"
                'siteRegistratieTitelENG' => $this->getDoctrine()->getManager()->createQuery("SELECT c.content FROM ROTAdminBundle:Configuratie c WHERE c.contenttarget = 'siteregistratietitel' AND c.nederlands = 0")->getSingleScalarResult(), //Dat is 1 "input"
                'norHtmlFile' => $this->getDoctrine()->getManager()->createQuery("SELECT n.norfilename FROM ROTAdminBundle:Norfile n WHERE n.extension = 'html' AND n.selected = 1")->getSingleScalarResult(),
                'norPDFFile' => $this->getDoctrine()->getManager()->createQuery("SELECT n.norfilename FROM ROTAdminBundle:Norfile n WHERE n.extension = 'pdf' AND n.selected = 1")->getSingleScalarResult(),
                'pngFile' => $this->getDoctrine()->getManager()->createQuery("SELECT n.norfilename FROM ROTAdminBundle:Norfile n WHERE n.extension = 'img' AND n.selected = 1")->getSingleScalarResult(),
                'form' => $form->createView()
            );
        } catch (\Doctrine\ORM\NoResultException $e) {
            return array(
                'lang' => $lang,
                'step' => $step,
                'pStep' => $pStep,
                'hStap' => $hStap,
                'content' => NULL,
                'contentENG' => NULL,
                'siteTitel' => NULL,
                'siteTitelENG' => NULL,
                'siteOnderTitel' => NULL,
                'siteOnderTitelENG' => NULL,
                'siteRegistratieTitel' => NULL,
                'siteRegistratieTitelENG' => NULL,
                'norHtmlFile' => NULL,
                'norPDFFile' => NULL,
                'pngFile' => NULL,
                'form' => $form->createView());
        }
    }

    /**
     * @Route("/stap2")
     * @Method("POST")
     */
    public function saveStap2Action() {
//Na het accepteren van de NOR
        $request = $this->getRequest();
        $session = $request->getSession();
        $step = $session->get('step');
//        $pStep = "'rot_inschrijf_inschrijf_inschrijf'";
        $pStep = "''";
        $lang = $session->get('lang');
        $hStap = $session->get('hStap');

//Form afhandelen
        $form = $this->createForm(new Stap2Type());

//Variabelen uit POST halen en in array zetten
        $form->submit($request);


//Validatie
        if ($form->isValid()) {
//Data ophalen als array
            $data = $form->getData();
// Data opslaan in sessie onder "inschrijf.stap2"
            $session->set('inschrijf.stap2', $data);
            $this->allowNavigationTo(4);
            return $this->redirect($this->generateUrl('rot_inschrijf_inschrijf_stap4'));
        }

        return $this->render('ROTInschrijfBundle:Inschrijf:stap2.html.twig', array(
                    'lang' => $lang,
                    'step' => $step,
                    'pStep' => $pStep,
                    'hStap' => $hStap,
                    'siteTitel' => $this->getDoctrine()->getManager()->createQuery("SELECT c.content FROM ROTAdminBundle:Configuratie c WHERE c.contenttarget = 'sitetitel' AND c.nederlands = 1")->getSingleScalarResult(), //Dat is 1 "input"
                    'siteTitelENG' => $this->getDoctrine()->getManager()->createQuery("SELECT c.content FROM ROTAdminBundle:Configuratie c WHERE c.contenttarget = 'sitetitel' AND c.nederlands = 0")->getSingleScalarResult(), //Dat is 1 "input"
                    'siteOnderTitel' => $this->getDoctrine()->getManager()->createQuery("SELECT c.content FROM ROTAdminBundle:Configuratie c WHERE c.contenttarget = 'siteondertitel' AND c.nederlands = 1")->getSingleScalarResult(), //Dat is 1 "input"
                    'siteOnderTitelENG' => $this->getDoctrine()->getManager()->createQuery("SELECT c.content FROM ROTAdminBundle:Configuratie c WHERE c.contenttarget = 'siteondertitel' AND c.nederlands = 0")->getSingleScalarResult(), //Dat is 1 "input"
                    'siteRegistratieTitel' => $this->getDoctrine()->getManager()->createQuery("SELECT c.content FROM ROTAdminBundle:Configuratie c WHERE c.contenttarget = 'siteregistratietitel' AND c.nederlands = 1")->getSingleScalarResult(), //Dat is 1 "input"
                    'siteRegistratieTitelENG' => $this->getDoctrine()->getManager()->createQuery("SELECT c.content FROM ROTAdminBundle:Configuratie c WHERE c.contenttarget = 'siteregistratietitel' AND c.nederlands = 0")->getSingleScalarResult(), //Dat is 1 "input"
                    'content' => $this->getDoctrine()->getManager()->createQuery("SELECT c.content FROM ROTAdminBundle:Configuratie c WHERE c.contenttarget = 'registrationstep2' AND c.nederlands = 1")->getSingleScalarResult(), //Dat is 1 "input"
                    'contentENG' => $this->getDoctrine()->getManager()->createQuery("SELECT c.content FROM ROTAdminBundle:Configuratie c WHERE c.contenttarget = 'registrationstep2' AND c.nederlands = 0")->getSingleScalarResult(), //Dat is 1 "inp
                    'norHtmlFile' => $this->getDoctrine()->getManager()->createQuery("SELECT n.norfilename FROM ROTAdminBundle:Norfile n WHERE n.extension = 'html' AND n.selected = 1")->getSingleScalarResult(),
                    'form' => $form->createView()
        ));
    }

    /**
     * @Route("/stap4")
     * @Template()
     * @Method("GET")
     */
    public function stap4Action() {
        $alternativeResponse = $this->getAlternativeResponse(3);
        if ($alternativeResponse != null) {
            return $alternativeResponse;
        }

//Hier wordt stap 4 geladen
        $request = $this->getRequest();
        $session = $request->getSession();
        $session->set('step', 4);
        $step = $session->get('step'); //Haal de huidige step op uit de sessie
        $pStep = "'rot_inschrijf_inschrijf_stap3'";
        $lang = $session->get('lang'); //Haal de huidige taal op uit de sessie
        $hStap = $session->get('hStap'); //Hoogst complete stap = 3
//Build the form
//        $defaultData = array('' => );
        $form = $this->createForm(new Stap4Type(), $session->get('inschrijf.stap4', array()), array(
            'em' => $this->getDoctrine()->getManager(), 'lang' => $lang
        ));

// {% = logische functies zoals IF
// {{ = echo
// {# = comment

        return array(
            'lang' => $lang,
            'step' => $step,
            'pStep' => $pStep,
            'hStap' => $hStap,
            'siteTitel' => $this->getDoctrine()->getManager()->createQuery("SELECT c.content FROM ROTAdminBundle:Configuratie c WHERE c.contenttarget = 'sitetitel' AND c.nederlands = 1")->getSingleScalarResult(), //Dat is 1 "input"
            'siteTitelENG' => $this->getDoctrine()->getManager()->createQuery("SELECT c.content FROM ROTAdminBundle:Configuratie c WHERE c.contenttarget = 'sitetitel' AND c.nederlands = 0")->getSingleScalarResult(), //Dat is 1 "input"
            'siteOnderTitel' => $this->getDoctrine()->getManager()->createQuery("SELECT c.content FROM ROTAdminBundle:Configuratie c WHERE c.contenttarget = 'siteondertitel' AND c.nederlands = 1")->getSingleScalarResult(), //Dat is 1 "input"
            'siteOnderTitelENG' => $this->getDoctrine()->getManager()->createQuery("SELECT c.content FROM ROTAdminBundle:Configuratie c WHERE c.contenttarget = 'siteondertitel' AND c.nederlands = 0")->getSingleScalarResult(), //Dat is 1 "input"
            'siteRegistratieTitel' => $this->getDoctrine()->getManager()->createQuery("SELECT c.content FROM ROTAdminBundle:Configuratie c WHERE c.contenttarget = 'siteregistratietitel' AND c.nederlands = 1")->getSingleScalarResult(), //Dat is 1 "input"
            'siteRegistratieTitelENG' => $this->getDoctrine()->getManager()->createQuery("SELECT c.content FROM ROTAdminBundle:Configuratie c WHERE c.contenttarget = 'siteregistratietitel' AND c.nederlands = 0")->getSingleScalarResult(), //Dat is 1 "input"
            'content' => $this->getDoctrine()->getManager()->createQuery("SELECT c.content FROM ROTAdminBundle:Configuratie c WHERE c.contenttarget = 'registrationstep4' AND c.nederlands = 1")->getSingleScalarResult(),
            'contentENG' => $this->getDoctrine()->getManager()->createQuery("SELECT c.content FROM ROTAdminBundle:Configuratie c WHERE c.contenttarget = 'registrationstep4' AND c.nederlands = 0")->getSingleScalarResult(),
            'form' => $form->createView()
        );
    }

    /**
     * @Route("/stap4")
     * @Method("POST")
     */
    public function saveStap4Action() {
//Na het invoeren van de gegevens van de stuurman
        $request = $this->getRequest();
        $session = $request->getSession();
        $step = $session->get('step');
        $pStep = "'rot_inschrijf_inschrijf_stap3'";
        $lang = $session->get('lang');
        $hStap = $session->get('hStap');
//Form afhandelen
        $form = $this->createForm(new Stap4Type(), null, array(
            'em' => $this->getDoctrine()->getManager(), 'lang' => $lang));

//Variabelen uit POST halen en in array zetten
        $form->submit($request);
//Validatie
        if ($form->isValid()) {
//Data ophalen als array
            $data = $form->getData();
// Data opslaan in sessie onder "inschrijf.stap4"
            $session->set('inschrijf.stap4', $data);
//Check if there is a co-sailor
            $data_stap4 = $session->get('inschrijf.stap4'); //Data stuurman
            $diff = $data_stap4['stuurmanDOB']->diff(new DateTime('28-06-2014'));
            $leeftijd = $diff->format('%y');
            $telefoon = $data_stap4['stuurmanMobielnr'];
            $noodtelefoon = $data_stap4['stuurmanNoodnr'];
            $email = $data_stap4['stuurmanEmail'];
            $emailConf = $data_stap4['stuurmanEmailConf'];
            $checkEmail = preg_match("/[A-Za-z0-9._\-]+@[A-Za-z0-9._\-]+\.[A-Za-z]{2,4}/", "$email");
            $validInput = true;

            if ($leeftijd < 15 && $validInput) {
                $validInput = false;
                if ($lang == 'nl') {
                    echo "<script type='text/javascript'>alert('U bent te jong.');</script>";
                } else {
                    echo "<script type='text/javascript'>alert('You are too young.');</script>";
                }
            }

            if ($validInput && (strlen($telefoon) < 10 || strlen($telefoon) > 15 || strlen($noodtelefoon) < 10 || strlen($noodtelefoon) > 15)) {
                $validInput = false;
                echo "<script type='text/javascript'>alert('Controleer de telefoonnummers.');</script>";
            }

            if (($email !== $emailConf || !$checkEmail) && $validInput) {
                $validInput = false;
                echo "<script type='text/javascript'>alert('Controleer de e-mail velden.');</script>";
            }

            if ($validInput) {
                $fokmaat = $session->get('stuurmanFokmaat', $data['stuurmanFokmaat']);
                if ($fokmaat == '1') {

                    $session->set('fokkemaat', 1);
                    $this->allowNavigationTo(5);
                    return $this->redirect($this->generateUrl('rot_inschrijf_inschrijf_stap5'));
                } else {
//There is NO co-sailor -> step 6

                    $session->set('fokkemaat', 0);
                    $this->allowNavigationTo(6);
                    return $this->redirect($this->generateUrl('rot_inschrijf_inschrijf_stap6'));
                }
            }
        }

        return $this->render('ROTInschrijfBundle:Inschrijf:stap4.html.twig', array(
                    'lang' => $lang,
                    'step' => $step,
                    'hStap' => $hStap,
                    'pStep' => $pStep,
                    'siteTitel' => $this->getDoctrine()->getManager()->createQuery("SELECT c.content FROM ROTAdminBundle:Configuratie c WHERE c.contenttarget = 'sitetitel' AND c.nederlands = 1")->getSingleScalarResult(), //Dat is 1 "input"
                    'siteTitelENG' => $this->getDoctrine()->getManager()->createQuery("SELECT c.content FROM ROTAdminBundle:Configuratie c WHERE c.contenttarget = 'sitetitel' AND c.nederlands = 0")->getSingleScalarResult(), //Dat is 1 "input"
                    'siteOnderTitel' => $this->getDoctrine()->getManager()->createQuery("SELECT c.content FROM ROTAdminBundle:Configuratie c WHERE c.contenttarget = 'siteondertitel' AND c.nederlands = 1")->getSingleScalarResult(), //Dat is 1 "input"
                    'siteOnderTitelENG' => $this->getDoctrine()->getManager()->createQuery("SELECT c.content FROM ROTAdminBundle:Configuratie c WHERE c.contenttarget = 'siteondertitel' AND c.nederlands = 0")->getSingleScalarResult(), //Dat is 1 "input"
                    'siteRegistratieTitel' => $this->getDoctrine()->getManager()->createQuery("SELECT c.content FROM ROTAdminBundle:Configuratie c WHERE c.contenttarget = 'siteregistratietitel' AND c.nederlands = 1")->getSingleScalarResult(), //Dat is 1 "input"
                    'siteRegistratieTitelENG' => $this->getDoctrine()->getManager()->createQuery("SELECT c.content FROM ROTAdminBundle:Configuratie c WHERE c.contenttarget = 'siteregistratietitel' AND c.nederlands = 0")->getSingleScalarResult(), //Dat is 1 "input"
                    'content' => $this->getDoctrine()->getManager()->createQuery("SELECT c.content FROM ROTAdminBundle:Configuratie c WHERE c.contenttarget = 'registrationstep4' AND c.nederlands = 1")->getSingleScalarResult(),
                    'contentENG' => $this->getDoctrine()->getManager()->createQuery("SELECT c.content FROM ROTAdminBundle:Configuratie c WHERE c.contenttarget = 'registrationstep4' AND c.nederlands = 0")->getSingleScalarResult(),
                    'form' => $form->createView()));
    }

    /**
     * @Route("/stap5")
     * @Template()
     * @Method("GET")
     */
    public function stap5Action() {
        $alternativeResponse = $this->getAlternativeResponse(4);
        if ($alternativeResponse != null) {
            return $alternativeResponse;
        }
//Hier wordt stap 4 geladen
        $request = $this->getRequest();
        $session = $request->getSession();
        $session->set('step', 5);
        $step = $session->get('step'); //Haal de huidige step op uit de sessie
        $pStep = "'rot_inschrijf_inschrijf_stap4'";
        $lang = $session->get('lang'); //Haal de huidige taal op uit de sessie
        $hStap = $session->get('hStap'); //Hoogst complete stap = 4
//Build the form
//$defaultData = array('' => );
        $form = $this->createForm(new Stap5Type(), $session->get('inschrijf.stap5', array()), array(
            'em' => $this->getDoctrine()->getManager(), 'lang' => $lang));
// {% = logische functies zoals IF
// {{ = echo
// {# = comment

        return array(
            'lang' => $lang,
            'step' => $step,
            'hStap' => $hStap,
            'pStep' => $pStep,
            'siteTitel' => $this->getDoctrine()->getManager()->createQuery("SELECT c.content FROM ROTAdminBundle:Configuratie c WHERE c.contenttarget = 'sitetitel' AND c.nederlands = 1")->getSingleScalarResult(), //Dat is 1 "input"
            'siteTitelENG' => $this->getDoctrine()->getManager()->createQuery("SELECT c.content FROM ROTAdminBundle:Configuratie c WHERE c.contenttarget = 'sitetitel' AND c.nederlands = 0")->getSingleScalarResult(), //Dat is 1 "input"
            'siteOnderTitel' => $this->getDoctrine()->getManager()->createQuery("SELECT c.content FROM ROTAdminBundle:Configuratie c WHERE c.contenttarget = 'siteondertitel' AND c.nederlands = 1")->getSingleScalarResult(), //Dat is 1 "input"
            'siteOnderTitelENG' => $this->getDoctrine()->getManager()->createQuery("SELECT c.content FROM ROTAdminBundle:Configuratie c WHERE c.contenttarget = 'siteondertitel' AND c.nederlands = 0")->getSingleScalarResult(), //Dat is 1 "input"
            'siteRegistratieTitel' => $this->getDoctrine()->getManager()->createQuery("SELECT c.content FROM ROTAdminBundle:Configuratie c WHERE c.contenttarget = 'siteregistratietitel' AND c.nederlands = 1")->getSingleScalarResult(), //Dat is 1 "input"
            'siteRegistratieTitelENG' => $this->getDoctrine()->getManager()->createQuery("SELECT c.content FROM ROTAdminBundle:Configuratie c WHERE c.contenttarget = 'siteregistratietitel' AND c.nederlands = 0")->getSingleScalarResult(), //Dat is 1 "input"
            'content' => $this->getDoctrine()->getManager()->createQuery("SELECT c.content FROM ROTAdminBundle:Configuratie c WHERE c.contenttarget = 'registrationstep5' AND c.nederlands = 1")->getSingleScalarResult(),
            'contentENG' => $this->getDoctrine()->getManager()->createQuery("SELECT c.content FROM ROTAdminBundle:Configuratie c WHERE c.contenttarget = 'registrationstep5' AND c.nederlands = 0")->getSingleScalarResult(),
            'form' => $form->createView()
        );
    }

    /**
     * @Route("/stap5")
     * @Method("POST")
     */
    public function saveStap5Action() {
        //Na het invoeren van de gegevens van de stuurman
        $request = $this->getRequest();
        $session = $request->getSession();
        $step = $session->get('step');
        $pStep = "'rot_inschrijf_inschrijf_stap4'";
        $lang = $session->get('lang');
        $hStap = $session->get('hStap');

        //Form afhandelen
        $form = $this->createForm(new Stap5Type(), null, array(
            'em' => $this->getDoctrine()->getManager(), 'lang' => $lang
        ));

        //Variabelen uit POST halen en in array zetten
        $form->submit($request);


        //Validatie
        if ($form->isValid()) {
            //Data ophalen als array
            $data = $form->getData();
            // Data opslaan in sessie onder "inschrijf.stap5"
            $session->set('inschrijf.stap5', $data);
            $data_stap5 = $session->get('inschrijf.stap5');
            $diff = $data_stap5['fokmaatDOB']->diff(new DateTime('28-06-2014'));
            $leeftijd = $diff->format('%y');
            $telefoon = $data_stap5['fokmaatMobielnr'];
            $noodtelefoon = $data_stap5['fokmaatNoodnr'];
            $email = $data_stap5['fokmaatEmail'];
            $emailConf = $data_stap5['fokmaatEmailConf'];
            $checkEmail = preg_match("/[A-Za-z0-9._\-]+@[A-Za-z0-9._\-]+\.[A-Za-z]{2,4}/", "$email");
            $validInput = true;

            if ($leeftijd < 15 && $validInput) {
                $validInput = false;
                if ($lang == 'nl') {
                    echo "<script type='text/javascript'>alert('U bent te jong.');</script>";
                } else {
                    echo "<script type='text/javascript'>alert('You are too young.');</script>";
                }
            }

            if ($validInput && (strlen($telefoon) < 10 || strlen($telefoon) > 15 || strlen($noodtelefoon) < 10 || strlen($noodtelefoon) > 15)) {
                $validInput = false;
                echo "<script type='text/javascript'>alert('Controleer de telefoonnummers.');</script>";
            }

            if ($validInput && ($email !== $emailConf || !$checkEmail)) {
                $validInput = false;
                echo "<script type='text/javascript'>alert('Controleer de e-mail velden.');</script>";
            }

            if ($validInput) {
                $this->allowNavigationTo(6);
                return $this->redirect($this->generateUrl('rot_inschrijf_inschrijf_stap6'));
            }

            return $this->render('ROTInschrijfBundle:Inschrijf:stap5.html.twig', array(
                        'lang' => $lang,
                        'step' => $step,
                        'hStap' => $hStap,
                        'pStep' => $pStep,
                        'siteTitel' => $this->getDoctrine()->getManager()->createQuery("SELECT c.content FROM ROTAdminBundle:Configuratie c WHERE c.contenttarget = 'sitetitel' AND c.nederlands = 1")->getSingleScalarResult(), //Dat is 1 "input"
                        'siteTitelENG' => $this->getDoctrine()->getManager()->createQuery("SELECT c.content FROM ROTAdminBundle:Configuratie c WHERE c.contenttarget = 'sitetitel' AND c.nederlands = 0")->getSingleScalarResult(), //Dat is 1 "input"
                        'siteOnderTitel' => $this->getDoctrine()->getManager()->createQuery("SELECT c.content FROM ROTAdminBundle:Configuratie c WHERE c.contenttarget = 'siteondertitel' AND c.nederlands = 1")->getSingleScalarResult(), //Dat is 1 "input"
                        'siteOnderTitelENG' => $this->getDoctrine()->getManager()->createQuery("SELECT c.content FROM ROTAdminBundle:Configuratie c WHERE c.contenttarget = 'siteondertitel' AND c.nederlands = 0")->getSingleScalarResult(), //Dat is 1 "input"
                        'siteRegistratieTitel' => $this->getDoctrine()->getManager()->createQuery("SELECT c.content FROM ROTAdminBundle:Configuratie c WHERE c.contenttarget = 'siteregistratietitel' AND c.nederlands = 1")->getSingleScalarResult(), //Dat is 1 "input"
                        'siteRegistratieTitelENG' => $this->getDoctrine()->getManager()->createQuery("SELECT c.content FROM ROTAdminBundle:Configuratie c WHERE c.contenttarget = 'siteregistratietitel' AND c.nederlands = 0")->getSingleScalarResult(), //Dat is 1 "input"
                        'content' => $this->getDoctrine()->getManager()->createQuery("SELECT c.content FROM ROTAdminBundle:Configuratie c WHERE c.contenttarget = 'registrationstep5' AND c.nederlands = 1")->getSingleScalarResult(),
                        'contentENG' => $this->getDoctrine()->getManager()->createQuery("SELECT c.content FROM ROTAdminBundle:Configuratie c WHERE c.contenttarget = 'registrationstep5' AND c.nederlands = 0")->getSingleScalarResult(),
                        'form' => $form->createView()
            ));
        }
    }

    /**
     * @Route("/stap6")
     * @Template()
     * @Method("GET")
     */
    public function stap6Action() {
        $alternativeResponse = $this->getAlternativeResponse(5);
        if ($alternativeResponse != null) {
            return $alternativeResponse;
        }
        //Hier wordt stap 4 geladen
        $request = $this->getRequest();
        $session = $request->getSession();
        $session->set('step', 6);
        $step = $session->get('step'); //Haal de huidige step op uit de sessie
        $pStep = "'rot_inschrijf_inschrijf_stap5'";
        $lang = $session->get('lang'); //Haal de huidige taal op uit de sessie
        $hStap = $session->get('hStap'); //Hoogst complete stap = 2
        //Build the form
        //        $defaultData = array('' => );
        $form = $this->createForm(new Stap6Type(), $session->get('inschrijf.stap6', array()), array(
            'em' => $this->getDoctrine()->getManager(), 'lang' => $lang
        ));

        // {% = logische functies zoals IF
        // {{ = echo
        // {# = comment

        return array(
            'lang' => $lang,
            'step' => $step,
            'pStep' => $pStep,
            'hStap' => $hStap,
            'siteTitel' => $this->getDoctrine()->getManager()->createQuery("SELECT c.content FROM ROTAdminBundle:Configuratie c WHERE c.contenttarget = 'sitetitel' AND c.nederlands = 1")->getSingleScalarResult(), //Dat is 1 "input"
            'siteTitelENG' => $this->getDoctrine()->getManager()->createQuery("SELECT c.content FROM ROTAdminBundle:Configuratie c WHERE c.contenttarget = 'sitetitel' AND c.nederlands = 0")->getSingleScalarResult(), //Dat is 1 "input"
            'siteOnderTitel' => $this->getDoctrine()->getManager()->createQuery("SELECT c.content FROM ROTAdminBundle:Configuratie c WHERE c.contenttarget = 'siteondertitel' AND c.nederlands = 1")->getSingleScalarResult(), //Dat is 1 "input"
            'siteOnderTitelENG' => $this->getDoctrine()->getManager()->createQuery("SELECT c.content FROM ROTAdminBundle:Configuratie c WHERE c.contenttarget = 'siteondertitel' AND c.nederlands = 0")->getSingleScalarResult(), //Dat is 1 "input"
            'siteRegistratieTitel' => $this->getDoctrine()->getManager()->createQuery("SELECT c.content FROM ROTAdminBundle:Configuratie c WHERE c.contenttarget = 'siteregistratietitel' AND c.nederlands = 1")->getSingleScalarResult(), //Dat is 1 "input"
            'siteRegistratieTitelENG' => $this->getDoctrine()->getManager()->createQuery("SELECT c.content FROM ROTAdminBundle:Configuratie c WHERE c.contenttarget = 'siteregistratietitel' AND c.nederlands = 0")->getSingleScalarResult(), //Dat is 1 "input"
            'content' => $this->getDoctrine()->getManager()->createQuery("SELECT c.content FROM ROTAdminBundle:Configuratie c WHERE c.contenttarget = 'registrationstep6' AND c.nederlands = 1")->getSingleScalarResult(),
            'contentENG' => $this->getDoctrine()->getManager()->createQuery("SELECT c.content FROM ROTAdminBundle:Configuratie c WHERE c.contenttarget = 'registrationstep6' AND c.nederlands = 0")->getSingleScalarResult(),
            'form' => $form->createView()
        );
    }

    /**
     * @Route("/stap6")
     * @Method("POST")
     */
    public function saveStap6Action() {
        //Na het invoeren van de gegevens van de stuurman
        $request = $this->getRequest();
        $session = $request->getSession();
        $step = $session->get('step');
        $pStep = "'rot_inschrijf_inschrijf_stap5'";
        $lang = $session->get('lang');
        $hStap = $session->get('hStap');

        //Form afhandelen
        $form = $this->createForm(new Stap6Type(), null, array(
            'em' => $this->getDoctrine()->getManager(), 'lang' => $lang
        ));

        //Variabelen uit POST halen en in array zetten
        $form->submit($request);


        //Validatie
        if ($form->isValid()) {
            //Data ophalen als array
            $data = $form->getData();
            // Data opslaan in sessie onder "inschrijf.stap6"
            $session->set('inschrijf.stap6', $data);
            $this->allowNavigationTo(7);
            return $this->redirect($this->generateUrl('rot_inschrijf_inschrijf_stap7'));
        }

        return $this->render('ROTInschrijfBundle:Inschrijf:stap6.html.twig', array(
                    'lang' => $lang,
                    'step' => $step,
                    'pStep' => $pStep,
                    'hStap' => $hStap,
                    'siteTitel' => $this->getDoctrine()->getManager()->createQuery("SELECT c.content FROM ROTAdminBundle:Configuratie c WHERE c.contenttarget = 'sitetitel' AND c.nederlands = 1")->getSingleScalarResult(), //Dat is 1 "input"
                    'siteTitelENG' => $this->getDoctrine()->getManager()->createQuery("SELECT c.content FROM ROTAdminBundle:Configuratie c WHERE c.contenttarget = 'sitetitel' AND c.nederlands = 0")->getSingleScalarResult(), //Dat is 1 "input"
                    'siteOnderTitel' => $this->getDoctrine()->getManager()->createQuery("SELECT c.content FROM ROTAdminBundle:Configuratie c WHERE c.contenttarget = 'siteondertitel' AND c.nederlands = 1")->getSingleScalarResult(), //Dat is 1 "input"
                    'siteOnderTitelENG' => $this->getDoctrine()->getManager()->createQuery("SELECT c.content FROM ROTAdminBundle:Configuratie c WHERE c.contenttarget = 'siteondertitel' AND c.nederlands = 0")->getSingleScalarResult(), //Dat is 1 "input"
                    'siteRegistratieTitel' => $this->getDoctrine()->getManager()->createQuery("SELECT c.content FROM ROTAdminBundle:Configuratie c WHERE c.contenttarget = 'siteregistratietitel' AND c.nederlands = 1")->getSingleScalarResult(), //Dat is 1 "input"
                    'siteRegistratieTitelENG' => $this->getDoctrine()->getManager()->createQuery("SELECT c.content FROM ROTAdminBundle:Configuratie c WHERE c.contenttarget = 'siteregistratietitel' AND c.nederlands = 0")->getSingleScalarResult(), //Dat is 1 "input"
                    'content' => $this->getDoctrine()->getManager()->createQuery("SELECT c.content FROM ROTAdminBundle:Configuratie c WHERE c.contenttarget = 'registrationstep6' AND c.nederlands = 1")->getSingleScalarResult(),
                    'contentENG' => $this->getDoctrine()->getManager()->createQuery("SELECT c.content FROM ROTAdminBundle:Configuratie c WHERE c.contenttarget = 'registrationstep6' AND c.nederlands = 0")->getSingleScalarResult(),
                    'form' => $form->createView()
        ));
    }

    /**
     * @Route("/stap7")
     * @Template()
     * @Method("GET")
     */
    public function stap7Action() {
        $alternativeResponse = $this->getAlternativeResponse(6);
        if ($alternativeResponse != null) {
            return $alternativeResponse;
        }
        //Hier wordt stap 7 geladen
        $request = $this->getRequest();
        $session = $request->getSession();
//        $session->set('step', 'lastStep'); //Zorgt ervoor dat de Next button Save wordt
        $session->set('step', 7);
        $step = $session->get('step'); //Haal de huidige step op uit de sessie
        $pStep = "'rot_inschrijf_inschrijf_stap6'";
        $lang = $session->get('lang'); //Haal de huidige taal op uit de sessie
        $hStap = $session->get('hStap'); //Hoogst complete stap
        //Sessievariabelen ophalen voor controle
        $data_stap3 = $session->get('inschrijf.stap3');
        $data_stap4 = $session->get('inschrijf.stap4');
        $data_stap5 = $session->get('inschrijf.stap5');
        $data_stap6 = $session->get('inschrijf.stap6');

        //Build the form
        //        $defaultData = array('' => );
        $form = $this->createForm(new Stap7Type(), array(
            'em' => $this->getDoctrine()->getManager()
        ));

        // {% = logische functies zoals IF
        // {{ = echo
        // {# = comment

        return array(
            'lang' => $lang,
            'step' => $step,
            'pStep' => $pStep,
            'hStap' => $hStap,
            'siteTitel' => $this->getDoctrine()->getManager()->createQuery("SELECT c.content FROM ROTAdminBundle:Configuratie c WHERE c.contenttarget = 'sitetitel' AND c.nederlands = 1")->getSingleScalarResult(), //Dat is 1 "input"
            'siteTitelENG' => $this->getDoctrine()->getManager()->createQuery("SELECT c.content FROM ROTAdminBundle:Configuratie c WHERE c.contenttarget = 'sitetitel' AND c.nederlands = 0")->getSingleScalarResult(), //Dat is 1 "input"
            'siteOnderTitel' => $this->getDoctrine()->getManager()->createQuery("SELECT c.content FROM ROTAdminBundle:Configuratie c WHERE c.contenttarget = 'siteondertitel' AND c.nederlands = 1")->getSingleScalarResult(), //Dat is 1 "input"
            'siteOnderTitelENG' => $this->getDoctrine()->getManager()->createQuery("SELECT c.content FROM ROTAdminBundle:Configuratie c WHERE c.contenttarget = 'siteondertitel' AND c.nederlands = 0")->getSingleScalarResult(), //Dat is 1 "input"
            'siteRegistratieTitel' => $this->getDoctrine()->getManager()->createQuery("SELECT c.content FROM ROTAdminBundle:Configuratie c WHERE c.contenttarget = 'siteregistratietitel' AND c.nederlands = 1")->getSingleScalarResult(), //Dat is 1 "input"
            'siteRegistratieTitelENG' => $this->getDoctrine()->getManager()->createQuery("SELECT c.content FROM ROTAdminBundle:Configuratie c WHERE c.contenttarget = 'siteregistratietitel' AND c.nederlands = 0")->getSingleScalarResult(), //Dat is 1 "input"
            'content' => $this->getDoctrine()->getManager()->createQuery("SELECT c.content FROM ROTAdminBundle:Configuratie c WHERE c.contenttarget = 'registrationstep7' AND c.nederlands = 1")->getSingleScalarResult(),
            'contentENG' => $this->getDoctrine()->getManager()->createQuery("SELECT c.content FROM ROTAdminBundle:Configuratie c WHERE c.contenttarget = 'registrationstep7' AND c.nederlands = 0")->getSingleScalarResult(),
            'data_stap3' => $data_stap3,
            'data_stap4' => $data_stap4,
            'data_stap5' => $data_stap5,
            'data_stap6' => $data_stap6,
            'form' => $form->createView()
        );
    }

    /**
     * @Route("/stap7")
     * @Method("POST")
     */
    public function saveStap7Action() {
        //Na het controleren van alle gegevens
        $request = $this->getRequest();
        $session = $request->getSession();
        $step = $session->get('step');
        $pStep = "'rot_inschrijf_inschrijf_stap6'";
        $lang = $session->get('lang');
        $hStap = $session->get('hStap');
        $flash = $this->getRequest()->getSession()->getFlashBag();

        //Form afhandelen
        $form = $this->createForm(new Stap7Type(), array(
            'em' => $this->getDoctrine()->getManager()
        ));

        //Variabelen uit POST halen en in array zetten
        $form->submit($request);


        //Validatie
        if ($form->isValid()) {
            $this->allowNavigationTo(8);
            return $this->redirect($this->generateUrl('rot_inschrijf_inschrijf_stap8'));
        }

        return $this->render('ROTInschrijfBundle:Inschrijf:stap7.html.twig', array(
                    'lang' => $lang,
                    'step' => $step,
                    'pStep' => $pStep,
                    'hStap' => $hStap,
                    'siteTitel' => $this->getDoctrine()->getManager()->createQuery("SELECT c.content FROM ROTAdminBundle:Configuratie c WHERE c.contenttarget = 'sitetitel' AND c.nederlands = 1")->getSingleScalarResult(), //Dat is 1 "input"
                    'siteTitelENG' => $this->getDoctrine()->getManager()->createQuery("SELECT c.content FROM ROTAdminBundle:Configuratie c WHERE c.contenttarget = 'sitetitel' AND c.nederlands = 0")->getSingleScalarResult(), //Dat is 1 "input"
                    'siteOnderTitel' => $this->getDoctrine()->getManager()->createQuery("SELECT c.content FROM ROTAdminBundle:Configuratie c WHERE c.contenttarget = 'siteondertitel' AND c.nederlands = 1")->getSingleScalarResult(), //Dat is 1 "input"
                    'siteOnderTitelENG' => $this->getDoctrine()->getManager()->createQuery("SELECT c.content FROM ROTAdminBundle:Configuratie c WHERE c.contenttarget = 'siteondertitel' AND c.nederlands = 0")->getSingleScalarResult(), //Dat is 1 "input"
                    'siteRegistratieTitel' => $this->getDoctrine()->getManager()->createQuery("SELECT c.content FROM ROTAdminBundle:Configuratie c WHERE c.contenttarget = 'siteregistratietitel' AND c.nederlands = 1")->getSingleScalarResult(), //Dat is 1 "input"
                    'siteRegistratieTitelENG' => $this->getDoctrine()->getManager()->createQuery("SELECT c.content FROM ROTAdminBundle:Configuratie c WHERE c.contenttarget = 'siteregistratietitel' AND c.nederlands = 0")->getSingleScalarResult(), //Dat is 1 "input"
                    'content' => $this->getDoctrine()->getManager()->createQuery("SELECT c.content FROM ROTAdminBundle:Configuratie c WHERE c.contenttarget = 'registrationstep7' AND c.nederlands = 1")->getSingleScalarResult(),
                    'contentENG' => $this->getDoctrine()->getManager()->createQuery("SELECT c.content FROM ROTAdminBundle:Configuratie c WHERE c.contenttarget = 'registrationstep7' AND c.nederlands = 0")->getSingleScalarResult(),
                    'form' => $form->createView()
        ));
    }

    /**
     * @Route("/stap8")
     * @Template()
     * @Method("GET")
     */
    public function stap8Action() {
        $alternativeResponse = $this->getAlternativeResponse(7);
        if ($alternativeResponse != null) {
            return $alternativeResponse;
        }
        $session = $this->getRequest()->getSession();
        $step = $session->set('step', 8); //Zorgt ervoor dat de Next button Save wordt
        $pStep = "'rot_inschrijf_inschrijf_stap7'";
        $hStap = $session->get('hStap');
        $lang = $session->get('lang');

        $form = $this->createForm(new Stap8Type());
        return $this->render('ROTInschrijfBundle:Inschrijf:stap8.html.twig', array(
                    'lang' => $lang,
                    'step' => $step,
                    'pStep' => $pStep,
                    'hStap' => $hStap,
                    'siteTitel' => $this->getDoctrine()->getManager()->createQuery("SELECT c.content FROM ROTAdminBundle:Configuratie c WHERE c.contenttarget = 'sitetitel' AND c.nederlands = 1")->getSingleScalarResult(), //Dat is 1 "input"
                    'siteTitelENG' => $this->getDoctrine()->getManager()->createQuery("SELECT c.content FROM ROTAdminBundle:Configuratie c WHERE c.contenttarget = 'sitetitel' AND c.nederlands = 0")->getSingleScalarResult(), //Dat is 1 "input"
                    'siteOnderTitel' => $this->getDoctrine()->getManager()->createQuery("SELECT c.content FROM ROTAdminBundle:Configuratie c WHERE c.contenttarget = 'siteondertitel' AND c.nederlands = 1")->getSingleScalarResult(), //Dat is 1 "input"
                    'siteOnderTitelENG' => $this->getDoctrine()->getManager()->createQuery("SELECT c.content FROM ROTAdminBundle:Configuratie c WHERE c.contenttarget = 'siteondertitel' AND c.nederlands = 0")->getSingleScalarResult(), //Dat is 1 "input"
                    'siteRegistratieTitel' => $this->getDoctrine()->getManager()->createQuery("SELECT c.content FROM ROTAdminBundle:Configuratie c WHERE c.contenttarget = 'siteregistratietitel' AND c.nederlands = 1")->getSingleScalarResult(), //Dat is 1 "input"
                    'siteRegistratieTitelENG' => $this->getDoctrine()->getManager()->createQuery("SELECT c.content FROM ROTAdminBundle:Configuratie c WHERE c.contenttarget = 'siteregistratietitel' AND c.nederlands = 0")->getSingleScalarResult(), //Dat is 1 "input"
                    'content' => $this->getDoctrine()->getManager()->createQuery("SELECT c.content FROM ROTAdminBundle:Configuratie c WHERE c.contenttarget = 'registrationstep8' AND c.nederlands = 1")->getSingleScalarResult(),
                    'contentENG' => $this->getDoctrine()->getManager()->createQuery("SELECT c.content FROM ROTAdminBundle:Configuratie c WHERE c.contenttarget = 'registrationstep8' AND c.nederlands = 0")->getSingleScalarResult(),
                    'form' => $form->createView()
        ));
    }

    /**
     * @Route("/stap8")
     * @Method("POST")
     */
    public function saveStap8Action() {
        $this->saveData();
        $this->allowNavigationTo(9);
        return $this->redirect($this->generateUrl('rot_inschrijf_inschrijf_stap9'));
    }

    /**
     * @Route("/stap9")
     * @Method("GET")
     */
    public function Stap9Action() {
        $alternativeResponse = $this->getAlternativeResponse(8);
        if ($alternativeResponse != null) {
            return $alternativeResponse;
        }
        $session = $this->getRequest()->getSession();
        $step = $session->set('step', 9); //Zorgt ervoor dat de Next button Save wordt
        $pStep = "'rot_inschrijf_inschrijf_stap8'";
        $hStap = $session->get('hStap');
        $lang = $session->get('lang');


        $form = $this->createForm(new Stap9Type());
        $properties = array(
            'lang' => $lang,
            'step' => $step,
            'pStep' => $pStep,
            'hStap' => $hStap,
            'siteTitel' => $this->getDoctrine()->getManager()->createQuery("SELECT c.content FROM ROTAdminBundle:Configuratie c WHERE c.contenttarget = 'sitetitel' AND c.nederlands = 1")->getSingleScalarResult(), //Dat is 1 "input"
            'siteTitelENG' => $this->getDoctrine()->getManager()->createQuery("SELECT c.content FROM ROTAdminBundle:Configuratie c WHERE c.contenttarget = 'sitetitel' AND c.nederlands = 0")->getSingleScalarResult(), //Dat is 1 "input"
            'siteOnderTitel' => $this->getDoctrine()->getManager()->createQuery("SELECT c.content FROM ROTAdminBundle:Configuratie c WHERE c.contenttarget = 'siteondertitel' AND c.nederlands = 1")->getSingleScalarResult(), //Dat is 1 "input"
            'siteOnderTitelENG' => $this->getDoctrine()->getManager()->createQuery("SELECT c.content FROM ROTAdminBundle:Configuratie c WHERE c.contenttarget = 'siteondertitel' AND c.nederlands = 0")->getSingleScalarResult(), //Dat is 1 "input"
            'siteRegistratieTitel' => $this->getDoctrine()->getManager()->createQuery("SELECT c.content FROM ROTAdminBundle:Configuratie c WHERE c.contenttarget = 'siteregistratietitel' AND c.nederlands = 1")->getSingleScalarResult(), //Dat is 1 "input"
            'siteRegistratieTitelENG' => $this->getDoctrine()->getManager()->createQuery("SELECT c.content FROM ROTAdminBundle:Configuratie c WHERE c.contenttarget = 'siteregistratietitel' AND c.nederlands = 0")->getSingleScalarResult(), //Dat is 1 "input"
            'content' => $this->getDoctrine()->getManager()->createQuery("SELECT c.content FROM ROTAdminBundle:Configuratie c WHERE c.contenttarget = 'registrationstep8' AND c.nederlands = 1")->getSingleScalarResult(),
            'contentENG' => $this->getDoctrine()->getManager()->createQuery("SELECT c.content FROM ROTAdminBundle:Configuratie c WHERE c.contenttarget = 'registrationstep8' AND c.nederlands = 0")->getSingleScalarResult(),
            'form' => $form->createView(),
            'mailHTML' => $_SESSION["mail-preview"]);
        $session->clear();
        session_destroy();
        return $this->render('ROTInschrijfBundle:Inschrijf:stap9.html.twig', $properties);
    }

    private function storeMailBody($mail) {
        $_SESSION["mail-body"] = "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
 <head>
  <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
  <title>Demystifying Email Design</title>
  <meta name='viewport' content='width=device-width, initial-scale=1.0'/>
</head><body style='margin: 0; padding: 0;'>
" . $mail . "</body></html>";
    }

    private function getEmailPreview($lang) {
        $isLanguageDutch = $this->isLanguageDutch($lang);
        $email = $this->getDoctrine()->getManager()->createQuery(
                        "SELECT c.content FROM ROTAdminBundle:Configuratie c WHERE" .
                        " c.contenttarget = 'aanmeldingmailhtml' AND c.nederlands = " .
                        $isLanguageDutch)->getSingleScalarResult();
        
        return $this->formatEmail($email);
    }

    private function formatEmail($email) {
        $emailAttributes = $this->getRequest()->getSession()->get("emailAttributes");
        foreach ($emailAttributes as $key => $value) {
            $email = str_replace($key, $value, $email);
        }
        return $email;
    }

    private function isLanguageDutch($lang) {
        if ($lang == "nl") {
            return 1;
        }
        return 0;
    }

    public function showHeaderAction() {
        return $this->render('ROTInschrijfBundle:Inschrijf:header.html.twig');
    }

}
