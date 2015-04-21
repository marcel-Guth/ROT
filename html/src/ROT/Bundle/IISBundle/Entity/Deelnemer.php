<?php

namespace ROT\Bundle\IISBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\ExecutionContextInterface;
use Gedmo\Mapping\Annotation as Gedmo;
use ROT\Bundle\AdminBundle\Traits\BlameableEntity;
use ROT\Bundle\AdminBundle\Traits\TimestampableEntity;

/**
 * Deelnemer
 *
 * @ORM\Table(name="deelnemer")
 * @ORM\Entity(repositoryClass="ROT\Bundle\IISBundle\Entity\DeelnemerRepository")
 * @Assert\Callback(methods={"validateOptionals"})
 */
class Deelnemer {

    use BlameableEntity,
        TimestampableEntity;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="voornaam", type="string", length=255, nullable=false)
     * @Assert\NotBlank()
     */
    protected $voornaam;

    /**
     * @var string
     *
     * @ORM\Column(name="achternaam", type="string", length=255, nullable=false)
     * @Assert\NotBlank()
     */
    protected $achternaam;

    /**
     * @var string
     *
     * @ORM\Column(name="tussenvoegsel", type="string", length=255, nullable=true)
     */
    protected $tussenvoegsel;

    /**
     * @var string
     *
     * @ORM\Column(name="adres", type="string", length=255, nullable=false)
     * @Assert\NotBlank()
     */
    protected $adres;

    /**
     * @var string
     *
     * @ORM\Column(name="huisnummer", type="string", length=255, nullable=false)
     * @Assert\NotBlank()
     */
    protected $huisnummer;

    /**
     * @var string
     *
     * @ORM\Column(name="woonplaats", type="string", length=100, nullable=false)
     * @Assert\NotBlank()
     */
    protected $woonplaats;

    /**
     * @var string
     *
     * @ORM\Column(name="postcode", type="string", length=255, nullable=false)
     * @Assert\NotBlank()
     */
    protected $postcode;

    /**
     * @var string
     *
     * @ORM\Column(name="land", type="string", length=255, nullable=false)
     * @Assert\NotBlank()
     */
    protected $land;

    /**
     * @var string
     *
     * @ORM\Column(name="geslacht", type="string", length=1, nullable=false)
     * @Assert\NotBlank()
     * @Assert\Choice(choices={"M", "V"})
     */
    protected $geslacht;

    /**
     * @var string
     *
     * @ORM\Column(name="noodtelefoon", type="string", length=255, nullable=false)
     * @Assert\NotBlank()
     */
    protected $noodtelefoon;

    /**
     * @var string
     *
     * @ORM\Column(name="telefoon", type="string", length=255, nullable=true)
     */
    protected $telefoon;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="geboortedatum", type="date", nullable=false)
     * @Assert\NotBlank()
     * @Assert\Date()
     */
    protected $geboortedatum;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=false)
     * @Assert\NotBlank()
     * @Assert\Email()
     */
    protected $email;

    /**
     * @var \Nationaliteit
     *
     * @ORM\ManyToOne(targetEntity="Nationaliteit")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="nationaliteitid", referencedColumnName="id", nullable=false)
     * })
     * @Assert\NotBlank()
     */
    protected $nationaliteit;

    /**
     * @var string
     *
     * @ORM\Column(name="rotmember", type="boolean", nullable=true)
     */
    protected $rotmember;

    /**
     * @var string
     *
     * @ORM\Column(name="rotmembernumber", type="string", length=255, nullable=true)
     * @Assert\NotBlank(groups="rotmember")
     * @Assert\Blank(groups="geenrotmember")
     */
    protected $rotmembernumber;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set voornaam
     *
     * @param string $voornaam
     * @return Deelnemer
     */
    public function setVoornaam($voornaam) {
        $this->voornaam = $voornaam;

        return $this;
    }

    /**
     * Get voornaam
     *
     * @return string 
     */
    public function getVoornaam() {
        return $this->voornaam;
    }

    /**
     * Set achternaam
     *
     * @param string $achternaam
     * @return Deelnemer
     */
    public function setAchternaam($achternaam) {
        $this->achternaam = $achternaam;

        return $this;
    }

    /**
     * Get achternaam
     *
     * @return string 
     */
    public function getAchternaam() {
        return $this->achternaam;
    }

    /**
     * Set tussenvoegsel
     *
     * @param string $tussenvoegsel
     * @return Deelnemer
     */
    public function setTussenvoegsel($tussenvoegsel) {
        $this->tussenvoegsel = $tussenvoegsel;

        return $this;
    }

    /**
     * Get tussenvoegsel
     *
     * @return string 
     */
    public function getTussenvoegsel() {
        return $this->tussenvoegsel;
    }

    /**
     * Get voornaam + tussenvoegsel + achternaam
     * 
     * @return string
     */
    public function getNaam() {
        $naam = trim($this->getVoornaam());
        $tussenvoegsel = $this->getTussenvoegsel();
        if ($tussenvoegsel !== NULL) {
            $tussenvoegsel = trim($tussenvoegsel);
            if ($tussenvoegsel !== '') {
                $naam = $naam . ' ' . $tussenvoegsel;
            }
        }
        $naam = $naam . ' ' . trim($this->getAchternaam());
        return $naam;
    }

    /**
     * Set adres
     *
     * @param string $adres
     * @return Deelnemer
     */
    public function setAdres($adres) {
        $this->adres = $adres;

        return $this;
    }

    /**
     * Get adres
     *
     * @return string 
     */
    public function getAdres() {
        return $this->adres;
    }

    /**
     * Set huisnummer
     *
     * @param string $huisnummer
     * @return Deelnemer
     */
    public function setHuisnummer($huisnummer) {
        $this->huisnummer = $huisnummer;

        return $this;
    }

    /**
     * Get huisnummer
     *
     * @return string 
     */
    public function getHuisnummer() {
        return $this->huisnummer;
    }

    /**
     * Set woonplaats
     *
     * @param string $woonplaats
     * @return Deelnemer
     */
    public function setWoonplaats($woonplaats) {
        $this->woonplaats = $woonplaats;

        return $this;
    }

    /**
     * Get woonplaats
     *
     * @return string 
     */
    public function getWoonplaats() {
        return $this->woonplaats;
    }

    /**
     * Set postcode
     *
     * @param string $postcode
     * @return Deelnemer
     */
    public function setPostcode($postcode) {
        $this->postcode = $postcode;

        return $this;
    }

    /**
     * Get postcode
     *
     * @return string 
     */
    public function getPostcode() {
        return $this->postcode;
    }

    /**
     * Get land
     *
     * @return string
     */
    public function getLand() {

        return $this->land;
    }

    /**
     * Set land
     *
     * @param string $_land
     * @return Deelnemer
     */
    public function setLand($_land) {

        $this->land = $_land;

        return $this;
    }

    /**
     * Set geslacht
     *
     * @param string $geslacht
     * @return Deelnemer
     */
    public function setGeslacht($geslacht) {
        $this->geslacht = $geslacht;

        return $this;
    }

    /**
     * Get geslacht
     *
     * @return string 
     */
    public function getGeslacht() {
        return $this->geslacht;
    }

    /**
     * Set noodtelefoon
     *
     * @param string $noodtelefoon
     * @return Deelnemer
     */
    public function setNoodtelefoon($noodtelefoon) {
        $this->noodtelefoon = $noodtelefoon;

        return $this;
    }

    /**
     * Get noodtelefoon
     *
     * @return string 
     */
    public function getNoodtelefoon() {
        return $this->noodtelefoon;
    }

    /**
     * Set telefoon
     *
     * @param string $telefoon
     * @return Deelnemer
     */
    public function setTelefoon($telefoon) {
        $this->telefoon = $telefoon;

        return $this;
    }

    /**
     * Get telefoon
     *
     * @return string 
     */
    public function getTelefoon() {
        return $this->telefoon;
    }

    /**
     * Set geboortedatum
     *
     * @param \DateTime $geboortedatum
     * @return Deelnemer
     */
    public function setGeboortedatum($geboortedatum) {
        $this->geboortedatum = $geboortedatum;
        return $this;
    }

    /**
     * Get geboortedatum
     *
     * @return \DateTime 
     */
    public function getGeboortedatum() {
        return $this->geboortedatum;
    }

    public function getLeeftijd() {
        return $this->getGeboortedatum()->diff(new \DateTime('28-06-2014'))->y;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Deelnemer
     */
    public function setEmail($email) {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail() {
        return $this->email;
    }

    /**
     * Set nationaliteitid
     *
     * @param Nationaliteit $nationaliteit
     * @return Deelnemer
     */
    public function setNationaliteit(Nationaliteit $nationaliteit = null) {
        $this->nationaliteit = $nationaliteit;

        return $this;
    }

    /**
     * Get nationaliteit
     *
     * @return Nationaliteit 
     */
    public function getNationaliteit() {
        return $this->nationaliteit;
    }

    public function setRotmember($rotmember) {
        $this->rotmember = $rotmember;

        return $this;
    }

    public function getRotmember() {
        return $this->rotmember;
    }

    public function setRotmembernummer($rotmembernummer) {
        $this->rotmembernumber = $rotmembernummer;

        return $this;
    }

    public function getRotmembernummer() {
        return $this->rotmembernumber;
    }

    public function validateOptionals(ExecutionContextInterface $context) {
//        $groups = array();
//        if ($this->getRotmember()) {
//            $groups[] = "rotmember";
//        } else {
//            $groups[] = "geenrotmember";
//        }
//        $context->validate($this, null, $groups);
    }

    public function __toString() {
        $naam = $this->getNaam();

        return $naam ? $naam : '';
    }

}
