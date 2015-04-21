<?php

namespace ROT\Bundle\IISBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\ExecutionContextInterface;
use Gedmo\Mapping\Annotation as Gedmo;
use ROT\Bundle\AdminBundle\Traits\BlameableEntity;
use ROT\Bundle\AdminBundle\Traits\TimestampableEntity;

/**
 * Stuurman
 *
 * @ORM\Table(name="stuurman")
 * @ORM\Entity(repositoryClass="ROT\Bundle\IISBundle\Entity\StuurmanRepository")
 * @Assert\Callback(methods={"validateOptionals"})
 */
class Stuurman {
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
     * @var \Deelnemer
     *
     * @ORM\OneToOne(targetEntity="Deelnemer", orphanRemoval=true, cascade={"all"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="deelnemerid", referencedColumnName="id", nullable=false)
     * })
     * @Assert\NotNull()
     * @Assert\Type(type="ROT\Bundle\IISBundle\Entity\Deelnemer")
     * @Assert\Valid()
     */
    protected $deelnemer;

    /**
     * @var boolean
     *
     * @ORM\Column(name="startlicentie", type="boolean", nullable=true)
     */
    protected $startlicentie;

    /**
     * @var string
     *
     * @ORM\Column(name="startlicentienummer", type="string", length=255, nullable=true)
     * @Assert\NotBlank(groups="startlicentie")
     * @Assert\Blank(groups="geenstartlicentie")
     */
    protected $startlicentienummer;

    /**
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * @param Deelnemer $deelnemer
     *
     * @return Stuurman
     */
    public function setDeelnemer($deelnemer) {
        $this->deelnemer = $deelnemer;

        return $this;
    }

    /**
     * @return Deelnemer
     */
    public function getDeelnemer() {
        return $this->deelnemer;
    }

    /**
     * @param bool $startlicentie
     *
     * @return Stuurman
     */
    public function setStartlicentie($startlicentie) {
        $this->startlicentie = $startlicentie;

        return $this;
    }

    /**
     * @return bool
     */
    public function getStartlicentie() {
        return $this->startlicentie;
    }

    /**
     * @param string $startlicentienummer
     *
     * @return Stuurman
     */
    public function setStartlicentienummer($startlicentienummer) {
        $this->startlicentienummer = $startlicentienummer;

        return $this;
    }

    /**
     * @return string
     */
    public function getStartlicentienummer() {
        return $this->startlicentienummer;
    }

    public function validateOptionals(ExecutionContextInterface $context) {
        $groups = array();
        if ($this->getStartlicentie()) {
            $groups[] = "startlicentie";
        } else {
            $groups[] = "geenstartlicentie";
        }
        $context->validate($this, null, $groups);
    }

    public function __toString() {
        return $this->getDeelnemer()->__toString();
    }

}