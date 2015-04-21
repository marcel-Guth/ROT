<?php

namespace ROT\Bundle\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use ROT\Bundle\AdminBundle\Traits\BlameableEntity;
use ROT\Bundle\AdminBundle\Traits\TimestampableEntity;

/**
 * Variable
 *
 * @ORM\Table(name="variable")
 * @ORM\Entity(repositoryClass="ROT\Bundle\AdminBundle\Entity\VariableRepository")
 */
class Variable
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
     * @var \DateTime
     *
     * @ORM\Column(name="variable", type="datetime", nullable=false)
     */
    private $variable;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=false)
     */
    private $description;



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
     * Set variable
     *
     * @param \DateTime $variable
     * @return Variable
     */
    public function setVariable($variable)
    {
        $this->variable = $variable;
    
        return $this;
    }

    /**
     * Get variable
     *
     * @return \DateTime 
     */
    public function getVariable()
    {
        return $this->variable;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Variable
     */
    public function setDescription($description)
    {
        $this->description = $description;
    
        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }
}