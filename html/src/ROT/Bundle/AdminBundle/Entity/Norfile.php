<?php

namespace ROT\Bundle\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;
use ROT\Bundle\AdminBundle\Traits\BlameableEntity;
use ROT\Bundle\AdminBundle\Traits\TimestampableEntity;

/**
 * Norfile
 *
 * @ORM\Table(name="norfile")
 * @ORM\Entity(repositoryClass="ROT\Bundle\AdminBundle\Entity\NorfileRepository")
 */
class Norfile
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
     * @ORM\Column(name="norfilename", type="string", length=255, nullable=false)
     * @Assert\File(maxSize="4096K", mimeTypes={"image/*", "application/pdf", "text/html"})
     */
    private $norfilename;

    /**
     * @var string
     *
     * @ORM\Column(name="extension", type="string", length=255, nullable=false)
     * @Assert\NotBlank()
     */
    private $extension;

    /**
     * @var boolean
     *
     * @ORM\Column(name="selected", type="boolean", nullable=false)
     * @Assert\Type("bool")
     */
    private $selected;

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
     * Set norfilename
     *
     * @param string $norfilename
     * @return Norfile
     */
    public function setNorfilename($norfilename)
    {
        $this->norfilename = $norfilename;
    
        return $this;
    }

    /**
     * Get norfilename
     *
     * @return string 
     */
    public function getNorfilename()
    {
        return $this->norfilename;
    }

    /**
     * Set extension
     *
     * @param string $extension
     * @return Norfile
     */
    public function setExtension($extension)
    {
        $this->extension = $extension;
    
        return $this;
    }

    /**
     * Get extension
     *
     * @return string 
     */
    public function getExtension()
    {
        return $this->extension;
    }

    /**
     * Set selected
     *
     * @param boolean $selected
     * @return Norfile
     */
    public function setSelected($selected)
    {
        $this->selected = $selected;
    
        return $this;
    }

    /**
     * Get selected
     *
     * @return boolean 
     */
    public function getSelected()
    {
        return $this->selected;
    }

    /**
     * Set timestamp
     *
     * @param \DateTime $timestamp
     * @return Norfile
     */
    public function setTimestamp($timestamp)
    {
        $this->timestamp = $timestamp;
    
        return $this;
    }

    /**
     * Get timestamp
     *
     * @return \DateTime 
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }
}