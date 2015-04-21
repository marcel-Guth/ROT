<?php

namespace ROT\Bundle\IISBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\ExecutionContextInterface;
use Gedmo\Mapping\Annotation as Gedmo;
use ROT\Bundle\AdminBundle\Traits\BlameableEntity;
use ROT\Bundle\AdminBundle\Traits\TimestampableEntity;

/**
 * Fokkemaat
 *
 * @ORM\Table(name="fokkemaat")
 * @ORM\Entity(repositoryClass="ROT\Bundle\IISBundle\Entity\FokkemaatRepository")
 * @Assert\Callback(methods={"validateOptionals"})
 */
class Fokkemaat {
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
     * @ORM\Column(name="bemanningslicentie", type="boolean", nullable=true)
     */
    protected $bemanningslicentie;

    /**
     * @var string
     *
     * @ORM\Column(name="bemanningslicentienummer", type="string", length=255, nullable=true)
     * @Assert\NotBlank(groups="bemanningslicentie")
     * @Assert\Blank(groups="geenbemanningslicentie")
     */
    protected $bemanningslicentienummer;

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
     * @param bool $bemanningslicentie
     *
     * @return Stuurman
     */
    public function setBemanningslicentie($bemanningslicentie) {
        $this->bemanningslicentie = $bemanningslicentie;

        return $this;
    }

    /**
     * @return bool
     */
    public function getBemanningslicentie() {
        return $this->bemanningslicentie;
    }

    /**
     * @param string $bemanningslicentienummer
     *
     * @return string Stuurman
     */
    public function setBemanningslicentienummer($bemanningslicentienummer) {
        $this->bemanningslicentienummer = $bemanningslicentienummer;

        return $this;
    }

    /**
     * @return string
     */
    public function getBemanningslicentienummer() {
        return $this->bemanningslicentienummer;
    }

    public function validateOptionals(ExecutionContextInterface $context) {
        $groups = array();
        if ($this->getBemanningslicentie()) {
            $groups[] = "bemanningslicentie";
        } else {
            $groups[] = "geenbemanningslicentie";
        }
        $context->validate($this, null, $groups);
    }

    public function __toString() {
        return $this->getDeelnemer()->__toString();
    }
}