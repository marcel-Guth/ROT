<?php

namespace ROT\Bundle\AdminBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use ROT\Bundle\AdminBundle\Entity\Gebruiker;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LoadGebruiker implements FixtureInterface, ContainerAwareInterface {
    private $container;

    public function setContainer(ContainerInterface $container = null) {
        $this->container = $container;
    }

    public function load(ObjectManager $manager) {
        $g = new Gebruiker();
        $g->setNaam('Merijn Wijngaard');
        $g->setUsername('merijn');
        $g->setRoles(array('ROLE_BEKIJK_GEBRUIKERS', 'ROLE_WIJZIG_GEBRUIKERS', 'ROLE_CONFIGUREER_RACE', 'ROLE_CONFIGUREER_APPLICATIE', 'ROLE_CONFIGUREER_INSCHRIJF', 'ROLE_WIJZIG_IIS', 'ROLE_WIJZIG_PBS', 'ROLE_WIJZIG_RBS'));
        $encoder = $this->container->get('security.encoder_factory')->getEncoder($g);
        $g->setPassword($encoder->encodePassword('merijn', $g->getSalt()));
        $manager->persist($g);
        $g = new Gebruiker();
        $g->setNaam('Jos Verhaar');
        $g->setUsername('jos');
        $g->setRoles(array('ROLE_BEKIJK_GEBRUIKERS', 'ROLE_WIJZIG_GEBRUIKERS', 'ROLE_CONFIGUREER_RACE', 'ROLE_CONFIGUREER_APPLICATIE', 'ROLE_CONFIGUREER_INSCHRIJF', 'ROLE_WIJZIG_IIS', 'ROLE_WIJZIG_PBS', 'ROLE_WIJZIG_RBS'));
        $g->setPassword($encoder->encodePassword('jos', $g->getSalt()));
        $manager->persist($g);
        $manager->flush();
    }
}