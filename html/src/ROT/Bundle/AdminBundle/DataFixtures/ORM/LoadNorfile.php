<?php

namespace ROT\Bundle\AdminBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use ROT\Bundle\AdminBundle\Entity\Gebruiker;
use ROT\Bundle\AdminBundle\Entity\Norfile;
use ROT\Bundle\AdminBundle\Entity\Variable;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LoadNorfile implements FixtureInterface {
    public function load(ObjectManager $manager) {
        $n = new Norfile();
        $n->setNorfilename('NORROT2012-v1.pdf');
        $n->setExtension('pdf');
        $n->setSelected(false);
        $n->setTimestamp(new \DateTime('2012-05-12 08:31:12'));
        $manager->persist($n);
        $n = new Norfile();
        $n->setNorfilename('NORROT2012.pdf');
        $n->setExtension('pdf');
        $n->setSelected(true);
        $n->setTimestamp(new \DateTime('2012-05-12 00:25:11'));
        $manager->persist($n);
        $n = new Norfile();
        $n->setNorfilename('Baantekening.png');
        $n->setExtension('img');
        $n->setSelected(true);
        $n->setTimestamp(new \DateTime('2012-05-29 08:55:29'));
        $manager->persist($n);
        $n = new Norfile();
        $n->setNorfilename('NORROT2012.html');
        $n->setExtension('html');
        $n->setSelected(true);
        $n->setTimestamp(new \DateTime('2012-05-29 10:47:41'));
        $manager->persist($n);
        $n = new Norfile();
        $n->setNorfilename('NORROT2012-v2.html');
        $n->setExtension('html');
        $n->setSelected(false);
        $n->setTimestamp(new \DateTime('2012-05-29 10:38:35'));
        $manager->persist($n);
        $manager->flush();
    }
}