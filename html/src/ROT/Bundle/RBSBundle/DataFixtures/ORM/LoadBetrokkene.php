<?php

namespace ROT\Bundle\RBSBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use ROT\Bundle\PBSBundle\Entity\Parkeerkaart;
use ROT\Bundle\RBSBundle\Entity\Betrokkene;

class LoadBetrokkene extends AbstractFixture implements DependentFixtureInterface {
    public function load(ObjectManager $manager) {
        $b = new Betrokkene();
        $b->setVoornaam('Harry');
        $b->setTussenvoegsel('de');
        $b->setAchternaam('Vries');
        $b->setOrganisatie($this->getReference('organisatie-Bizzmark'));
        $b->setSoort('eensoort');

        $p = new Parkeerkaart();
        $p->setKenteken('AA-12-BB');
        $p->setVergunningsoort('eensoort');
        $p->setKaarttype('Organisatie');
        $p->setStrandvergunningsoort('Geen');
        $p->setVergunningsoort('Geen');
        $b->setParkeerkaart($p);

        $manager->persist($b);
        $manager->flush();
    }

    public function getDependencies() {
        return array(
            'ROT\Bundle\RBSBundle\DataFixtures\ORM\LoadOrganisatie'
        );
    }
}