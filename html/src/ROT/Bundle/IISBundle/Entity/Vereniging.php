<?php

namespace ROT\Bundle\IISBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;
use ROT\Bundle\AdminBundle\Traits\BlameableEntity;
use ROT\Bundle\AdminBundle\Traits\TimestampableEntity;

/**
 * Vereniging
 *
 * @ORM\Table(name="vereniging")
 * @ORM\Entity(repositoryClass="ROT\Bundle\IISBundle\Entity\VerenigingRepository")
 */
class Vereniging
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
     * @ORM\Column(name="naam", type="string", length=255, nullable=false)
     * @Assert\NotBlank()
     *
     */
    protected $naam;

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
     * Set naam
     *
     * @param string $naam
     * @return Vereniging
     */
    public function setNaam($naam)
    {
        $this->naam = $naam;
    
        return $this;
    }

    /**
     * Get naam
     *
     * @return string 
     */
    public function getNaam()
    {
        return $this->naam;
    }

    /**
     * Set iscustom
     *
     * @param boolean $iscustom
     * @return Vereniging
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
        $naam = $this->getNaam();

		return $naam ? $naam : '';
	}
}