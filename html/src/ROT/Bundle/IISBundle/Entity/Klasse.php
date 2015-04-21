<?php

namespace ROT\Bundle\IISBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Gedmo\Mapping\Annotation as Gedmo;
use ROT\Bundle\AdminBundle\Traits\BlameableEntity;
use ROT\Bundle\AdminBundle\Traits\TimestampableEntity;
use ROT\Bundle\IISBundle\Entity\Deelname as Deelname;

/**
 * Klasse
 *
 * @ORM\Table(name="klasse")
 * @ORM\Entity(repositoryClass="ROT\Bundle\IISBundle\Entity\KlasseRepository")
 * @UniqueEntity(fields={"naam", "type"}, ignoreNull=true)
 */
class Klasse {
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
     * @ORM\Column(name="naam", type="string", length=255, nullable=true)
     * @Assert\NotBlank()
     */
    private $naam;

    /**
     * @ORM\Column(name="type", type="string", length=255, nullable=true)
     * @Assert\NotBlank()
     */
    private $type;

    /**
     * @var ArrayCollection
     *
     * @ORM\ManyToMany(targetEntity="Deelname")
     * @ORM\JoinTable(name="klasse_deelnames",
     *      joinColumns={@ORM\JoinColumn(name="klasse_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="deelname_id", referencedColumnName="id")}
     * )
     */
    private $deelnames;

    public function __construct() {
        $this->deelnames = new ArrayCollection();
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
     * set Naam
     *
     * @param string $naam
     * @return Klasse
     */
    public function setNaam($naam) {
        $this->naam = $naam;

        return $this;
    }

    /**
     * get Naam
     *
     * @return string
     */
    public function getNaam() {
        return $this->naam;
    }

    /**
     * set Type
     *
     * @param string $type
     * @return Klasse
     */
    public function setType($type) {
        $this->type = $type;

        return $this;
    }

    /**
     * get Type
     *
     * @return string
     */
    public function getType() {
        return $this->type;
    }

    /**
     * add Deelname
     *
     * @param Deelname $deelname
     * @return Klasse
     */
    public function addDeelname(Deelname $deelname) {
        if (!$this->deelnames->contains($deelname)) {
            $this->deelnames->add($deelname);
        }

        return $this;
    }

    /**
     * remove Deelname
     *
     * @param Deelname $deelname
     * @return Klasse
     */
    public function removeDeelname(Deelname $deelname) {
        $this->deelnames->removeElement($deelname);

        return $this;
    }

    /**
     * clear Deelnames
     *
     * @return Klasse
     */
    public function clearDeelnames() {
        $this->deelnames->clear();

        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getDeelnames() {
        return $this->deelnames;
    }
    
    /**
     * @return ArrayCollection
     */
    public function getDeelnamesSorted() {
        $deelnames = $this->deelnames;
        $sorted = false;
        while(!$sorted)
        {
            $sorted = true;
            for($i = 0; $i < count($deelnames) -1; $i++)
            {
                if($deelnames[$i]->getGecorrigeerdeFinishtijd() > $deelnames[$i + 1]->getGecorrigeerdeFinishtijd())
                {
                    $temp = $deelnames[$i];
                    $deelnames[$i] = $deelnames[$i + 1];
                    $deelnames[$i + 1] = $temp;
                    $sorted = false;
                }
            }
        }
        return $deelnames;
    }
    
    public function getGemiddeldeFinishtijdString()
    {
        $deelnames = $this->deelnames;
        $total = 0;
        $aantal = count($deelnames);
        foreach($deelnames as $deelname)
        {
            $total += $deelname->getFinishtijd();
        }
        $gemiddelde = $total / $aantal;
        return $this->timeToString($gemiddelde);
    }
    
    public function getGemiddeldeGecorrigeerdeFinishtijdString()
    {
        $deelnames = $this->deelnames;
        $total = 0;
        $aantal = count($deelnames);
        foreach($deelnames as $deelname)
        {
            $total += $deelname->getGecorrigeerdeFinishtijd();
        }
        $gemiddelde = $total / $aantal;
        return $this->timeToString($gemiddelde);
    }
    
    function timeToString($timeInSec)
    {
        $sec = $timeInSec % 60;
        $timeInSec -= $sec;
        $secstring = number_format((float)$sec, 2, '.', '');
        $min = $timeInSec % 3600;
        $timeInSec -= $min;
        $min /= 60;
        $hour = $timeInSec;
        $hour /= 3600;
        return (int)$hour . ":" . ($min < 10 ? "0" : "") . $min . ":" . ($sec < 10 ? "0" : "") . $secstring;
    }
        /**
     * @return ArrayCollection
     */
    public function getfirst3() {
        $deelnames = $this->deelnames;
        $sorted = false;
        while(!$sorted)
        {
            $sorted = true;
            for($i = 0; $i < count($deelnames) -1; $i++)
            {
                if($deelnames[$i]->getFinishtijd() > $deelnames[$i + 1]->getFinishtijd())
                {
                    $temp = $deelnames[$i];
                    $deelnames[$i] = $deelnames[$i + 1];
                    $deelnames[$i + 1] = $temp;
                    $sorted = false;
                }
            }
        }
        for($i = 0; $i < 3; $i++)
        {
            $tempdeel[$i] = $deelnames[$i];
        }
        $deelnames = $tempdeel;
        return $deelnames;
    }
    
    public function __toString() {
        return $this->getNaam();
    }
}