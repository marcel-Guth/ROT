<?php

namespace ROT\Bundle\IISBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use ROT\Bundle\IISBundle\Entity\Uitzondering;

class LoadUitzondering implements FixtureInterface {
    public function load(ObjectManager $manager) {
        $uitzonderingen = array(
            array('id' => '1','afkorting' => 'PMS','uitzondering' => 'Premature Start'),
            array('id' => '2','afkorting' => 'DSQ','uitzondering' => 'Disqualified'),
            array('id' => '3','afkorting' => 'DNS','uitzondering' => 'Did Not Start'),
            array('id' => '4','afkorting' => 'DNF','uitzondering' => 'Did Not Finish')
        );

        foreach ($uitzonderingen as $uitzondering) {
            $u = new Uitzondering();
            $u->setAfkorting($uitzondering['afkorting']);
            $u->setUitzondering($uitzondering['uitzondering']);
            $manager->persist($u);
        }

        $manager->flush();
    }
}