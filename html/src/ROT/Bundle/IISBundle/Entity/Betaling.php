<?php

namespace ROT\Bundle\IISBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\ExecutionContextInterface;
use Gedmo\Mapping\Annotation as Gedmo;
use ROT\Bundle\AdminBundle\Traits\BlameableEntity;
use ROT\Bundle\AdminBundle\Traits\TimestampableEntity;

/**
 * Betaling
 *
 * @ORM\Table(name="betaling")
 * @ORM\Entity(repositoryClass="ROT\Bundle\IISBundle\Entity\BetalingRepository")
 * @Assert\Callback(methods={"validateBetaling2"})
 */
class Betaling
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
     * @ORM\Column(name="afschriftnummer", type="string", length=255, nullable=false)
     * @Assert\NotBlank()
     */
    private $afschriftnummer;

    /**
     * @var float
     *
     * @ORM\Column(name="bedrag", type="float", nullable=false)
     * @Assert\NotBlank()
     */
    private $bedrag;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="betaaldatum", type="date", nullable=false)
     * @Assert\NotBlank()
     */
    private $betaaldatum;

    /**
     * @var string
     *
     * @ORM\Column(name="afschriftnummer2", type="string", length=255, nullable=true)
     * @Assert\NotBlank(groups="betaling2")
     */
    private $afschriftnummer2;

    /**
     * @var float
     *
     * @ORM\Column(name="bedrag2", type="float", nullable=true)
     * @Assert\NotBlank(groups="betaling2")
     */
    private $bedrag2;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="betaaldatum2", type="date", nullable=true)
     * @Assert\NotBlank(groups="betaling2")
     */
    private $betaaldatum2;

    public function __construct() {
        $this->betaaldatum = new \DateTime();
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
     * Set afschriftnummer
     *
     * @param string $afschriftnummer
     * @return Betaling
     */
    public function setAfschriftnummer($afschriftnummer)
    {
        $this->afschriftnummer = $afschriftnummer;
    
        return $this;
    }

    /**
     * Get afschriftnummer
     *
     * @return string 
     */
    public function getAfschriftnummer()
    {
        return $this->afschriftnummer;
    }

    /**
     * Set bedrag
     *
     * @param float $bedrag
     * @return Betaling
     */
    public function setBedrag($bedrag)
    {
        $this->bedrag = $bedrag;
    
        return $this;
    }

    /**
     * Get bedrag
     *
     * @return float 
     */
    public function getBedrag()
    {
        return $this->bedrag;
    }

    /**
     * Set betaaldatum
     *
     * @param \DateTime $betaaldatum
     * @return Betaling
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
     * Set afschriftnummer2
     *
     * @param string $afschriftnummer2
     * @return Betaling
     */
    public function setAfschriftnummer2($afschriftnummer2)
    {
        $this->afschriftnummer2 = $afschriftnummer2;

        return $this;
    }

    /**
     * Get afschriftnummer2
     *
     * @return string
     */
    public function getAfschriftnummer2()
    {
        return $this->afschriftnummer2;
    }

    /**
     * Set bedrag2
     *
     * @param float $bedrag2
     * @return Betaling
     */
    public function setBedrag2($bedrag2)
    {
        $this->bedrag2 = $bedrag2;

        return $this;
    }

    /**
     * Get bedrag2
     *
     * @return float
     */
    public function getBedrag2()
    {
        return $this->bedrag2;
    }

    /**
     * Set betaaldatum2
     *
     * @param \DateTime $betaaldatum2
     * @return Betaling
     */
    public function setBetaaldatum2($betaaldatum2)
    {
        $this->betaaldatum2 = $betaaldatum2;

        return $this;
    }

    /**
     * Get betaaldatum2
     *
     * @return \DateTime
     */
    public function getBetaaldatum2()
    {
        return $this->betaaldatum2;
    }

    public function validateBetaling2(ExecutionContextInterface $context) {
        if ($this->getAfschriftnummer2() !== null || $this->getBedrag2() !== null || $this->getBetaaldatum2() !== null) {
            $context->validate($this, '', array('betaling2'));
        }
    }
}