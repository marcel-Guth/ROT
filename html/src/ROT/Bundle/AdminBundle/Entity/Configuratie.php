<?php

namespace ROT\Bundle\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use ROT\Bundle\AdminBundle\Traits\BlameableEntity;
use ROT\Bundle\AdminBundle\Traits\TimestampableEntity;

/**
 * Configuratie
 *
 * @ORM\Table(name="configuratie")
 * @ORM\Entity(repositoryClass="ROT\Bundle\AdminBundle\Entity\ConfiguratieRepository")
 */
class Configuratie
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
     * @ORM\Column(name="contenttarget", type="string", length=255, nullable=false)
     */
    private $contenttarget;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text", nullable=false)
     */
    private $content;

    /**
     * @var boolean
     *
     * @ORM\Column(name="nederlands", type="boolean", nullable=false)
     */
    private $nederlands;



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
     * Set contenttarget
     *
     * @param string $contenttarget
     * @return Configuratie
     */
    public function setContenttarget($contenttarget)
    {
        $this->contenttarget = $contenttarget;
    
        return $this;
    }

    /**
     * Get contenttarget
     *
     * @return string 
     */
    public function getContenttarget()
    {
        return $this->contenttarget;
    }

    /**
     * Set content
     *
     * @param string $content
     * @return Configuratie
     */
    public function setContent($content)
    {
        $this->content = $content;
    
        return $this;
    }

    /**
     * Get content
     *
     * @return string 
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set nederlands
     *
     * @param boolean $nederlands
     * @return Configuratie
     */
    public function setNederlands($nederlands)
    {
        $this->nederlands = $nederlands;
    
        return $this;
    }

    /**
     * Get nederlands
     *
     * @return boolean 
     */
    public function getNederlands()
    {
        return $this->nederlands;
    }
}