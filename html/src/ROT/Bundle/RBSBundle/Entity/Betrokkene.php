<?php

namespace ROT\Bundle\RBSBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use ROT\Bundle\PBSBundle\Entity\Parkeerkaart;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;
use ROT\Bundle\AdminBundle\Traits\BlameableEntity;
use ROT\Bundle\AdminBundle\Traits\TimestampableEntity;

/**
 * Betrokkene
 *
 * @ORM\Table(name="betrokkene")
 * @ORM\Entity(repositoryClass="ROT\Bundle\RBSBundle\Entity\BetrokkeneRepository")
 * @Gedmo\Loggable(logEntryClass="ROT\Bundle\AdminBundle\Entity\LogEntry")
 */
class Betrokkene
{
    use BlameableEntity, TimestampableEntity;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \ROT\Bundle\PBSBundle\Entity\Parkeerkaart
     *
     * @ORM\OneToOne(targetEntity="\ROT\Bundle\PBSBundle\Entity\Parkeerkaart", orphanRemoval=true, cascade={"all"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="parkeerkaartid", referencedColumnName="id")
     * })
     * @Assert\Type("ROT\Bundle\PBSBundle\Entity\Parkeerkaart")
     * @Assert\Valid()
     */
    private $parkeerkaart;

    /**
     * @var \Organisatie
     *
     * @ORM\ManyToOne(targetEntity="Organisatie")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="organisatieid", referencedColumnName="id")
     * })
     * @Gedmo\Versioned
     * @Assert\Type("\ROT\Bundle\RBSBundle\Entity\Organisatie")
     */
    private $organisatie;

    /**
     * @var string
     *
     * @ORM\Column(name="voornaam", type="string", length=100, nullable=false)
     * @Gedmo\Versioned
     * @Assert\NotBlank()
     */
    private $voornaam;

    /**
     * @var string
     *
     * @ORM\Column(name="tussenvoegsel", type="string", length=50, nullable=false)
     * @Gedmo\Versioned
     */
    private $tussenvoegsel;

    /**
     * @var string
     *
     * @ORM\Column(name="achternaam", type="string", length=100, nullable=false)
     * @Gedmo\Versioned
     * @Assert\NotBlank()
     */
    private $achternaam;

    /**
     * @var string
     *
     * @ORM\Column(name="soort", type="string", length=50, nullable=false)
     * @Gedmo\Versioned
     * @Assert\NotBlank()
     */
    private $soort;

    public function __construct() {
        $this->parkeerkaart = new Parkeerkaart();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set parkeerkaart
     *
     * @param \ROT\Bundle\PBSBundle\Entity\Parkeerkaart $parkeerkaart
     * @return Betrokkene
     */
    public function setParkeerkaart(Parkeerkaart $parkeerkaart = null)
    {
        $this->parkeerkaart = $parkeerkaart;
    
        return $this;
    }

    /**
     * Get parkeerkaart
     *
     * @return \ROT\Bundle\PBSBundle\Entity\Parkeerkaart
     */
    public function getParkeerkaart()
    {
        return $this->parkeerkaart;
    }

    /**
     * Set organisatie
     *
     * @param \ROT\Bundle\RBSBundle\Entity\Organisatie $organisatie
     * @return Betrokkene
     */
    public function setOrganisatie(Organisatie $organisatie = null)
    {
        $this->organisatie = $organisatie;
    
        return $this;
    }

    /**
     * Get organisatie
     *
     * @return \ROT\Bundle\RBSBundle\Entity\Organisatie
     */
    public function getOrganisatie()
    {
        return $this->organisatie;
    }

    /**
     * Set voornaam
     *
     * @param string $voornaam
     * @return Betrokkene
     */
    public function setVoornaam($voornaam)
    {
        $this->voornaam = $voornaam;
    
        return $this;
    }

    /**
     * Get voornaam
     *
     * @return string 
     */
    public function getVoornaam()
    {
        return $this->voornaam;
    }

    /**
     * Set tussenvoegsel
     *
     * @param string $tussenvoegsel
     * @return Betrokkene
     */
    public function setTussenvoegsel($tussenvoegsel)
    {
        $this->tussenvoegsel = $tussenvoegsel;
    
        return $this;
    }

    /**
     * Get tussenvoegsel
     *
     * @return string 
     */
    public function getTussenvoegsel()
    {
        return $this->tussenvoegsel;
    }

    /**
     * Set achternaam
     *
     * @param string $achternaam
     * @return Betrokkene
     */
    public function setAchternaam($achternaam)
    {
        $this->achternaam = $achternaam;
    
        return $this;
    }

    /**
     * Get achternaam
     *
     * @return string 
     */
    public function getAchternaam()
    {
        return $this->achternaam;
    }
	
	/**
	 * Get voornaam + tussenvoegsel + achternaam
	 * 
	 * @return string
	 */
	public function getNaam() {
		if ($this->getTussenvoegsel() !== '') {
			return $this->getVoornaam() . ' ' . $this->getTussenvoegsel() . ' ' . $this->getAchternaam();
		} else {
			return $this->getVoornaam() . ' ' . $this->getAchternaam();
		}
	}

    /**
     * Set soort
     *
     * @param string $soort
     * @return Betrokkene
     */
    public function setSoort($soort)
    {
        $this->soort = $soort;
    
        return $this;
    }

    /**
     * Get soort
     *
     * @return string 
     */
    public function getSoort()
    {
        return $this->soort;
    }
	
	public function __toString() {
        $naam = $this->getNaam();

		return $naam ? $naam : '';
	}
}