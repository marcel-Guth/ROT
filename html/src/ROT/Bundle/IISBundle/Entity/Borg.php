<?php

namespace ROT\Bundle\IISBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;
use ROT\Bundle\AdminBundle\Traits\BlameableEntity;
use ROT\Bundle\AdminBundle\Traits\TimestampableEntity;

/**
 * Borg
 *
 * @ORM\Table(name="borg")
 * @ORM\Entity(repositoryClass="ROT\Bundle\IISBundle\Entity\BorgRepository")
 */
class Borg
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
     * @ORM\Column(name="betaalwijze", type="string", length=255, nullable=false)
     * @Assert\NotBlank()
     */
    private $betaalwijze;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="betaaldatum", type="date", nullable=false)
     * @Assert\NotBlank()
     */
    private $betaaldatum;

    /**
     * @var boolean
     *
     * @ORM\Column(name="terugbetaald", type="boolean", nullable=false)
     */
    private $terugbetaald;

    public function __construct() {
        $this->betaalwijze = new \DateTime();
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
     * Set betaalwijze
     *
     * @param string $betaalwijze
     * @return Borg
     */
    public function setBetaalwijze($betaalwijze)
    {
        $this->betaalwijze = $betaalwijze;
    
        return $this;
    }

    /**
     * Get betaalwijze
     *
     * @return string 
     */
    public function getBetaalwijze()
    {
        return $this->betaalwijze;
    }

    /**
     * Set betaaldatum
     *
     * @param \DateTime $betaaldatum
     * @return Borg
     */
    public function setBetaaldatum($betaaldatum)
    {
        $this->betaaldatum = $betaaldatum;
    
        return $this;
    }

    /**
     * Get betaaldatum
     *
     * @return \DateTime 
     */
    public function getBetaaldatum()
    {
        return $this->betaaldatum;
    }

    /**
     * Set terugbetaald
     *
     * @param boolean $terugbetaald
     * @return Borg
     */
    public function setTerugbetaald($terugbetaald)
    {
        if($terugbetaald === null)
        {
            $terugbetaald = false;
        }
        $this->terugbetaald = $terugbetaald;
    
        return $this;
    }

    /**
     * Get terugbetaald
     *
     * @return boolean 
     */
    public function getTerugbetaald()
    {
        return $this->terugbetaald;
    }
}