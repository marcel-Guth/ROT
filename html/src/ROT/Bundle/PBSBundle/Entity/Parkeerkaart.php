<?php

namespace ROT\Bundle\PBSBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\ExecutionContextInterface;
use Gedmo\Mapping\Annotation as Gedmo;
use ROT\Bundle\AdminBundle\Traits\BlameableEntity;
use ROT\Bundle\AdminBundle\Traits\TimestampableEntity;

/**
 * Parkeerkaart
 *
 * @ORM\Table(name="parkeerkaart")
 * @ORM\Entity(repositoryClass="ROT\Bundle\PBSBundle\Entity\ParkeerkaartRepository")
 * @Assert\Callback({"validateOptionals"})
 */
class Parkeerkaart
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
     * @var string
     *
     * @ORM\Column(name="kenteken", type="string", length=255, nullable=false)
     * @Assert\NotBlank()
     */
    private $kenteken;

    /**
     * @var string
     *
     * @ORM\Column(name="kaarttype", type="string", length=255, nullable=false)
     * @Assert\NotBlank()
     */
    private $kaarttype;

    /**
     * @var string
     *
     * @ORM\Column(name="strandvergunningsoort", type="string", length=255, nullable=false)
     * @Assert\NotBlank()
     */
    private $strandvergunningsoort;

    /**
     * @var string
     *
     * @ORM\Column(name="vergunningsoort", type="string", length=255, nullable=false)
     * @Assert\NotBlank()
     */
    private $vergunningsoort;

    /**
     * @var boolean
     *
     * @ORM\Column(name="donderdag", type="boolean", nullable=true)
     */
    private $donderdag;

    /**
     * @var boolean
     *
     * @ORM\Column(name="vrijdag", type="boolean", nullable=true)
     */
    private $vrijdag;

    /**
     * @var boolean
     *
     * @ORM\Column(name="zaterdag", type="boolean", nullable=true)
     */
    private $zaterdag;

    /**
     * @var boolean
     *
     * @ORM\Column(name="zondag", type="boolean", nullable=true)
     */
    private $zondag;

    /**
     * @var boolean
     *
     * @ORM\Column(name="uitgegeven", type="boolean", nullable=true)
     */
    private $uitgegeven;

    /**
     * @var integer
     *
     * @ORM\Column(name="uitgavecount", type="integer", nullable=true)
     * @Assert\NotBlank(groups="uitgegeven")
     * @Assert\Range(min=1, groups="uitgegeven")
     * @Assert\Blank(groups="nietuitgegeven")
     */
    private $uitgavecount;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="uitgavedatum", type="datetime", nullable=true)
     * @Assert\DateTime(groups="uitgegeven")
     */
    private $uitgavedatum;

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
     * Set kenteken
     *
     * @param string $kenteken
     * @return Parkeerkaart
     */
    public function setKenteken($kenteken)
    {
        $this->kenteken = $kenteken;
    
        return $this;
    }

    /**
     * Get kenteken
     *
     * @return string 
     */
    public function getKenteken()
    {
        return $this->kenteken;
    }

    /**
     * Set kaarttype
     *
     * @param string $kaarttype
     * @return Parkeerkaart
     */
    public function setKaarttype($kaarttype)
    {
        $this->kaarttype = $kaarttype;

        return $this;
    }

    /**
     * Get kaarttype
     *
     * @return string
     */
    public function getKaarttype()
    {
        return $this->kaarttype;
    }

    /**
     * Set vergunningsoort
     *
     * @param string $vergunningsoort
     * @return Parkeerkaart
     */
    public function setVergunningsoort($vergunningsoort)
    {
        $this->vergunningsoort = $vergunningsoort;
    
        return $this;
    }

    /**
     * Get vergunningsoort
     *
     * @return string 
     */
    public function getVergunningsoort()
    {
        return $this->vergunningsoort;
    }

    /**
     * Set strandvergunningsoort
     *
     * @param string $strandvergunningsoort
     * @return Parkeerkaart
     */
    public function setStrandvergunningsoort($strandvergunningsoort)
    {
        $this->strandvergunningsoort = $strandvergunningsoort;

        return $this;
    }

    /**
     * Get strandvergunningsoort
     *
     * @return string
     */
    public function getStrandvergunningsoort()
    {
        return $this->strandvergunningsoort;
    }

    /**
     * Set donderdag
     *
     * @param boolean $donderdag
     * @return Parkeerkaart
     */
    public function setDonderdag($donderdag)
    {
        $this->donderdag = $donderdag;
    
        return $this;
    }

    /**
     * Get donderdag
     *
     * @return boolean 
     */
    public function getDonderdag()
    {
        return $this->donderdag;
    }

    /**
     * Set vrijdag
     *
     * @param boolean $vrijdag
     * @return Parkeerkaart
     */
    public function setVrijdag($vrijdag)
    {
        $this->vrijdag = $vrijdag;
    
        return $this;
    }

    /**
     * Get vrijdag
     *
     * @return boolean 
     */
    public function getVrijdag()
    {
        return $this->vrijdag;
    }

    /**
     * Set zaterdag
     *
     * @param boolean $zaterdag
     * @return Parkeerkaart
     */
    public function setZaterdag($zaterdag)
    {
        $this->zaterdag = $zaterdag;
    
        return $this;
    }

    /**
     * Get zaterdag
     *
     * @return boolean 
     */
    public function getZaterdag()
    {
        return $this->zaterdag;
    }

    /**
     * Set zondag
     *
     * @param boolean $zondag
     * @return Parkeerkaart
     */
    public function setZondag($zondag)
    {
        $this->zondag = $zondag;
    
        return $this;
    }

    /**
     * Get zondag
     *
     * @return boolean 
     */
    public function getZondag()
    {
        return $this->zondag;
    }

    /**
     * Set uitgegeven
     *
     * @param boolean $uitgegeven
     * @return Parkeerkaart
     */
    public function setUitgegeven($uitgegeven)
    {
        $this->uitgegeven = $uitgegeven;

        return $this;
    }

    /**
     * Get uitgegeven
     *
     * @return boolean
     */
    public function getUitgegeven()
    {
        return $this->uitgegeven;
    }

    /**
     * Set uitgavecount
     *
     * @param integer $uitgavecount
     * @return Parkeerkaart
     */
    public function setUitgavecount($uitgavecount)
    {
        $this->uitgavecount = $uitgavecount;
    
        return $this;
    }

    /**
     * Get uitgavecount
     *
     * @return integer 
     */
    public function getUitgavecount()
    {
        return $this->uitgavecount;
    }

    /**
     * Set uitgavedatum
     *
     * @param \DateTime $uitgavedatum
     * @return Parkeerkaart
     */
    public function setUitgavedatum(\DateTime $uitgavedatum = null)
    {
        $this->uitgavedatum = $uitgavedatum;
    
        return $this;
    }

    /**
     * Get uitgavedatum
     *
     * @return \DateTime 
     */
    public function getUitgavedatum()
    {
        return $this->uitgavedatum;
    }

    public function validateOptionals(ExecutionContextInterface $context) {
        $groups = array();
        if ($this->getUitgegeven()) {
            $groups[] = 'uitgegeven';
        } else {
            $groups[] = 'nietuitgegeven';
        }
        $context->validate($this, null, $groups);
    }
	
	public function __toString() {
        $kenteken = $this->getKenteken();

		return $kenteken ? $kenteken : '';
	}
}