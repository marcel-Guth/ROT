<?php

namespace ROT\Bundle\IISBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use ROT\Bundle\IISBundle\Entity\Vereniging;

class LoadVereniging extends AbstractFixture {
    public function load(ObjectManager $manager) {
        $verenigingen = array(
            array('id' => '2','naam' => 'Botenvereniging Callantsoog','iscustom' => '0'),
            array('id' => '3','naam' => 'Botenvereniging De Werf Egmond','iscustom' => '0'),
            array('id' => '4','naam' => 'Cat Club 7.2 Hargen aan Zee','iscustom' => '0'),
            array('id' => '5','naam' => 'Cat Club Bloemendaal','iscustom' => '0'),
            array('id' => '6','naam' => 'Cat Club Noordzee','iscustom' => '0'),
            array('id' => '7','naam' => 'Catamaranver. Castricum','iscustom' => '0'),
            array('id' => '8','naam' => 'Catamaranver. Oostmahorn','iscustom' => '0'),
            array('id' => '9','naam' => 'Catclub Bad Hoophuizen','iscustom' => '0'),
            array('id' => '10','naam' => 'Catclub BRU','iscustom' => '0'),
            array('id' => '11','naam' => 'Catclub Den Osse','iscustom' => '0'),
            array('id' => '12','naam' => 'Catclub Zeeland','iscustom' => '0'),
            array('id' => '13','naam' => 'Catver. CAT-POINT','iscustom' => '0'),
            array('id' => '14','naam' => 'Catver. HELLECAT','iscustom' => '0'),
            array('id' => '15','naam' => 'Cocksdorper KzV','iscustom' => '0'),
            array('id' => '16','naam' => 'Datchet SC','iscustom' => '0'),
            array('id' => '17','naam' => 'Exploder Sailing Team','iscustom' => '0'),
            array('id' => '18','naam' => 'Haagsche KzV','iscustom' => '0'),
            array('id' => '19','naam' => 'Hoekse WsV','iscustom' => '0'),
            array('id' => '20','naam' => 'KR&ZV De Maas','iscustom' => '0'),
            array('id' => '21','naam' => 'Kustzeilver. Rockanje','iscustom' => '0'),
            array('id' => '22','naam' => 'KzV Den Helder','iscustom' => '0'),
            array('id' => '23','naam' => 'KzV Monster','iscustom' => '0'),
            array('id' => '24','naam' => 'KzV Paal 15','iscustom' => '0'),
            array('id' => '25','naam' => 'KzV Scheveningen','iscustom' => '0'),
            array('id' => '26','naam' => 'KzV Velsen','iscustom' => '0'),
            array('id' => '27','naam' => 'KzV Wassenaar','iscustom' => '0'),
            array('id' => '28','naam' => 'KzV Westerslag','iscustom' => '0'),
            array('id' => '29','naam' => 'KZVG (\'s-Gravenzande)','iscustom' => '0'),
            array('id' => '30','naam' => 'KZ&BV Bergen','iscustom' => '0'),
            array('id' => '31','naam' => 'KZ&BV Wijk aan Zee','iscustom' => '0'),
            array('id' => '32','naam' => 'Noord West 9 Petten','iscustom' => '0'),
            array('id' => '33','naam' => 'RBSC Duinbergen','iscustom' => '0'),
            array('id' => '34','naam' => 'RBSC Zoute','iscustom' => '0'),
            array('id' => '35','naam' => 'Sail Center 107 Kijkduin','iscustom' => '0'),
            array('id' => '36','naam' => 'Segelclub Wendelsee SCWe','iscustom' => '0'),
            array('id' => '37','naam' => 'Segelklub Bayer Uerdingen (SKBUe)','iscustom' => '0'),
            array('id' => '38','naam' => 'SLRV Sail Lollipop','iscustom' => '0'),
            array('id' => '39','naam' => 'Stokes Bay Sailing Club','iscustom' => '0'),
            array('id' => '40','naam' => 'SYCOD Oostduinkerke','iscustom' => '0'),
            array('id' => '41','naam' => 'Thorpe Bay Yacht Club','iscustom' => '0'),
            array('id' => '42','naam' => 'VVW Heist','iscustom' => '0'),
            array('id' => '43','naam' => 'WsV Ameland','iscustom' => '0'),
            array('id' => '44','naam' => 'WsV Bestevaer','iscustom' => '0'),
            array('id' => '45','naam' => 'WsV Braassemermeer','iscustom' => '0'),
            array('id' => '46','naam' => 'WsV De Eemhof','iscustom' => '0'),
            array('id' => '47','naam' => 'WsV De Zandmeren','iscustom' => '0'),
            array('id' => '48','naam' => 'Wsv Flevo Harderwijk','iscustom' => '0'),
            array('id' => '49','naam' => 'WsV Giesbeek','iscustom' => '0'),
            array('id' => '50','naam' => 'WsV Hoorn','iscustom' => '0'),
            array('id' => '51','naam' => 'WsV Muiderberg','iscustom' => '0'),
            array('id' => '52','naam' => 'WsV Nulde','iscustom' => '0'),
            array('id' => '53','naam' => 'WsV Skuytevaert','iscustom' => '0'),
            array('id' => '54','naam' => 'WsV Surfcats Beverwijk','iscustom' => '0'),
            array('id' => '55','naam' => 'WsV Veluwemeer','iscustom' => '0'),
            array('id' => '56','naam' => 'WsV Warder','iscustom' => '0'),
            array('id' => '57','naam' => 'WV Arne','iscustom' => '0'),
            array('id' => '58','naam' => 'WV De Kreupel','iscustom' => '0'),
            array('id' => '59','naam' => 'WV Het Bovenwater','iscustom' => '0'),
            array('id' => '60','naam' => 'WV Het Witte Huis','iscustom' => '0'),
            array('id' => '61','naam' => 'WV Lelystad','iscustom' => '0'),
            array('id' => '62','naam' => 'WV Noord AA','iscustom' => '0'),
            array('id' => '63','naam' => 'WV Spakenburg','iscustom' => '0'),
            array('id' => '64','naam' => 'WV Zandvoort','iscustom' => '0'),
            array('id' => '65','naam' => 'Zeilclub Mifune','iscustom' => '0'),
            array('id' => '66','naam' => 'ZV De Roerkoning','iscustom' => '0'),
            array('id' => '67','naam' => 'ZV Noordwijk','iscustom' => '0'),
            array('id' => '68','naam' => '**Overig/Other**','iscustom' => '0')
        );

        foreach ($verenigingen as $vereniging) {
            $v = new Vereniging();
            $v->setNaam($vereniging['naam']);
            $v->setIscustom($vereniging['iscustom']);
            $manager->persist($v);
            $this->addReference('vereniging-' . $vereniging['naam'], $v);
        }

        $manager->flush();
    }
}