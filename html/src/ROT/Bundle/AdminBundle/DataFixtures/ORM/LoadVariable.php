<?php

namespace ROT\Bundle\AdminBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use ROT\Bundle\AdminBundle\Entity\Gebruiker;
use ROT\Bundle\AdminBundle\Entity\Variable;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LoadVariable implements FixtureInterface {
    public function load(ObjectManager $manager) {
        $v = new Variable();
        $v->setVariable(new \DateTime('2013-11-21 10:00:00'));
        $v->setDescription('De dag en tijdstip dat het registratieformulier open gaat');
        $manager->persist($v);
        $v = new Variable();
        $v->setVariable(new \DateTime('2013-07-15 00:00:00'));
        $v->setDescription('De dag dat de race begint');
        $manager->persist($v);
        $manager->flush();
    }
}