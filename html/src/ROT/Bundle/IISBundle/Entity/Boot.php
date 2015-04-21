<?php

namespace ROT\Bundle\IISBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;
use ROT\Bundle\AdminBundle\Traits\BlameableEntity;
use ROT\Bundle\AdminBundle\Traits\TimestampableEntity;

/**
 * Boot
 *
 * @ORM\Table(name="boot")
 * @ORM\Entity(repositoryClass="ROT\Bundle\IISBundle\Entity\BootRepository")
 */
class Boot
{
    use BlameableEntity, TimestampableEntity;

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
     * @ORM\Column(name="type", type="string", length=255, nullable=false)
     * @Assert\NotBlank()
     */
    protected $type;

    /**
     * @var string
     *
     * @ORM\Column(name="klasse", type="string", length=255, nullable=false)
     * @Assert\NotBlank()
     */
    protected $klasse;

    /**
     * @var float
     *
     * @ORM\Column(name="normalrating", type="float", nullable=false)
     * @Assert\NotBlank()
     * @Assert\Range(min=0)
     */
    protected $normalrating;

    /**
     * @var float
     *
     * @ORM\Column(name="spinnakerrating", type="float", nullable=false)
     * @Assert\NotBlank()
     * @Assert\Range(min=0)
     */
    protected $spinnakerrating;

    /**
     * @var boolean
     *
     * @ORM\Column(name="iscustom", type="boolean", nullable=false)
     */
    protected $iscustom;



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
     * Set type
     *
     * @param string $type
     * @return Boot
     */
    public function setType($type)
    {
        $this->type = $type;
    
        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set klasse
     *
     * @param string $klasse
     * @return Boot
     */
    public function setKlasse($klasse)
    {
        $this->klasse = $klasse;
    
        return $this;
    }

    /**
     * Get klasse
     *
     * @return string 
     */
    public function getKlasse()
    {
        return $this->klasse;
    }

    /**
     * Set normalrating
     *
     * @param float $normalrating
     * @return Boot
     */
    public function setNormalrating($normalrating)
    {
        $this->normalrating = $normalrating;
    
        return $this;
    }

    /**
     * Get normalrating
     *
     * @return float 
     */
    public function getNormalrating()
    {
        return $this->normalrating;
    }

    /**
     * Set spinnakerrating
     *
     * @param float $spinnakerrating
     * @return Boot
     */
    public function setSpinnakerrating($spinnakerrating)
    {
        $this->spinnakerrating = $spinnakerrating;
    
        return $this;
    }

    /**
     * Get spinnakerrating
     *
     * @return float 
     */
    public function getSpinnakerrating()
    {
        return $this->spinnakerrating;
    }

    /**
     * Set iscustom
     *
     * @param boolean $iscustom
     * @return Boot
     */
    public function setIscustom($iscustom)
    {
        $this->iscustom = $iscustom;
    
        return $this;
    }

    /**
     * Get iscustom
     *
     * @return boolean 
     */
    public function getIscustom()
    {
        return $this->iscustom;
    }
	
	public function __toString() {
        $type = $this->getType();

		return $type ? $type : '';
	}
}
