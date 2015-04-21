<?php

namespace ROT\Bundle\IISBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;
use ROT\Bundle\AdminBundle\Traits\BlameableEntity;
use ROT\Bundle\AdminBundle\Traits\TimestampableEntity;

/**
 * Nationaliteit
 *
 * @ORM\Table(name="nationaliteit")
 * @ORM\Entity(repositoryClass="ROT\Bundle\IISBundle\Entity\NationaliteitRepository")
 */
class Nationaliteit
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
     * @ORM\Column(name="nationaliteit", type="string", length=255, nullable=false)
     * @Assert\NotBlank()
     */
    protected $nationaliteit;

    /**
     * @var string
     *
     * @ORM\Column(name="landcode", type="string", length=5, nullable=false)
     * @Assert\NotBlank()
     */
    protected $landcode;

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
     * Set nationaliteit
     *
     * @param string $nationaliteit
     * @return Nationaliteit
     */
    public function setNationaliteit($nationaliteit)
    {
        $this->nationaliteit = $nationaliteit;
    
        return $this;
    }

    /**
     * Get nationaliteit
     *
     * @return string 
     */
    public function getNationaliteit()
    {
        return $this->nationaliteit;
    }

    /**
     * Set landcode
     *
     * @param string $landcode
     * @return Nationaliteit
     */
    public function setLandcode($landcode)
    {
        $this->landcode = $landcode;
    
        return $this;
    }

    /**
     * Get landcode
     *
     * @return string 
     */
    public function getLandcode()
    {
        return $this->landcode;
    }
	
	public function __toString() {
        $nationaliteit = $this->getNationaliteit();

		return $nationaliteit ? $nationaliteit : '';
	}
}