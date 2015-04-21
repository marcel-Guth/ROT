<?php

namespace ROT\Bundle\IISBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use ROT\Bundle\IISBundle\Entity\Deelname;
use ROT\Bundle\IISBundle\Entity\Deelnemer;
use ROT\Bundle\IISBundle\Entity\Fokkemaat;
use ROT\Bundle\IISBundle\Entity\Stuurman;

class LoadDeelname extends AbstractFixture implements DependentFixtureInterface {
    public function load(ObjectManager $manager) {
        // Deelname 1
    /*    $deelname = new Deelname();
        $deelname->setNederlands(true);
        $deelname->setReserveringscode(uniqid('RES-CODE-'));
        $deelname->setZeilnummer(rand(0, 16));
        $deelname->setBoot($this->getReference('boot-Wildcat Lynx'));

        $stuurman = new Stuurman();

        $deelnemer = new Deelnemer();
        $deelnemer->setVoornaam('Jan');
        $deelnemer->setAchternaam('Janssen');
        $deelnemer->setAdres('Dorpsstraat');
        $deelnemer->setHuisnummer('1');
        $deelnemer->setPostcode('2252EU');
        $deelnemer->setWoonplaats('Ons Dorp');
        $deelnemer->setLand('Nederland');
        $deelnemer->setGeslacht('M');
        $deelnemer->setNoodtelefoon('06115522321');
        $deelnemer->setGeboortedatum(new \DateTime('1983-2-12'));
        $deelnemer->setNationaliteit($this->getReference('nationaliteit-Netherlands'));
        $deelnemer->setEmail('jan.janssen@onsmail.nl');
        $stuurman->setDeelnemer($deelnemer);
        $deelname->setStuurman($stuurman);

        $manager->persist($deelname);

        // Deelname 2
        $deelname = new Deelname();
        $deelname->setNederlands(false);
        $deelname->setReserveringscode(uniqid('RES-CODE-'));
        $deelname->setZeilnummer(rand(0,16));
        $deelname->setBoot($this->getReference('boot-Wildcat Lynx'));
        $deelname->setModrating(200);

        $stuurman = new Stuurman();

        $deelnemer = new Deelnemer();
        $deelnemer->setVoornaam('Harry');
        $deelnemer->setTussenvoegsel('de');
        $deelnemer->setAchternaam('Vries');
        $deelnemer->setAdres('Lange Poten');
        $deelnemer->setHuisnummer('65A');
        $deelnemer->setPostcode('2252EX');
        $deelnemer->setWoonplaats('Rotterdahm');
        $deelnemer->setLand('Nederland');
        $deelnemer->setGeslacht('M');
        $deelnemer->setNoodtelefoon('06115522621');
        $deelnemer->setGeboortedatum(new \DateTime('1982-1-9'));
        $deelnemer->setNationaliteit($this->getReference('nationaliteit-Netherlands'));
        $deelnemer->setEmail('harry.de@vriesmail.nl');
        $stuurman->setDeelnemer($deelnemer);
        $deelname->setStuurman($stuurman);

        $fokkemaat = new Fokkemaat();

        $deelnemer = new Deelnemer();
        $deelnemer->setVoornaam('Els');
        $deelnemer->setAchternaam('de Vries');
        $deelnemer->setAdres('Lange Poten');
        $deelnemer->setHuisnummer('64');
        $deelnemer->setPostcode('2252EX');
        $deelnemer->setWoonplaats('De Hahg');
        $deelnemer->setLand('Nederland');
        $deelnemer->setGeslacht('V');
        $deelnemer->setNoodtelefoon('06115522221');
        $deelnemer->setGeboortedatum(new \DateTime('1985-2-12'));
        $deelnemer->setNationaliteit($this->getReference('nationaliteit-Netherlands'));
        $deelnemer->setEmail('jan.janssen@onsmail.nl');
        $fokkemaat->setDeelnemer($deelnemer);

        $deelname->setFokkemaat($fokkemaat);

        $manager->persist($deelname);

        // Deelname 3
        $deelname = new Deelname();
        $deelname->setNederlands(true);
        $deelname->setReserveringscode(uniqid('RES-CODE-'));
        $deelname->setZeilnummer(rand(0, 16));
        $deelname->setBoot($this->getReference('boot-Wildcat Lynx'));
        $deelname->setSpinnaker(true);

        $stuurman = new Stuurman();

        $deelnemer = new Deelnemer();
        $deelnemer->setVoornaam('Piet');
        $deelnemer->setAchternaam('Janssen');
        $deelnemer->setAdres('Dorpssssstraat');
        $deelnemer->setHuisnummer('8');
        $deelnemer->setPostcode('2252EU');
        $deelnemer->setWoonplaats('Ons Dorp');
        $deelnemer->setLand('Nederland');
        $deelnemer->setGeslacht('M');
        $deelnemer->setNoodtelefoon('06115522321');
        $deelnemer->setGeboortedatum(new \DateTime('1983-2-12'));
        $deelnemer->setNationaliteit($this->getReference('nationaliteit-Netherlands'));
        $deelnemer->setEmail('jan.janssen@onsmail.nl');
        $stuurman->setDeelnemer($deelnemer);
        $deelname->setStuurman($stuurman);

        $manager->persist($deelname);*/

        //Test echte Deelname 1
        $deelname = new Deelname();
        $deelname->setNederlands(true);
        $deelname->setReserveringscode(uniqid('RES-CODE-TEST-DATA'));
        $deelname->setZeilnummer('23');
        $deelname->setStartnummer('1');
        $deelname->setBoot($this->getReference('boot-nacra F20 carbon'));

        $deelname->setMeetbrief(false);
        $deelname->setMeetbriefnummer('');
        $deelname->setPersoonlijkereclamelicentie(true);
        $deelname->setPersoonlijkereclamelicentienummer('');
        $deelname->setReclame(true);
        $deelname->setSpinnaker(true);
        $deelname->setVereniging($this->getReference('vereniging-Catver. HELLECAT'));

        $stuurman = new Stuurman();

        $deelnemer = new Deelnemer();
        $deelnemer->setVoornaam('Xander');
        $deelnemer->setTussenvoegsel('');
        $deelnemer->setAchternaam('Pols');
        $deelnemer->setAdres('Lamsrustlaan');
        $deelnemer->setHuisnummer('189');
        $deelnemer->setPostcode('3054VG');
        $deelnemer->setWoonplaats('Rotterdam');
        $deelnemer->setLand('Nederland');
        $deelnemer->setGeslacht('M');
        $deelnemer->setTelefoon('0655703176');
        $deelnemer->setNoodtelefoon('0652620082');
        $deelnemer->setGeboortedatum(new \DateTime('1973-5-4')); //YYY-MM-DD
        $deelnemer->setNationaliteit($this->getReference('nationaliteit-Netherlands'));
        $deelnemer->setEmail('x.pols@citylens.nl');
        $stuurman->setDeelnemer($deelnemer);
        $stuurman->setStartlicentie(true);
        $stuurman->setStartlicentienummer('4097562');
        $deelname->setStuurman($stuurman);

        $fokkemaat = new Fokkemaat();

        $deelnemer = new Deelnemer();
        $deelnemer->setVoornaam('Stefan');
        $deelnemer->setTussenvoegsel('');
        $deelnemer->setAchternaam('Dubbeldam');
        $deelnemer->setAdres('Plantinkaai');
        $deelnemer->setHuisnummer('24-4');
        $deelnemer->setPostcode('2000');
        $deelnemer->setWoonplaats('Antwerpen');
        $deelnemer->setLand('Belgie');
        $deelnemer->setGeslacht('M');
        $deelnemer->setTelefoon('0032470257463');
        $deelnemer->setNoodtelefoon('0652620082');
        $deelnemer->setGeboortedatum(new \DateTime('1987-9-21'));
        $deelnemer->setNationaliteit($this->getReference('nationaliteit-Netherlands'));
        $deelnemer->setEmail('stefandubbeldam@gmail.com');
        $fokkemaat->setDeelnemer($deelnemer);
        $fokkemaat->setBemanningslicentie(false);
        $fokkemaat->setBemanningslicentienummer('00000');

        $deelname->setFokkemaat($fokkemaat);

        $manager->persist($deelname);

        //Test echte Deelname 2
        $deelname = new Deelname();
        $deelname->setNederlands(true);
        $deelname->setReserveringscode(uniqid('RES-CODE-TEST-DATA'));
        $deelname->setZeilnummer('NED 004');
        $deelname->setStartnummer('002');
        $deelname->setBoot($this->getReference('boot-nacra 17 (2)'));
        $deelname->setVereniging($this->getReference('vereniging-Catver. CAT-POINT'));

        $deelname->setMeetbrief(false);
        $deelname->setMeetbriefnummer('');
        $deelname->setPersoonlijkereclamelicentie(false);
        $deelname->setPersoonlijkereclamelicentienummer('');
        $deelname->setReclame(false);
        $deelname->setSpinnaker(true);

        $stuurman = new Stuurman();

        $deelnemer = new Deelnemer();
        $deelnemer->setVoornaam('Gunnar');
        $deelnemer->setTussenvoegsel('');
        $deelnemer->setAchternaam('Larsen');
        $deelnemer->setAdres('Hellingweg');
        $deelnemer->setHuisnummer('110-116');
        $deelnemer->setPostcode('2583DX');
        $deelnemer->setWoonplaats('Den Haag');
        $deelnemer->setLand('Nederland');
        $deelnemer->setGeslacht('M');
        $deelnemer->setNoodtelefoon('0622234222');
        $deelnemer->setGeboortedatum(new \DateTime('1975-8-28')); //YYY-MM-DD
        $deelnemer->setNationaliteit($this->getReference('nationaliteit-Netherlands'));
        $deelnemer->setEmail('gunnar@narcrasailing.com');
        $stuurman->setDeelnemer($deelnemer);
        $deelname->setStuurman($stuurman);

        $fokkemaat = new Fokkemaat();

        $deelnemer = new Deelnemer();
        $deelnemer->setVoornaam('Dorian');
        $deelnemer->setTussenvoegsel('van');
        $deelnemer->setAchternaam('Rijsselberghe');
        $deelnemer->setAdres('-');
        $deelnemer->setHuisnummer('-');
        $deelnemer->setPostcode('-');
        $deelnemer->setWoonplaats('-');
        $deelnemer->setLand('Nederland');
        $deelnemer->setGeslacht('-');
        $deelnemer->setNoodtelefoon('-');
        $deelnemer->setGeboortedatum(new \DateTime('1988-11-24'));
        $deelnemer->setNationaliteit($this->getReference('nationaliteit-Texel'));
        $deelnemer->setEmail('dorian@texelemail.nl');
        $fokkemaat->setDeelnemer($deelnemer);

        $deelname->setFokkemaat($fokkemaat);

        $manager->persist($deelname);

        //Test echte Deelname 3
        $deelname = new Deelname();
        $deelname->setNederlands(true);
        $deelname->setReserveringscode(uniqid('RES-CODE-TEST-DATA'));
        $deelname->setZeilnummer('NED 46');
        $deelname->setStartnummer('003');
        $deelname->setBoot($this->getReference('boot-nacra 17 (2)'));
        $deelname->setVereniging($this->getReference('vereniging-**Overig/Other**'));

        $deelname->setMeetbrief(true);
        $deelname->setMeetbriefnummer('');
        $deelname->setPersoonlijkereclamelicentie(true);
        $deelname->setPersoonlijkereclamelicentienummer('');
        $deelname->setReclame(true);
        $deelname->setSpinnaker(true);

        $stuurman = new Stuurman();

        $deelnemer = new Deelnemer();
        $deelnemer->setVoornaam('Elke');
        $deelnemer->setTussenvoegsel('');
        $deelnemer->setAchternaam('Delnooz');
        $deelnemer->setAdres('Postbus');
        $deelnemer->setHuisnummer('2658');
        $deelnemer->setPostcode('3430GB');
        $deelnemer->setWoonplaats('Nieuwegein');
        $deelnemer->setLand('Nederland');
        $deelnemer->setGeslacht('V');
        $deelnemer->setNoodtelefoon('0621505534');
        $deelnemer->setGeboortedatum(new \DateTime('1980-9-5')); //YYY-MM-DD
        $deelnemer->setNationaliteit($this->getReference('nationaliteit-Netherlands'));
        $deelnemer->setEmail('maike.willems@watersporstverbond.nl');
        $stuurman->setDeelnemer($deelnemer);
        $deelname->setStuurman($stuurman);

        $fokkemaat = new Fokkemaat();

        $deelnemer = new Deelnemer();
        $deelnemer->setVoornaam('Coen');
        $deelnemer->setTussenvoegsel('de');
        $deelnemer->setAchternaam('Koning');
        $deelnemer->setAdres('Postbus');
        $deelnemer->setHuisnummer('2658');
        $deelnemer->setPostcode('3430GB');
        $deelnemer->setWoonplaats('Nieuwegein');
        $deelnemer->setLand('Nederland');
        $deelnemer->setGeslacht('M');
        $deelnemer->setNoodtelefoon('0621505534');
        $deelnemer->setGeboortedatum(new \DateTime('1983-4-5'));
        $deelnemer->setNationaliteit($this->getReference('nationaliteit-Netherlands'));
        $deelnemer->setEmail('maike.willems@watersportverbond.nl');
        $fokkemaat->setDeelnemer($deelnemer);

        $deelname->setFokkemaat($fokkemaat);

        $manager->persist($deelname);

        //Test echte Deelname 4
        $deelname = new Deelname();
        $deelname->setNederlands(true);
        $deelname->setReserveringscode(uniqid('RES-CODE-TEST-DATA'));
        $deelname->setZeilnummer('NED 44');
        $deelname->setStartnummer('004');
        $deelname->setBoot($this->getReference('boot-nacra 17 (2)'));

        $deelname->setMeetbrief(true);
        $deelname->setMeetbriefnummer('');
        $deelname->setPersoonlijkereclamelicentie(true);
        $deelname->setPersoonlijkereclamelicentienummer('');
        $deelname->setReclame(true);
        $deelname->setSpinnaker(true);
        $deelname->setVereniging($this->getReference('vereniging-**Overig/Other**'));

        $stuurman = new Stuurman();

        $deelnemer = new Deelnemer();
        $deelnemer->setVoornaam('Renee');
        $deelnemer->setTussenvoegsel('');
        $deelnemer->setAchternaam('Groeneveld');
        $deelnemer->setAdres('Postbus');
        $deelnemer->setHuisnummer('2658');
        $deelnemer->setPostcode('3430 GB');
        $deelnemer->setWoonplaats('Nieuwegein');
        $deelnemer->setLand('Nederland');
        $deelnemer->setGeslacht('V');
        $deelnemer->setNoodtelefoon('0621505534');
        $deelnemer->setGeboortedatum(new \DateTime('1986-9-21')); //YYY-MM-DD
        $deelnemer->setNationaliteit($this->getReference('nationaliteit-Netherlands'));
        $deelnemer->setEmail('maike.willems@watersportverbond.nl');
        $stuurman->setDeelnemer($deelnemer);
        $deelname->setStuurman($stuurman);

        $fokkemaat = new Fokkemaat();

        $deelnemer = new Deelnemer();
        $deelnemer->setVoornaam('Thijs');
        $deelnemer->setTussenvoegsel('');
        $deelnemer->setAchternaam('Visser');
        $deelnemer->setAdres('Postbus');
        $deelnemer->setHuisnummer('2658');
        $deelnemer->setPostcode('3430 GB');
        $deelnemer->setWoonplaats('Nieuwegein');
        $deelnemer->setLand('Nederland');
        $deelnemer->setGeslacht('M');
        $deelnemer->setNoodtelefoon('0653682031');
        $deelnemer->setGeboortedatum(new \DateTime('1987-10-19'));
        $deelnemer->setNationaliteit($this->getReference('nationaliteit-Netherlands'));
        $deelnemer->setEmail('maike.willems@watersportverbond.nl');
        $fokkemaat->setDeelnemer($deelnemer);

        $deelname->setFokkemaat($fokkemaat);

        $manager->persist($deelname);

        //Test echte Deelname 5
        $deelname = new Deelname();
        $deelname->setNederlands(true);
        $deelname->setReserveringscode(uniqid('RES-CODE-TEST-DATA'));
        $deelname->setZeilnummer('NED 1');
        $deelname->setStartnummer('006');
        $deelname->setBoot($this->getReference('boot-C2'));

        $deelname->setMeetbrief(true);
        $deelname->setMeetbriefnummer('');
        $deelname->setPersoonlijkereclamelicentie(false);
        $deelname->setPersoonlijkereclamelicentienummer('');
        $deelname->setReclame(false);
        $deelname->setSpinnaker(true);
        $deelname->setVereniging($this->getReference('vereniging-ZV De Roerkoning'));

        $stuurman = new Stuurman();

        $deelnemer = new Deelnemer();
        $deelnemer->setVoornaam('Willem');
        $deelnemer->setTussenvoegsel('');
        $deelnemer->setAchternaam('Geijssen');
        $deelnemer->setAdres('Multatuliweg');
        $deelnemer->setHuisnummer('24');
        $deelnemer->setPostcode('1321EB');
        $deelnemer->setWoonplaats('Almere');
        $deelnemer->setLand('Nederland');
        $deelnemer->setGeslacht('M');
        $deelnemer->setNoodtelefoon('0628300099');
        $deelnemer->setGeboortedatum(new \DateTime('1972-1-24')); //YYY-MM-DD
        $deelnemer->setNationaliteit($this->getReference('nationaliteit-Netherlands'));
        $deelnemer->setEmail('willemenmaureen@hotmail.com');
        $stuurman->setDeelnemer($deelnemer);
        $deelname->setStuurman($stuurman);

        $fokkemaat = new Fokkemaat();

        $deelnemer = new Deelnemer();
        $deelnemer->setVoornaam('Celine');
        $deelnemer->setTussenvoegsel('van');
        $deelnemer->setAchternaam('Dooren');
        $deelnemer->setAdres('Multatuliweg');
        $deelnemer->setHuisnummer('24');
        $deelnemer->setPostcode('1321 EB');
        $deelnemer->setWoonplaats('Almere');
        $deelnemer->setLand('Nederland');
        $deelnemer->setGeslacht('V');
        $deelnemer->setNoodtelefoon('0628300099');
        $deelnemer->setGeboortedatum(new \DateTime('1989-8-4'));
        $deelnemer->setNationaliteit($this->getReference('nationaliteit-Netherlands'));
        $deelnemer->setEmail('test@test.nl');
        $fokkemaat->setDeelnemer($deelnemer);

        $deelname->setFokkemaat($fokkemaat);

        $manager->persist($deelname);

        //Test echte Deelname 6
        $deelname = new Deelname();
        $deelname->setNederlands(true);
        $deelname->setReserveringscode(uniqid('RES-CODE-TEST-DATA'));
        $deelname->setZeilnummer('NED 007');
        $deelname->setStartnummer('007');
        $deelname->setBoot($this->getReference('boot-cirrus R'));

        $deelname->setMeetbrief(false);
        $deelname->setMeetbriefnummer('');
        $deelname->setPersoonlijkereclamelicentie(true);
        $deelname->setPersoonlijkereclamelicentienummer('');
        $deelname->setReclame(true);
        $deelname->setSpinnaker(true) ;
        $deelname->setVereniging($this->getReference('vereniging-**Overig/Other**'));

        $stuurman = new Stuurman();

        $deelnemer = new Deelnemer();
        $deelnemer->setVoornaam('Mischa');
        $deelnemer->setTussenvoegsel('');
        $deelnemer->setAchternaam('Heemskerk');
        $deelnemer->setAdres('Kerkstraat');
        $deelnemer->setHuisnummer('88');
        $deelnemer->setPostcode('2377 BA');
        $deelnemer->setWoonplaats('Oude Wetering');
        $deelnemer->setLand('Nederland');
        $deelnemer->setGeslacht('M');
        $deelnemer->setNoodtelefoon('0252213883');
        $deelnemer->setGeboortedatum(new \DateTime('1974-3-13')); //YYY-MM-DD
        $deelnemer->setNationaliteit($this->getReference('nationaliteit-Netherlands'));
        $deelnemer->setEmail('mischa.heemskerk@gmail.com');
        $stuurman->setDeelnemer($deelnemer);
        $deelname->setStuurman($stuurman);

        $fokkemaat = new Fokkemaat();

        $deelnemer = new Deelnemer();
        $deelnemer->setVoornaam('Bastiaan');
        $deelnemer->setAchternaam('Tentij');
        $deelnemer->setAdres('Kerkstraat');
        $deelnemer->setHuisnummer('88');
        $deelnemer->setPostcode('2377BA');
        $deelnemer->setWoonplaats('Oude Wetering');
        $deelnemer->setLand('Nederland');
        $deelnemer->setGeslacht('M');
        $deelnemer->setNoodtelefoon('0252213883');
        $deelnemer->setGeboortedatum(new \DateTime('1988-2-19'));
        $deelnemer->setNationaliteit($this->getReference('nationaliteit-Netherlands'));
        $deelnemer->setEmail('bastiaan.tentij@yahoo.com');
        $fokkemaat->setDeelnemer($deelnemer);

        $deelname->setFokkemaat($fokkemaat);

        $manager->persist($deelname);


        //Test echte Deelname 7
        $deelname = new Deelname();
        $deelname->setNederlands(true);
        $deelname->setReserveringscode(uniqid('RES-CODE-TEST-DATA'));
        $deelname->setZeilnummer('NED 2010');
        $deelname->setStartnummer('009');
        $deelname->setBoot($this->getReference('boot-nacra infusion'));

        $deelname->setMeetbrief(true);
        $deelname->setMeetbriefnummer('0000');
        $deelname->setPersoonlijkereclamelicentie(true);
        $deelname->setPersoonlijkereclamelicentienummer('0000');
        $deelname->setReclame(true);
        $deelname->setSponsor(false);
        $deelname->setSpinnaker(true);
        $deelname->setVereniging($this->getReference('vereniging-Catver. CAT-POINT'));

        $stuurman = new Stuurman();

        $deelnemer = new Deelnemer();
        $deelnemer->setVoornaam('Jorden');
        $deelnemer->setTussenvoegsel('');
        $deelnemer->setAchternaam('Veenman');
        $deelnemer->setAdres('Delftweg');
        $deelnemer->setHuisnummer('32A');
        $deelnemer->setPostcode('3043CG');
        $deelnemer->setWoonplaats('Rotterdam');
        $deelnemer->setLand('Nederland');
        $deelnemer->setGeslacht('M');
        $deelnemer->setTelefoon('0613937076');
        $deelnemer->setNoodtelefoon('0642649580');
        $deelnemer->setGeboortedatum(new \DateTime('1985-3-28')); //YYY-MM-DD
        $deelnemer->setNationaliteit($this->getReference('nationaliteit-Netherlands'));
        $deelnemer->setEmail('jveenman@hotmail.com');
        $stuurman->setDeelnemer($deelnemer);
        $stuurman->setStartlicentie('1');
        $stuurman->setStartlicentienummer('4073500');
        $deelname->setStuurman($stuurman);

        $fokkemaat = new Fokkemaat();

        $deelnemer = new Deelnemer();
        $deelnemer->setVoornaam('Frank');
        $deelnemer->setTussenvoegsel('de');
        $deelnemer->setAchternaam('Waard');
        $deelnemer->setAdres('Ravelplantsoen');
        $deelnemer->setHuisnummer('23');
        $deelnemer->setPostcode('2942ER');
        $deelnemer->setWoonplaats('Barendrecht');
        $deelnemer->setLand('Nederland');
        $deelnemer->setGeslacht('M');
        $deelnemer->setTelefoon('');
        $deelnemer->setNoodtelefoon('0105115249');
        $deelnemer->setGeboortedatum(new \DateTime('1988-2-17'));
        $deelnemer->setNationaliteit($this->getReference('nationaliteit-Netherlands'));
        $deelnemer->setEmail('');
        $fokkemaat->setDeelnemer($deelnemer);
        $fokkemaat->setBemanningslicentie('1');
        $fokkemaat->setBemanningslicentienummer('0000');

        $deelname->setFokkemaat($fokkemaat);

        $manager->persist($deelname);

        //Test echte Deelname 8
        $deelname = new Deelname();
        $deelname->setNederlands(true);
        $deelname->setReserveringscode(uniqid('RES-CODE-TEST-DATA'));
        $deelname->setZeilnummer('GBR 1');
        $deelname->setStartnummer('10');
        $deelname->setBoot($this->getReference('boot-M20 Vampire'));

        $deelname->setMeetbrief('0');
        $deelname->setMeetbriefnummer('');
        $deelname->setPersoonlijkereclamelicentie('0');
        $deelname->setPersoonlijkereclamelicentienummer('0');
        $deelname->setReclame('0');
        $deelname->setSponsor('0');
        $deelname->setSpinnaker('1');
        $deelname->setVereniging($this->getReference('vereniging-**Overig/Other**'));

        $stuurman = new Stuurman();

        $deelnemer = new Deelnemer();
        $deelnemer->setVoornaam('William');
        $deelnemer->setTussenvoegsel('');
        $deelnemer->setAchternaam('Sunnucks');
        $deelnemer->setAdres('East Gores Farm');
        $deelnemer->setHuisnummer('Salmons Lane');
        $deelnemer->setPostcode('CO61RZ');
        $deelnemer->setWoonplaats('Coggeshall');
        $deelnemer->setLand('United Kingdom');
        $deelnemer->setGeslacht('M');
        $deelnemer->setTelefoon('00447771940763');
        $deelnemer->setNoodtelefoon('00441376561352');
        $deelnemer->setGeboortedatum(new \DateTime('1956-8-2')); //YYY-MM-DD
        $deelnemer->setNationaliteit($this->getReference('nationaliteit-United Kingdom'));
        $deelnemer->setEmail('william@sunnucks.co.uk');
        $stuurman->setDeelnemer($deelnemer);
        $stuurman->setStartlicentie('0');
        $stuurman->setStartlicentienummer('');
        $deelname->setStuurman($stuurman);

        $fokkemaat = new Fokkemaat();

        $deelnemer = new Deelnemer();
        $deelnemer->setVoornaam('Andrew');
        $deelnemer->setTussenvoegsel('');
        $deelnemer->setAchternaam('Sinclair');
        $deelnemer->setAdres('10 Brownlow Gardens');
        $deelnemer->setHuisnummer('10');
        $deelnemer->setPostcode('SO19 7B2');
        $deelnemer->setWoonplaats('Southampton');
        $deelnemer->setLand('United Kingdom');
        $deelnemer->setGeslacht('M');
        $deelnemer->setTelefoon('07502303459');
        $deelnemer->setNoodtelefoon('01376561352');
        $deelnemer->setGeboortedatum(new \DateTime('1993-2-23'));
        $deelnemer->setNationaliteit($this->getReference('nationaliteit-United Kingdom'));
        $deelnemer->setEmail('william@sunnucks.co.uk');
        $fokkemaat->setDeelnemer($deelnemer);
        $fokkemaat->setBemanningslicentie('0');
        $fokkemaat->setBemanningslicentienummer('');

        $deelname->setFokkemaat($fokkemaat);

        $manager->persist($deelname);

        //Test echte Deelname 9
        $deelname = new Deelname();
        $deelname->setNederlands(true);
        $deelname->setReserveringscode(uniqid('RES-CODE-TEST-DATA'));
        $deelname->setZeilnummer('88');
        $deelname->setStartnummer('11');
        $deelname->setBoot($this->getReference('boot-nacra F20 carbon'));

        $deelname->setMeetbrief('0');
        $deelname->setMeetbriefnummer('');
        $deelname->setPersoonlijkereclamelicentie('0');
        $deelname->setPersoonlijkereclamelicentienummer('');
        $deelname->setReclame('1');
        $deelname->setSponsor('0');
        $deelname->setSpinnaker('1');
        $deelname->setVereniging($this->getReference('vereniging-Catver. HELLECAT'));

        $stuurman = new Stuurman();

        $deelnemer = new Deelnemer();
        $deelnemer->setVoornaam('Alex');
        $deelnemer->setTussenvoegsel('');
        $deelnemer->setAchternaam('Noordstrand');
        $deelnemer->setAdres('Kazernestraat');
        $deelnemer->setHuisnummer('48G');
        $deelnemer->setPostcode('2514CV');
        $deelnemer->setWoonplaats('Den Haag');
        $deelnemer->setLand('Nederland');
        $deelnemer->setGeslacht('M');
        $deelnemer->setTelefoon('0612397559');
        $deelnemer->setNoodtelefoon('0629591531');
        $deelnemer->setGeboortedatum(new \DateTime('1988-12-14')); //YYY-MM-DD
        $deelnemer->setNationaliteit($this->getReference('nationaliteit-Netherlands'));
        $deelnemer->setEmail('alexnoordstrand@gmail.com');
        $stuurman->setDeelnemer($deelnemer);
        $stuurman->setStartlicentie('1');
        $stuurman->setStartlicentienummer('4064159');
        $deelname->setStuurman($stuurman);

        $fokkemaat = new Fokkemaat();

        $deelnemer = new Deelnemer();
        $deelnemer->setVoornaam('Oscar');
        $deelnemer->setTussenvoegsel('');
        $deelnemer->setAchternaam('Eelkman Rooda');
        $deelnemer->setAdres('Blaak');
        $deelnemer->setHuisnummer('656');
        $deelnemer->setPostcode('3011TA');
        $deelnemer->setWoonplaats('Rotterdam');
        $deelnemer->setLand('Nederland');
        $deelnemer->setGeslacht('M');
        $deelnemer->setTelefoon('0628419412');
        $deelnemer->setNoodtelefoon('0644290286');
        $deelnemer->setGeboortedatum(new \DateTime('1988-10-3'));
        $deelnemer->setNationaliteit($this->getReference('nationaliteit-Netherlands'));
        $deelnemer->setEmail('oscareelkmanrooda@hotmail.com');
        $fokkemaat->setDeelnemer($deelnemer);
        $fokkemaat->setBemanningslicentie('0');
        $fokkemaat->setBemanningslicentienummer('');

        $deelname->setFokkemaat($fokkemaat);

        $manager->persist($deelname);

        //Test echte Deelname 10
        $deelname = new Deelname();
        $deelname->setNederlands(true);
        $deelname->setReserveringscode(uniqid('RES-CODE-TEST-DATA'));
        $deelname->setZeilnummer('NED 5');
        $deelname->setStartnummer('12');
        $deelname->setBoot($this->getReference('boot-nacra F20 carbon'));

        $deelname->setMeetbrief('0');
        $deelname->setMeetbriefnummer('');
        $deelname->setPersoonlijkereclamelicentie('0');
        $deelname->setPersoonlijkereclamelicentienummer('');
        $deelname->setReclame('1');
        $deelname->setSponsor('0');
        $deelname->setSpinnaker('1');
        $deelname->setVereniging($this->getReference('vereniging-Hoekse WsV'));

        $stuurman = new Stuurman();

        $deelnemer = new Deelnemer();
        $deelnemer->setVoornaam('Peter');
        $deelnemer->setTussenvoegsel('');
        $deelnemer->setAchternaam('Vinnk');
        $deelnemer->setAdres('Schelpweg');
        $deelnemer->setHuisnummer('74');
        $deelnemer->setPostcode('3151 VJ');
        $deelnemer->setWoonplaats('Hoek van Holland');
        $deelnemer->setLand('Nederland');
        $deelnemer->setGeslacht('M');
        $deelnemer->setTelefoon('0654772656');
        $deelnemer->setNoodtelefoon('0174385262');
        $deelnemer->setGeboortedatum(new \DateTime('1965-3-4')); //YYY-MM-DD
        $deelnemer->setNationaliteit($this->getReference('nationaliteit-Netherlands'));
        $deelnemer->setEmail('peter@performancesails.com');
        $stuurman->setDeelnemer($deelnemer);
        $stuurman->setStartlicentie('1');
        $stuurman->setStartlicentienummer('ter plekke');
        $deelname->setStuurman($stuurman);

        $fokkemaat = new Fokkemaat();

        $deelnemer = new Deelnemer();
        $deelnemer->setVoornaam('Jeroen');
        $deelnemer->setTussenvoegsel('van');
        $deelnemer->setAchternaam('Leeuwen');
        $deelnemer->setAdres('Hellingweg');
        $deelnemer->setHuisnummer('110');
        $deelnemer->setPostcode('2583 DX');
        $deelnemer->setWoonplaats('\'s-Gravenhage');
        $deelnemer->setLand('Nederland');
        $deelnemer->setGeslacht('M');
        $deelnemer->setTelefoon('0000000000');
        $deelnemer->setNoodtelefoon('0000000000');
        $deelnemer->setGeboortedatum(new \DateTime('1975-6-1'));
        $deelnemer->setNationaliteit($this->getReference('nationaliteit-Netherlands'));
        $deelnemer->setEmail('info@nacrasailing.com');
        $fokkemaat->setDeelnemer($deelnemer);
        $fokkemaat->setBemanningslicentie('0');
        $fokkemaat->setBemanningslicentienummer('ter plekke');

        $deelname->setFokkemaat($fokkemaat);

        $manager->persist($deelname);

        //Test echte Deelname 11
        $deelname = new Deelname();
        $deelname->setNederlands(true);
        $deelname->setReserveringscode(uniqid('RES-CODE-TEST-DATA'));
        $deelname->setZeilnummer('1616');
        $deelname->setStartnummer('13');
        $deelname->setBoot($this->getReference('boot-nacra infusion'));

        $deelname->setMeetbrief(true);
        $deelname->setMeetbriefnummer('00000');
        $deelname->setPersoonlijkereclamelicentie(true);
        $deelname->setPersoonlijkereclamelicentienummer('000000');
        $deelname->setReclame(true);
        $deelname->setSponsor(false);
        $deelname->setSpinnaker(true);
        $deelname->setVereniging($this->getReference('vereniging-WsV Bestevaer'));

        $stuurman = new Stuurman();

        $deelnemer = new Deelnemer();
        $deelnemer->setVoornaam('Rik');
        $deelnemer->setTussenvoegsel('');
        $deelnemer->setAchternaam('Duinmeijer');
        $deelnemer->setAdres('Heemskerkweg');
        $deelnemer->setHuisnummer('38');
        $deelnemer->setPostcode('1944GV');
        $deelnemer->setWoonplaats('Beverwijk');
        $deelnemer->setLand('Nederland');
        $deelnemer->setGeslacht('M');
        $deelnemer->setTelefoon('0653939236');
        $deelnemer->setNoodtelefoon('0621815146');
        $deelnemer->setGeboortedatum(new \DateTime('1977-7-31')); //YYY-MM-DD
        $deelnemer->setNationaliteit($this->getReference('nationaliteit-Netherlands'));
        $deelnemer->setEmail('rikenmar@casema.nl');
        $stuurman->setDeelnemer($deelnemer);
        $stuurman->setStartlicentie(true);
        $stuurman->setStartlicentienummer('4071132');
        $deelname->setStuurman($stuurman);

        $fokkemaat = new Fokkemaat();

        $deelnemer = new Deelnemer();
        $deelnemer->setVoornaam('Corstiaan');
        $deelnemer->setTussenvoegsel('');
        $deelnemer->setAchternaam('Alessie');
        $deelnemer->setAdres('Wolff En Dekenstraat');
        $deelnemer->setHuisnummer('31');
        $deelnemer->setPostcode('1947GD');
        $deelnemer->setWoonplaats('Beverwijk');
        $deelnemer->setLand('Nederland');
        $deelnemer->setGeslacht('M');
        $deelnemer->setTelefoon('0652607278');
        $deelnemer->setNoodtelefoon('0621815146');
        $deelnemer->setGeboortedatum(new \DateTime('1976-9-11'));
        $deelnemer->setNationaliteit($this->getReference('nationaliteit-Netherlands'));
        $deelnemer->setEmail('corsenhar@casema.nl');
        $fokkemaat->setDeelnemer($deelnemer);
        $fokkemaat->setBemanningslicentie(true);
        $fokkemaat->setBemanningslicentienummer('000000');

        $deelname->setFokkemaat($fokkemaat);

        $manager->persist($deelname);

        //Test echte Deelname 12
        $deelname = new Deelname();
        $deelname->setNederlands(true);
        $deelname->setReserveringscode(uniqid('RES-CODE-TEST-DATA'));
        $deelname->setZeilnummer('NED 20');
        $deelname->setStartnummer('14');
        $deelname->setBoot($this->getReference('boot-M20'));

        $deelname->setMeetbrief(false);
        $deelname->setMeetbriefnummer('');
        $deelname->setPersoonlijkereclamelicentie(true);
        $deelname->setPersoonlijkereclamelicentienummer('0000');
        $deelname->setReclame(true);
        $deelname->setSponsor(false);
        $deelname->setSpinnaker(true);
        $deelname->setVereniging($this->getReference('vereniging-ZV Noordwijk'));

        $stuurman = new Stuurman();

        $deelnemer = new Deelnemer();
        $deelnemer->setVoornaam('Maarten');
        $deelnemer->setTussenvoegsel('van');
        $deelnemer->setAchternaam('Klaveren');
        $deelnemer->setAdres('Parallel Boulevard');
        $deelnemer->setHuisnummer('150');
        $deelnemer->setPostcode('2202 HS');
        $deelnemer->setWoonplaats('Noordwijk ZH');
        $deelnemer->setLand('Nederland');
        $deelnemer->setGeslacht('M');
        $deelnemer->setTelefoon('0614477316');
        $deelnemer->setNoodtelefoon('0713616765');
        $deelnemer->setGeboortedatum(new \DateTime('1957-7-21')); //YYY-MM-DD
        $deelnemer->setNationaliteit($this->getReference('nationaliteit-Netherlands'));
        $deelnemer->setEmail('maartenvanklaveren@hyscon.nl');
        $stuurman->setDeelnemer($deelnemer);
        $stuurman->setStartlicentie(true);
        $stuurman->setStartlicentienummer('228377');
        $deelname->setStuurman($stuurman);

        $fokkemaat = new Fokkemaat();

        $deelnemer = new Deelnemer();
        $deelnemer->setVoornaam('Hans');
        $deelnemer->setTussenvoegsel('van');
        $deelnemer->setAchternaam('Klaveren');
        $deelnemer->setAdres('Quarlus Van Uffordstraat');
        $deelnemer->setHuisnummer('79');
        $deelnemer->setPostcode('2202 ND');
        $deelnemer->setWoonplaats('Noordwijk ZH');
        $deelnemer->setLand('Nederland');
        $deelnemer->setGeslacht('M');
        $deelnemer->setTelefoon('0653244596');
        $deelnemer->setNoodtelefoon('0630729105');
        $deelnemer->setGeboortedatum(new \DateTime('1959-10-1'));
        $deelnemer->setNationaliteit($this->getReference('nationaliteit-Netherlands'));
        $deelnemer->setEmail('p@p.nl');
        $fokkemaat->setDeelnemer($deelnemer);
        $fokkemaat->setBemanningslicentie(true);
        $fokkemaat->setBemanningslicentienummer('');

        $deelname->setFokkemaat($fokkemaat);

        $manager->persist($deelname);

        //Test echte Deelname 13
        $deelname = new Deelname();
        $deelname->setNederlands(true);
        $deelname->setReserveringscode(uniqid('RES-CODE-TEST-DATA'));
        $deelname->setZeilnummer('10');
        $deelname->setStartnummer('15');
        $deelname->setBoot($this->getReference('boot-**Overig/Other**'));

        $deelname->setMeetbrief(false);
        $deelname->setMeetbriefnummer('');
        $deelname->setPersoonlijkereclamelicentie(false);
        $deelname->setPersoonlijkereclamelicentienummer('');
        $deelname->setReclame(false);
        $deelname->setSpinnaker(false);
        $deelname->setVereniging($this->getReference('vereniging-Catclub BRU'));

        $stuurman = new Stuurman();

        $deelnemer = new Deelnemer();
        $deelnemer->setVoornaam('Thomas');
        $deelnemer->setTussenvoegsel('de');
        $deelnemer->setAchternaam('Jong');
        $deelnemer->setAdres('Vosmaerstraat');
        $deelnemer->setHuisnummer('18');
        $deelnemer->setPostcode('2985BT');
        $deelnemer->setWoonplaats('Ridderkerk');
        $deelnemer->setLand('Nederland');
        $deelnemer->setGeslacht('M');
        $deelnemer->setTelefoon('0620070507');
        $deelnemer->setNoodtelefoon('0622550988');
        $deelnemer->setGeboortedatum(new \DateTime('1998-5-7')); //YYY-MM-DD
        $deelnemer->setNationaliteit($this->getReference('nationaliteit-Netherlands'));
        $deelnemer->setEmail('thomasbdejong@gmail.com');
        $stuurman->setDeelnemer($deelnemer);
        $stuurman->setStartlicentie(true);
        $stuurman->setStartlicentienummer('4107483');
        $deelname->setStuurman($stuurman);

        $manager->persist($deelname);


        //Test echte Deelname 14
        $deelname = new Deelname();
        $deelname->setNederlands(true);
        $deelname->setReserveringscode(uniqid('RES-CODE-TEST-DATA'));
        $deelname->setZeilnummer('NED 15');
        $deelname->setStartnummer('17');
        $deelname->setBoot($this->getReference('boot-cirrus R'));

        $deelname->setMeetbrief(true);
        $deelname->setMeetbriefnummer('');
        $deelname->setPersoonlijkereclamelicentie(false);
        $deelname->setPersoonlijkereclamelicentienummer('');
        $deelname->setReclame(false);
        $deelname->setSpinnaker(true);
        $deelname->setVereniging($this->getReference('vereniging-ZV De Roerkoning'));

        $stuurman = new Stuurman();

        $deelnemer = new Deelnemer();
        $deelnemer->setVoornaam('Ad');
        $deelnemer->setTussenvoegsel('');
        $deelnemer->setAchternaam('Noordzij');
        $deelnemer->setAdres('Nieuwe Blaricummerweg');
        $deelnemer->setHuisnummer('2');
        $deelnemer->setPostcode('1272 RL');
        $deelnemer->setWoonplaats('Huizen');
        $deelnemer->setLand('Nederland');
        $deelnemer->setGeslacht('M');
        $deelnemer->setTelefoon('0651474079');
        $deelnemer->setNoodtelefoon('0630694768');
        $deelnemer->setGeboortedatum(new \DateTime('1964-2-18')); //YYY-MM-DD
        $deelnemer->setNationaliteit($this->getReference('nationaliteit-Netherlands'));
        $deelnemer->setEmail('adenmarion@hotmail.com');
        $stuurman->setDeelnemer($deelnemer);
        $stuurman->setStartlicentie(true);
        $stuurman->setStartlicentienummer('4043227');
        $deelname->setStuurman($stuurman);

        $fokkemaat = new Fokkemaat();

        $deelnemer = new Deelnemer();
        $deelnemer->setVoornaam('Mhj');
        $deelnemer->setTussenvoegsel('');
        $deelnemer->setAchternaam('Hillen');
        $deelnemer->setAdres('Ohmstraat');
        $deelnemer->setHuisnummer('50');
        $deelnemer->setPostcode('2561 SG');
        $deelnemer->setWoonplaats('Den Haag');
        $deelnemer->setLand('Nederland');
        $deelnemer->setGeslacht('M');
        $deelnemer->setTelefoon('0621860471');
        $deelnemer->setNoodtelefoon('0703554026');
        $deelnemer->setGeboortedatum(new \DateTime('1992-3-8'));
        $deelnemer->setNationaliteit($this->getReference('nationaliteit-Netherlands'));
        $deelnemer->setEmail('maxime.hillen@gmail.com');
        $fokkemaat->setDeelnemer($deelnemer);
        $fokkemaat->setBemanningslicentie(true);
        $fokkemaat->setBemanningslicentienummer('4073556');

        $deelname->setFokkemaat($fokkemaat);

        $manager->persist($deelname);

        //Test echte Deelname 15
        $deelname = new Deelname();
        $deelname->setNederlands(true);
        $deelname->setReserveringscode(uniqid('RES-CODE-TEST-DATA'));
        $deelname->setZeilnummer('1603');
        $deelname->setStartnummer('18');
        $deelname->setBoot($this->getReference('boot-nacra F16 (1)'));

        $deelname->setMeetbrief(false);
        $deelname->setMeetbriefnummer('');
        $deelname->setPersoonlijkereclamelicentie(false);
        $deelname->setPersoonlijkereclamelicentienummer('');
        $deelname->setReclame(true);
        $deelname->setSponsor(false);
        $deelname->setSpinnaker(true);
        $deelname->setVereniging($this->getReference('vereniging-Catver. CAT-POINT'));

        $stuurman = new Stuurman();

        $deelnemer = new Deelnemer();
        $deelnemer->setVoornaam('Alfred');
        $deelnemer->setTussenvoegsel('de');
        $deelnemer->setAchternaam('Jong');
        $deelnemer->setAdres('Vosmaerstraat');
        $deelnemer->setHuisnummer('18');
        $deelnemer->setPostcode('2985 BT');
        $deelnemer->setWoonplaats('Ridderkerk');
        $deelnemer->setLand('Nederland');
        $deelnemer->setGeslacht('M');
        $deelnemer->setTelefoon('0622550988');
        $deelnemer->setNoodtelefoon('0620070507');
        $deelnemer->setGeboortedatum(new \DateTime('1964-6-19')); //YYY-MM-DD
        $deelnemer->setNationaliteit($this->getReference('nationaliteit-Netherlands'));
        $deelnemer->setEmail('info@precision-bijscholingen.nl');
        $stuurman->setDeelnemer($deelnemer);
        $stuurman->setStartlicentie(true);
        $stuurman->setStartlicentienummer('');
        $deelname->setStuurman($stuurman);

        $fokkemaat = new Fokkemaat();

        $deelnemer = new Deelnemer();
        $deelnemer->setVoornaam('Thomas');
        $deelnemer->setTussenvoegsel('de');
        $deelnemer->setAchternaam('Jongh');
        $deelnemer->setAdres('-');
        $deelnemer->setHuisnummer('-');
        $deelnemer->setPostcode('-');
        $deelnemer->setWoonplaats('-');
        $deelnemer->setLand('-');
        $deelnemer->setGeslacht('-');
        $deelnemer->setTelefoon('-');
        $deelnemer->setNoodtelefoon('0620070507');
        $deelnemer->setGeboortedatum(new \DateTime('1998-5-7'));
        $deelnemer->setNationaliteit($this->getReference('nationaliteit-Netherlands'));
        $deelnemer->setEmail('p@p.nl');
        $fokkemaat->setDeelnemer($deelnemer);
        $fokkemaat->setBemanningslicentie(true);
        $fokkemaat->setBemanningslicentienummer('000000');

        $deelname->setFokkemaat($fokkemaat);

        $manager->persist($deelname);

        //Test echte Deelname 16
        $deelname = new Deelname();
        $deelname->setNederlands(true);
        $deelname->setReserveringscode(uniqid('RES-CODE-TEST-DATA'));
        $deelname->setZeilnummer('NED 1978');
        $deelname->setStartnummer('19');
        $deelname->setBoot($this->getReference('boot-nacra infusion'));

        $deelname->setMeetbrief(true);
        $deelname->setMeetbriefnummer('');
        $deelname->setPersoonlijkereclamelicentie(false);
        $deelname->setPersoonlijkereclamelicentienummer('');
        $deelname->setReclame(true);
        $deelname->setSpinnaker(true);
        $deelname->setVereniging($this->getReference('vereniging-**Overig/Other**'));

        $stuurman = new Stuurman();

        $deelnemer = new Deelnemer();
        $deelnemer->setVoornaam('Jolbert');
        $deelnemer->setTussenvoegsel('van');
        $deelnemer->setAchternaam('Dijk');
        $deelnemer->setAdres('Parkhaven');
        $deelnemer->setHuisnummer('58');
        $deelnemer->setPostcode('8242PK');
        $deelnemer->setWoonplaats('Lelystad');
        $deelnemer->setLand('Nederland');
        $deelnemer->setGeslacht('M');
        $deelnemer->setTelefoon('0636318597');
        $deelnemer->setNoodtelefoon('0654256918');
        $deelnemer->setGeboortedatum(new \DateTime('1993-6-3')); //YYY-MM-DD
        $deelnemer->setNationaliteit($this->getReference('nationaliteit-Netherlands'));
        $deelnemer->setEmail('n.kleijweg@gmail.com');
        $stuurman->setDeelnemer($deelnemer);
        $stuurman->setStartlicentie(true);
        $stuurman->setStartlicentienummer('');
        $deelname->setStuurman($stuurman);

        $fokkemaat = new Fokkemaat();

        $deelnemer = new Deelnemer();
        $deelnemer->setVoornaam('Niels');
        $deelnemer->setTussenvoegsel('');
        $deelnemer->setAchternaam('Kleijweg');
        $deelnemer->setAdres('Balthasar Van Der Polweg');
        $deelnemer->setHuisnummer('4');
        $deelnemer->setPostcode('2628AW');
        $deelnemer->setWoonplaats('Delft');
        $deelnemer->setLand('Nederland');
        $deelnemer->setGeslacht('M');
        $deelnemer->setTelefoon('');
        $deelnemer->setNoodtelefoon('0654256918');
        $deelnemer->setGeboortedatum(new \DateTime('1991-3-11'));
        $deelnemer->setNationaliteit($this->getReference('nationaliteit-Netherlands'));
        $deelnemer->setEmail('p@p.nl');
        $fokkemaat->setDeelnemer($deelnemer);
        $fokkemaat->setBemanningslicentie(true);
        $fokkemaat->setBemanningslicentienummer('4083949');

        $deelname->setFokkemaat($fokkemaat);

        $manager->persist($deelname);

        //Test echte Deelname 17
        $deelname = new Deelname();
        $deelname->setNederlands(true);
        $deelname->setReserveringscode(uniqid('RES-CODE-TEST-DATA'));
        $deelname->setZeilnummer('NED 2012');
        $deelname->setStartnummer('20');
        $deelname->setBoot($this->getReference('boot-nacra F16 (2)'));

        $deelname->setMeetbrief(false);
        $deelname->setMeetbriefnummer('');
        $deelname->setPersoonlijkereclamelicentie(false);
        $deelname->setPersoonlijkereclamelicentienummer('');
        $deelname->setReclame(true);
        $deelname->setSpinnaker('');
        $deelname->setVereniging($this->getReference('vereniging-WsV Braassemermeer'));

        $stuurman = new Stuurman();

        $deelnemer = new Deelnemer();
        $deelnemer->setVoornaam('Froukje');
        $deelnemer->setTussenvoegsel('');
        $deelnemer->setAchternaam('Feenstra');
        $deelnemer->setAdres('Veemarktstraat');
        $deelnemer->setHuisnummer('91A');
        $deelnemer->setPostcode('9724 GB');
        $deelnemer->setWoonplaats('Groningen');
        $deelnemer->setLand('Nederland');
        $deelnemer->setGeslacht('V');
        $deelnemer->setTelefoon('0628953366');
        $deelnemer->setNoodtelefoon('0651294475');
        $deelnemer->setGeboortedatum(new \DateTime('1993-4-28')); //YYY-MM-DD
        $deelnemer->setNationaliteit($this->getReference('nationaliteit-Netherlands'));
        $deelnemer->setEmail('froukje.feenstra@live.nl');
        $stuurman->setDeelnemer($deelnemer);
        $stuurman->setStartlicentie(true);
        $stuurman->setStartlicentienummer('4020318');
        $deelname->setStuurman($stuurman);

        $fokkemaat = new Fokkemaat();

        $deelnemer = new Deelnemer();
        $deelnemer->setVoornaam('Sanne');
        $deelnemer->setTussenvoegsel('van');
        $deelnemer->setAchternaam('Hek');
        $deelnemer->setAdres('Jan Hanzenstraat');
        $deelnemer->setHuisnummer('107');
        $deelnemer->setPostcode('1053 SN');
        $deelnemer->setWoonplaats('Amsterdam');
        $deelnemer->setLand('Nederland');
        $deelnemer->setGeslacht('V');
        $deelnemer->setTelefoon('0641043036');
        $deelnemer->setNoodtelefoon('062053988');
        $deelnemer->setGeboortedatum(new \DateTime('1983-1-14'));
        $deelnemer->setNationaliteit($this->getReference('nationaliteit-Netherlands'));
        $deelnemer->setEmail('p@p.nl');
        $fokkemaat->setDeelnemer($deelnemer);
        $fokkemaat->setBemanningslicentie(true);
        $fokkemaat->setBemanningslicentienummer('');

        $deelname->setFokkemaat($fokkemaat);

        $manager->persist($deelname);

        //Test echte Deelname 18
        $deelname = new Deelname();
        $deelname->setNederlands(true);
        $deelname->setReserveringscode(uniqid('RES-CODE-TEST-DATA'));
        $deelname->setZeilnummer('NED 1910');
        $deelname->setStartnummer('21');
        $deelname->setBoot($this->getReference('boot-nacra infusion'));

        $deelname->setMeetbrief(true);
        $deelname->setMeetbriefnummer('');
        $deelname->setPersoonlijkereclamelicentie(false);
        $deelname->setPersoonlijkereclamelicentienummer('');
        $deelname->setReclame(false);
        $deelname->setSpinnaker(true);
        $deelname->setVereniging($this->getReference('vereniging-Catver. CAT-POINT'));

        $stuurman = new Stuurman();

        $deelnemer = new Deelnemer();
        $deelnemer->setVoornaam('Mischa');
        $deelnemer->setTussenvoegsel('de');
        $deelnemer->setAchternaam('Munck');
        $deelnemer->setAdres('Jan Hanzenstraat');
        $deelnemer->setHuisnummer('107.2');
        $deelnemer->setPostcode('1053 SN');
        $deelnemer->setWoonplaats('Amsterdam');
        $deelnemer->setLand('Nederland');
        $deelnemer->setGeslacht('M');
        $deelnemer->setTelefoon('0620539878');
        $deelnemer->setNoodtelefoon('06428516861');
        $deelnemer->setGeboortedatum(new \DateTime('1987-9-2')); //YYY-MM-DD
        $deelnemer->setNationaliteit($this->getReference('nationaliteit-Netherlands'));
        $deelnemer->setEmail('mischademunck@gmail.com');
        $stuurman->setDeelnemer($deelnemer);
        $stuurman->setStartlicentie(true);
        $stuurman->setStartlicentienummer('');
        $deelname->setStuurman($stuurman);

        $fokkemaat = new Fokkemaat();

        $deelnemer = new Deelnemer();
        $deelnemer->setVoornaam('Brett');
        $deelnemer->setTussenvoegsel('');
        $deelnemer->setAchternaam('Goodal');
        $deelnemer->setAdres('Jan Hanzenstraat');
        $deelnemer->setHuisnummer('107.2');
        $deelnemer->setPostcode('1053 SN');
        $deelnemer->setWoonplaats('Amsterdam');
        $deelnemer->setLand('Nederland');
        $deelnemer->setGeslacht('M');
        $deelnemer->setTelefoon('0653714093');
        $deelnemer->setNoodtelefoon('0653714093');
        $deelnemer->setGeboortedatum(new \DateTime('1984-7-16'));
        $deelnemer->setNationaliteit($this->getReference('nationaliteit-Netherlands'));
        $deelnemer->setEmail('mischademunck@gmail.com');
        $fokkemaat->setDeelnemer($deelnemer);
        $fokkemaat->setBemanningslicentie(true);
        $fokkemaat->setBemanningslicentienummer('');

        $deelname->setFokkemaat($fokkemaat);

        $manager->persist($deelname);

        //Test echte Deelname 19
        $deelname = new Deelname();
        $deelname->setNederlands(true);
        $deelname->setReserveringscode(uniqid('RES-CODE-TEST-DATA'));
        $deelname->setZeilnummer('18');
        $deelname->setStartnummer('23');
        $deelname->setBoot($this->getReference('boot-nacra infusion'));

        $deelname->setMeetbrief(true);
        $deelname->setMeetbriefnummer('');
        $deelname->setPersoonlijkereclamelicentie(false);
        $deelname->setPersoonlijkereclamelicentienummer('');
        $deelname->setReclame(false);
        $deelname->setSpinnaker(true);
        $deelname->setVereniging($this->getReference('vereniging-Catver. CAT-POINT'));

        $stuurman = new Stuurman();

        $deelnemer = new Deelnemer();
        $deelnemer->setVoornaam('Tjiddo');
        $deelnemer->setTussenvoegsel('');
        $deelnemer->setAchternaam('Veenstra');
        $deelnemer->setAdres('Spaarne');
        $deelnemer->setHuisnummer('59C');
        $deelnemer->setPostcode('2011CE');
        $deelnemer->setWoonplaats('Haarlem');
        $deelnemer->setLand('Nederland');
        $deelnemer->setGeslacht('M');
        $deelnemer->setTelefoon('0620535388');
        $deelnemer->setNoodtelefoon('0620535388');
        $deelnemer->setGeboortedatum(new \DateTime('1978-5-14')); //YYY-MM-DD
        $deelnemer->setNationaliteit($this->getReference('nationaliteit-Netherlands'));
        $deelnemer->setEmail('tjiddoveenstra@gmail.com');
        $stuurman->setDeelnemer($deelnemer);
        $stuurman->setStartlicentie(true);
        $stuurman->setStartlicentienummer('11111');
        $deelname->setStuurman($stuurman);

        $fokkemaat = new Fokkemaat();

        $deelnemer = new Deelnemer();
        $deelnemer->setVoornaam('Diana');
        $deelnemer->setTussenvoegsel('');
        $deelnemer->setAchternaam('Bogaards');
        $deelnemer->setAdres('Spaarne');
        $deelnemer->setHuisnummer('59C');
        $deelnemer->setPostcode('2011CE');
        $deelnemer->setWoonplaats('Haarlem');
        $deelnemer->setLand('Nederland');
        $deelnemer->setGeslacht('V');
        $deelnemer->setTelefoon('0620535388');
        $deelnemer->setNoodtelefoon('0620535388');
        $deelnemer->setGeboortedatum(new \DateTime('1978-5-14'));
        $deelnemer->setNationaliteit($this->getReference('nationaliteit-Netherlands'));
        $deelnemer->setEmail('diana@diabo.nl');
        $fokkemaat->setDeelnemer($deelnemer);
        $fokkemaat->setBemanningslicentie(true);
        $fokkemaat->setBemanningslicentienummer('000000');

        $deelname->setFokkemaat($fokkemaat);

        $manager->persist($deelname);

        //Test echte Deelname 20
        $deelname = new Deelname();
        $deelname->setNederlands(true);
        $deelname->setReserveringscode(uniqid('RES-CODE-TEST-DATA'));
        $deelname->setZeilnummer('NED 5');
        $deelname->setStartnummer('24');
        $deelname->setBoot($this->getReference('boot-formule 18'));

        $deelname->setMeetbrief(true);
        $deelname->setMeetbriefnummer('12233');
        $deelname->setPersoonlijkereclamelicentie(true);
        $deelname->setPersoonlijkereclamelicentienummer('');
        $deelname->setReclame(true);
        $deelname->setSpinnaker(true);
        $deelname->setVereniging($this->getReference('vereniging-Cat Club 7.2 Hargen aan Zee'));

        $stuurman = new Stuurman();

        $deelnemer = new Deelnemer();
        $deelnemer->setVoornaam('Peter');
        $deelnemer->setTussenvoegsel('');
        $deelnemer->setAchternaam('Kloppers');
        $deelnemer->setAdres('Houttuinen Noord');
        $deelnemer->setHuisnummer('30');
        $deelnemer->setPostcode('7525RG');
        $deelnemer->setWoonplaats('Apeldoorn');
        $deelnemer->setLand('Nederland');
        $deelnemer->setGeslacht('M');
        $deelnemer->setTelefoon('0622036775');
        $deelnemer->setNoodtelefoon('0639760885');
        $deelnemer->setGeboortedatum(new \DateTime('1957-10-21')); //YYY-MM-DD
        $deelnemer->setNationaliteit($this->getReference('nationaliteit-Netherlands'));
        $deelnemer->setEmail('p.kloppers@chello.nl');
        $stuurman->setDeelnemer($deelnemer);
        $stuurman->setStartlicentie(true);
        $stuurman->setStartlicentienummer('228381');
        $deelname->setStuurman($stuurman);

        $fokkemaat = new Fokkemaat();

        $deelnemer = new Deelnemer();
        $deelnemer->setVoornaam('Tony');
        $deelnemer->setTussenvoegsel('');
        $deelnemer->setAchternaam('Mels');
        $deelnemer->setAdres('Xxxxuuuu Vvv');
        $deelnemer->setHuisnummer('10');
        $deelnemer->setPostcode('1234AX');
        $deelnemer->setWoonplaats('Hoorn');
        $deelnemer->setLand('Nederland');
        $deelnemer->setGeslacht('M');
        $deelnemer->setTelefoon('0627080539');
        $deelnemer->setNoodtelefoon('0627080539');
        $deelnemer->setGeboortedatum(new \DateTime('1967-10-10'));
        $deelnemer->setNationaliteit($this->getReference('nationaliteit-Netherlands'));
        $deelnemer->setEmail('tonymels@gmail.com');
        $fokkemaat->setDeelnemer($deelnemer);
        $fokkemaat->setBemanningslicentie(true);
        $fokkemaat->setBemanningslicentienummer('00000');

        $deelname->setFokkemaat($fokkemaat);

        $manager->persist($deelname);


        $manager->flush();
    }

    public function getDependencies() {
        return array(
            'ROT\Bundle\IISBundle\DataFixtures\ORM\LoadBoot',
            'ROT\Bundle\IISBundle\DataFixtures\ORM\LoadNationaliteit',
            'ROT\Bundle\IISBundle\DataFixtures\ORM\LoadUitzondering',
            'ROT\Bundle\IISBundle\DataFixtures\ORM\LoadVereniging'
        );
    }
}