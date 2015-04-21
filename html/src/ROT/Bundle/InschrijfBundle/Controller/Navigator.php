<?php

namespace ROT\Bundle\InschrijfBundle\Controller;
use Symfony\Component\HttpFoundation\Response;

class Navigator {

    private $controller;
    private $session;

    public function __construct($controller) {
        $this->controller = $controller;
    }

    public function allowNavigationTo($step) {
        $this->session = $this->controller->getRequest()->getSession();
        $this->session->set("step", $step);
        if ($step > $this->session->get("hStap")) {
            $this->session->set("hStap", $step);
        }
        $this->setPreviousStepOf($step);
    }

    private function setPreviousStepOf($step) {
        if ($step == 1) {
            $this->session->set("pStep", 1);
        } else {
            $this->session->set("pStep", $step - 1);
        }
    }

    public function getAlternativeResponse($currentStep) {
        $this->session = $this->controller->getRequest()->getSession();
        if (!$this->isInschrijvenAllowed()) {
            return new Response($this->getInschrijvenNotAllowedMessage());
        }
        return $this->isLoadingStepAllowed($currentStep);
    }

    private function isLoadingStepAllowed($currentStep) {
        $this->prepareForNavigation($this->session);
        if ($currentStep > $this->session->get("hStap")) {
            return $this->redirectToCurrentPage();
        }
        return null;
    }

    private function redirectToCurrentPage() {
        $baseUrl = $this->session->get("baseUrl");
        if ($this->session->get("step") == 1) {
            return $this->controller->redirect($this->controller->generateUrl("rot_inschrijf_inschrijf_inschrijf"));
        }
        $urlOfCurrentStep = $baseUrl . $this->session->get("step");
        return $this->controller->redirect($this->controller->generateUrl($urlOfCurrentStep));
    }

    private function prepareForNavigation() {
        if (!$this->session->has("step")) {
            $this->session->set("step", 1);
            $this->session->set("hStap", 1);
            $this->session->set("pStep", 1);
            $this->session->set("baseUrl", "rot_inschrijf_inschrijf_stap");
        }
    }

    private function getInschrijvenNotAllowedMessage() {
        return "<script>
            alert('De inschrijfpagina is gesloten. U wordt doorverwezen naar de website van de Ronde om Texel.');
            window.location.href='http://www.roundtexel.com';
         </script>";
    }

    private function isInschrijvenAllowed() {
        $datumOpening = $this->getDatumOpening();
        $vandaag = date('Y-m-d H:i:s');
        return ($datumOpening <= $vandaag) || true; 
    }

    private function getDatumOpening() {
        if (!$this->session->has("datumOpening")) {
            $datumOpening = $this->fetchDatumOpening();
            $this->session->set("datumOpening", $datumOpening);
        }
        return $this->session->get("datumOpening");
    }

    private function fetchDatumOpening() {
        $username = "root";
        $password = "test2";
        $hostname = "localhost";
        $dbhandle = mysql_connect($hostname, $username, $password);
        mysql_query("USE rot", $dbhandle);
        $variabele = mysql_query('SELECT variable FROM variable WHERE id=1');
        $row = mysql_fetch_row($variabele);
        $datumOpening = $row[0];
        mysql_close($dbhandle);
        return $datumOpening;
    }
}
