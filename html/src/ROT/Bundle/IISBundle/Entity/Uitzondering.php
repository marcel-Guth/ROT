<?php

namespace ROT\Bundle\IISBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;
use ROT\Bundle\AdminBundle\Traits\BlameableEntity;
use ROT\Bundle\AdminBundle\Traits\TimestampableEntity;

/**
 * Uitzondering
 *
 * @ORM\Table(name="uitzondering")
 * @ORM\Entity(repositoryClass="ROT\Bundle\IISBundle\Entity\UitzonderingRepository")
 */
class Uitzondering
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
     * @ORM\Column(name="afkorting", type="string", length=255, nullable=false)
     * @Assert\NotBlank()
     */
    private $afkorting;

    /**
     * @var string
     *
     * @ORM\Column(name="uitzondering", type="string", length=255, nullable=false)
     * @Assert\NotBlank()
     */
    private $uitzondering;

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
     * Set afkorting
     *
     * @param string $afkorting
     * @return Uitzondering
     */
    public function setAfkorting($afkorting)
    {
        $this->afkorting = $afkorting;
    
        return $this;
    }

    /**
     * Get afkorting
     *
     * @return string 
     */
    public function getAfkorting()
    {
        return $this->afkorting;
    }

    /**
     * Set uitzondering
     *
     * @param string $uitzondering
     * @return Uitzondering
     */
    public function setUitzondering($uitzondering)
    {
        $this->uitzondering = $uitzondering;
    
        return $this;
    }

    /**
     * Get uitzondering
     *
     * @return string 
     */
    public function getUitzondering()
    {
        return $this->uitzondering;
    }


    public function __toString() {
        $afkorting = $this->getAfkorting();

        return $afkorting ? $afkorting : "";
    }
}