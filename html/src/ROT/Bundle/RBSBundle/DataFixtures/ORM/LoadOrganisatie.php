<?php

namespace ROT\Bundle\RBSBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use ROT\Bundle\RBSBundle\Entity\Organisatie;

class LoadOrganisatie extends AbstractFixture {
    public function load(ObjectManager $manager) {
        $organisaties = array(
            array('id' => '1','organisatie' => 'Bestuur'),
            array('id' => '2','organisatie' => 'Bewaking'),
            array('id' => '3','organisatie' => 'Bizzmark'),
            array('id' => '4','organisatie' => 'Brandweer'),
            array('id' => '5','organisatie' => 'Catering'),
            array('id' => '6','organisatie' => 'Cote D\'or'),
            array('id' => '7','organisatie' => 'De Graaf'),
            array('id' => '8','organisatie' => 'Strandhuisjes'),
            array('id' => '9','organisatie' => 'De Zeester En De Buren'),
            array('id' => '10','organisatie' => 'Dealer Strand'),
            array('id' => '11','organisatie' => 'Ecomare'),
            array('id' => '12','organisatie' => 'Ehbo'),
            array('id' => '13','organisatie' => 'Erik Graaf Strandhuisje'),
            array('id' => '14','organisatie' => 'Fourage'),
            array('id' => '15','organisatie' => 'Gemeente Texel'),
            array('id' => '16','organisatie' => 'Hobie Cat Holland'),
            array('id' => '17','organisatie' => 'Holkema Groep'),
            array('id' => '18','organisatie' => 'Holland Safe'),
            array('id' => '19','organisatie' => 'Hoogheemraadschap Noord-Holland'),
            array('id' => '20','organisatie' => 'Horstocht'),
            array('id' => '21','organisatie' => 'Hotel De Zwaluw'),
            array('id' => '22','organisatie' => 'Informatie'),
            array('id' => '23','organisatie' => 'Inschrijving'),
            array('id' => '24','organisatie' => 'Link In Media'),
            array('id' => '25','organisatie' => 'Mondriaan'),
            array('id' => '26','organisatie' => 'Muziek & Entertainment'),
            array('id' => '27','organisatie' => 'Paal17Events'),
            array('id' => '28','organisatie' => 'Pers'),
            array('id' => '29','organisatie' => 'Politie'),
            array('id' => '30','organisatie' => 'Pr'),
            array('id' => '31','organisatie' => 'Prominenten'),
            array('id' => '32','organisatie' => 'Pwn'),
            array('id' => '33','organisatie' => 'Raad Van Advies'),
            array('id' => '34','organisatie' => 'Radio 3 Fm'),
            array('id' => '35','organisatie' => 'Radio Texel'),
            array('id' => '36','organisatie' => 'Relatiebeheer Relatiebeheer'),
            array('id' => '37','organisatie' => 'Repeat'),
            array('id' => '38','organisatie' => 'Rijkswaterstaat'),
            array('id' => '39','organisatie' => 'Rot. Bv'),
            array('id' => '40','organisatie' => 'Secretariaat'),
            array('id' => '41','organisatie' => 'Shoptiek'),
            array('id' => '42','organisatie' => 'Sponsors'),
            array('id' => '43','organisatie' => 'Staatsbos Beheer'),
            array('id' => '44','organisatie' => 'Stiehl'),
            array('id' => '45','organisatie' => 'Strand'),
            array('id' => '46','organisatie' => 'Strand Dealers'),
            array('id' => '47','organisatie' => 'Strand Paviljoen'),
            array('id' => '49','organisatie' => 'Surfers'),
            array('id' => '50','organisatie' => 'Teambuilding Texel'),
            array('id' => '51','organisatie' => 'Tent'),
            array('id' => '52','organisatie' => 'Tng'),
            array('id' => '53','organisatie' => 'Transport'),
            array('id' => '54','organisatie' => 'Ulteam'),
            array('id' => '55','organisatie' => 'Veiligheid'),
            array('id' => '56','organisatie' => 'Veiling'),
            array('id' => '57','organisatie' => 'Watersport Scheveningen'),
            array('id' => '58','organisatie' => 'Wedstrijd'),
            array('id' => '59','organisatie' => 'Zandbank'),
            array('id' => '60','organisatie' => 'Zeilmakerij Texel'),
            array('id' => '61','organisatie' => 'Zwitserleven')
        );

        foreach ($organisaties as $organisatie) {
            $o = new Organisatie();
            $o->setOrganisatie($organisatie['organisatie']);
            $manager->persist($o);
            $this->addReference('organisatie-' . $organisatie['organisatie'], $o);
        }

        $manager->flush();
    }
}