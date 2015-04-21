<?php

namespace ROT\Bundle\InschrijfBundle\Twig;


class inschrijfTwigExtension extends \Twig_Extension
{
    public function getName()
    {
        return 'inschrijf';
    }

    public function getGlobals()
    {
        return array(
            'siteTitel' => $this->getDoctrine()->getManager()->createQuery("SELECT c.content FROM ROTAdminBundle:Configuratie c WHERE c.contenttarget = 'sitetitel' AND c.nederlands = 1")->getSingleScalarResult(), //Dat is 1 "input"
            'siteTitelENG' => $this->getDoctrine()->getManager()->createQuery("SELECT c.content FROM ROTAdminBundle:Configuratie c WHERE c.contenttarget = 'sitetitel' AND c.nederlands = 0")->getSingleScalarResult(), //Dat is 1 "input"
            'siteOnderTitel' => $this->getDoctrine()->getManager()->createQuery("SELECT c.content FROM ROTAdminBundle:Configuratie c WHERE c.contenttarget = 'siteondertitel' AND c.nederlands = 1")->getSingleScalarResult(), //Dat is 1 "input"
            'siteOnderTitelENG' => $this->getDoctrine()->getManager()->createQuery("SELECT c.content FROM ROTAdminBundle:Configuratie c WHERE c.contenttarget = 'siteondertitel' AND c.nederlands = 0")->getSingleScalarResult(), //Dat is 1 "input"
            'siteRegistratieTitel' => $this->getDoctrine()->getManager()->createQuery("SELECT c.content FROM ROTAdminBundle:Configuratie c WHERE c.contenttarget = 'siteregistratietitel' AND c.nederlands = 1")->getSingleScalarResult(), //Dat is 1 "input"
            'siteRegistratieTitelENG' => $this->getDoctrine()->getManager()->createQuery("SELECT c.content FROM ROTAdminBundle:Configuratie c WHERE c.contenttarget = 'siteregistratietitel' AND c.nederlands = 0")->getSingleScalarResult(), //Dat is 1 "input"
        );
    }
}