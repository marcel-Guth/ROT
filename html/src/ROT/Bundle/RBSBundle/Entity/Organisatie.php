<?php

namespace ROT\Bundle\RBSBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Gedmo\Mapping\Annotation as Gedmo;
use ROT\Bundle\AdminBundle\Traits\BlameableEntity;
use ROT\Bundle\AdminBundle\Traits\TimestampableEntity;

/**
 * Organisatie
 *
 * @ORM\Table(name="organisatie")
 * @ORM\Entity(repositoryClass="ROT\Bundle\RBSBundle\Entity\OrganisatieRepository")
 * @Gedmo\Loggable(logEntryClass="ROT\Bundle\AdminBundle\Entity\LogEntry")
 * @UniqueEntity("organisatie")
 */
class Organisatie
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
     * @ORM\Column(name="organisatie", type="string", length=255, nullable=false, unique=true)
     * @Gedmo\Versioned
     * @Assert\NotBlank()
     */
    private $organisatie;

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
     * Set organisatie
     *
     * @param string $organisatie
     * @return Organisatie
     */
    public function setOrganisatie($organisatie)
    {
        $this->organisatie = $organisatie;
    
        return $this;
    }

    /**
     * Get organisatie
     *
     * @return string 
     */
    public function getOrganisatie()
    {
        return $this->organisatie;
    }
	
	public function __toString() {
        $organisatie = $this->getOrganisatie();

		return $organisatie ? $organisatie : '';
	}
}