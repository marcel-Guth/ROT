<?php

namespace ROT\Bundle\IISBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use ROT\Bundle\PBSBundle\Entity\Parkeerkaart;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\ExecutionContextInterface;
use Gedmo\Mapping\Annotation as Gedmo;
use ROT\Bundle\AdminBundle\Traits\BlameableEntity;
use ROT\Bundle\AdminBundle\Traits\TimestampableEntity;

/**
 * Deelname
 *
 * @ORM\Table(name="deelname")
 * @ORM\Entity(repositoryClass="ROT\Bundle\IISBundle\Entity\DeelnameRepository")
 * @UniqueEntity(fields={"startnummer"}, ignoreNull=true)
 * @Assert\Callback(methods={"validateOptionals"})
 * @ORM\HasLifecycleCallbacks
 */
class Deelname
{
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
     * @var \DateTime
     *
     * @ORM\Column(name="inschrijfdatum", type="date", nullable=false)
     * @Assert\NotBlank()
     * @Assert\Date()
     */
    protected $inschrijfdatum;

    /**
     * @var bool
     *
     * @ORM\Column(name="nederlands", type="boolean", nullable=true)
     * @Assert\Type("bool")
     */
    protected $nederlands;

    /**
     * @var string
     *
     * @ORM\Column(name="reserveringscode", type="string", length=255, nullable=false)
     * @Assert\NotBlank()
     */
    protected $reserveringscode;

    /**
     * @var string
     *
     * @ORM\Column(name="zeilnummer", type="string", length=255, nullable=false)
     * @Assert\NotBlank()
     */
    protected $zeilnummer;

    /**
     * @var integer
     *
     * @ORM\Column(name="startnummer", type="integer", nullable=true)
     * @Assert\Range(min=1, max=999)
     */
    protected $startnummer;

    /**
     * @var boolean
     *
     * @ORM\Column(name="meetbrief", type="boolean", nullable=true)
     */
    protected $meetbrief;

    /**
     * @var string
     *
     * @ORM\Column(name="meetbriefnummer", type="string", length=255, nullable=true)
     * @Assert\NotBlank(groups="meetbrief")
     * @Assert\Blank(groups="geenmeetbrief")
     */
    protected $meetbriefnummer;

    /**
     * @var boolean
     *
     * @ORM\Column(name="persoonlijkereclamelicentie", type="boolean", nullable=true)
     */
    protected $persoonlijkereclamelicentie;

    /**
     * @var string
     *
     * @ORM\Column(name="persoonlijkereclamelicentienummer", type="string", length=255, nullable=true)
     * @Assert\NotBlank(groups="persoonlijkereclamelicentie")
     * @Assert\Blank(groups="geenpersoonlijkereclamelicentie")
     */
    protected $persoonlijkereclamelicentienummer;

    /**
     * @var string
     *
     * @ORM\Column(name="bootklasse", type="string", length=255, nullable=true)
     */
    protected $bootklasse;

    /**
     * @var boolean
     *
     * @ORM\Column(name="reclame", type="boolean", nullable=true)
     */
    protected $reclame;

    /**
     * @var boolean
     *
     * @ORM\Column(name="sponsor", type="boolean", nullable=true)
     */
    protected $sponsor;

    /**
     * @var boolean
     *
     * @ORM\Column(name="spinnaker", type="boolean", nullable=true)
     */
    protected $spinnaker;

    /**
     * @var string
     *
     * @ORM\Column(name="fleet", type="string", length=255, nullable=true)
     */
    protected $fleet;

    /**
     * @var int
     *
     * @ORM\Column(name="finishtijd", type="integer", nullable=true)
     * @Assert\Type("int")
     */
    protected $finishtijd;

    /**
     * @var int
     *
     * @ORM\Column(name="modrating", type="integer", nullable=true)
     * @Assert\Type("int")
     */
    protected $modrating;

    /**
     * @var int
     *
     * @ORM\Column(name="gecorrigeerdefinishtijd", type="integer", nullable=true)
     * @Assert\Type("int")
     */
    protected $gecorrigeerde_finishtijd;

    /**
     * @var integer
     *
     * @ORM\Column(name="memberstatus", type="string", length=255, nullable=false)
     * @Assert\NotBlank()
     */
    protected $memberstatus;

    /**
     * @var integer
     *
     * @ORM\Column(name="racestatus", type="string", length=255, nullable=false)
     * @Assert\NotBlank()
     */
    protected $racestatus;

    /**
     * @var boolean
     *
     * @ORM\Column(name="verzekeringsbewijsstatus", type="boolean", nullable=true)
     */
    protected $verzekeringsbewijsstatus;

    /**
     * @var integer
     *
     * @ORM\Column(name="xcbstatus", type="string", length=255, nullable=false)
     * @Assert\NotBlank()
     */
    protected $xcbstatus;

    /**
     * @var boolean
     *
     * @ORM\Column(name="dutchopenstatus", type="boolean", nullable=true)
     */
    protected $dutchopenstatus;

    /**
     * @var boolean
     *
     * @ORM\Column(name="aanmeldingsmail", type="datetime", nullable=true)
     */
    protected $aanmeldingsmail;

    /**
     * @var boolean
     *
     * @ORM\Column(name="bevestigingsmail", type="datetime", nullable=true)
     */
    protected $bevestigingsmail;

    /**
     * @var boolean
     *
     * @ORM\Column(name="bevestigingbriefstatus", type="boolean", nullable=true)
     */
    protected $bevestigingbriefstatus;

    /**
     * @var boolean
     *
     * @ORM\Column(name="helaasbriefstatus", type="boolean", nullable=true)
     */
    protected $helaasbriefstatus;

    /**
     * @var boolean
     *
     * @ORM\Column(name="horstochtstatus", type="boolean", nullable=true)
     */
    protected $horstochtstatus;

    /**
     * @var boolean
     *
     * @ORM\Column(name="nacrachampstatus", type="boolean", nullable=true)
     */
    protected $nacrachampstatus;

    /**
     * @var boolean
     *
     * @ORM\Column(name="tochtnoordstatus", type="boolean", nullable=true)
     */
    protected $tochtnoordstatus;

    /**
     * @var boolean
     *
     * @ORM\Column(name="aangemeld", type="boolean", nullable=true)
     */
    protected $aangemeld;

    /**
     * @var boolean
     *
     * @ORM\Column(name="afgemeld", type="boolean", nullable=true)
     */
    protected $afgemeld;

    /**
     * @var \Uitzondering
     *
     * @ORM\ManyToOne(targetEntity="Uitzondering")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="uitzonderingid", referencedColumnName="id", nullable=true)
     * })
     * @Assert\Type("ROT\Bundle\IISBundle\Entity\Uitzondering")
     */
    protected $uitzondering;

    /**
     * @var \Boot
     *
     * @ORM\ManyToOne(targetEntity="Boot")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="bootid", referencedColumnName="id", nullable=false)
     * })
     * @Assert\NotBlank()
     * @Assert\Type("ROT\Bundle\IISBundle\Entity\Boot")
     */
    protected $boot;

    /**
     * @var Parkeerkaart
     *
     * @ORM\OneToOne(targetEntity="ROT\Bundle\PBSBundle\Entity\Parkeerkaart", orphanRemoval=true, cascade={"all"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="parkeerkaartid", referencedColumnName="id", nullable=true)
     * })
     * @Assert\Type(type="ROT\Bundle\PBSBundle\Entity\Parkeerkaart")
     * @Assert\Valid()
     */
    protected $parkeerkaart;

    /**
     * @var kenteken
     * 
     * @ORM\Column(name="kenteken", type="string", length=10, nullable=true)
     */
    protected $kenteken;

    /**
     * @var \Stuurman
     *
     * @ORM\OneToOne(targetEntity="Stuurman", orphanRemoval=true, cascade={"all"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="stuurmanid", referencedColumnName="id", nullable=false)
     * })
     * @Assert\NotNull()
     * @Assert\Type(type="ROT\Bundle\IISBundle\Entity\Stuurman")
     * @Assert\Valid()
     */
    protected $stuurman;

    /**
     * @var \Vereniging
     *
     * @ORM\ManyToOne(targetEntity="Vereniging")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="verenigingid", referencedColumnName="id", nullable=true)
     * })
     * @Assert\Type(type="ROT\Bundle\IISBundle\Entity\Vereniging")
     */
    protected $vereniging;

    /**
     * @var \Betaling
     *
     * @ORM\OneToOne(targetEntity="Betaling", orphanRemoval=true, cascade={"all"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="betalingid", referencedColumnName="id", nullable=true)
     * })
     * @Assert\Type(type="ROT\Bundle\IISBundle\Entity\Betaling")
     * @Assert\Valid()
     */
    protected $betaling;

    /**
     * @var \Borg
     *
     * @ORM\OneToOne(targetEntity="Borg", orphanRemoval=true, cascade={"all"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="borgid", referencedColumnName="id", nullable=true)
     * })
     * @Assert\Type(type="ROT\Bundle\IISBundle\Entity\Borg")
     * @Assert\Valid()
     */
    protected $borg;

    /**
     * @var \Fokkemaat
     *
     * @ORM\OneToOne(targetEntity="Fokkemaat", orphanRemoval=true, cascade={"all"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fokkemaatid", referencedColumnName="id", nullable=true)
     * })
     * @Assert\Type(type="ROT\Bundle\IISBundle\Entity\Fokkemaat")
     * @Assert\Valid()
     */
    protected $fokkemaat;

    public function __construct() {
        $this->nederlands = true;
        $this->inschrijfdatum = new \DateTime();

        $this->memberstatus = 'Geen member';
        $this->racestatus = 'Nog niet gestart';
        $this->xcbstatus = 'Geen Xcb';
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
     * Set inschrijfdatum
     *
     * @param \DateTime $inschrijfdatum
     * @return Deelname
     */
    public function setInschrijfdatum($inschrijfdatum)
    {
        $this->inschrijfdatum = $inschrijfdatum;
    
        return $this;
    }

    /**
     * Get inschrijfdatum
     *
     * @return \DateTime 
     */
    public function getInschrijfdatum()
    {
        return $this->inschrijfdatum;
    }

    /**
     * @param bool $nederlands
     *
     * @return Deelname
     */
    public function setNederlands($nederlands) {
        $this->nederlands = $nederlands;

        return $this;
    }

    /**
     * @return bool
     */
    public function getNederlands() {
        return $this->nederlands;
    }

    /**
     * Set reserveringscode
     *
     * @param string $reserveringscode
     * @return Deelname
     */
    public function setReserveringscode($reserveringscode)
    {
        $this->reserveringscode = $reserveringscode;
    
        return $this;
    }

    /**
     * Get reserveringscode
     *
     * @return string 
     */
    public function getReserveringscode()
    {
        return $this->reserveringscode;
    }

    /**
     * Set zeilnummer
     *
     * @param string $zeilnummer
     * @return Deelname
     */
    public function setZeilnummer($zeilnummer)
    {
        $this->zeilnummer = $zeilnummer;
    
        return $this;
    }

    /**
     * Get zeilnummer
     *
     * @return string 
     */
    public function getZeilnummer()
    {
        return $this->zeilnummer;
    }

    /**
     * Set startnummer
     *
     * @param integer $startnummer
     * @return Deelname
     */
    public function setStartnummer($startnummer)
    {
            $this->startnummer = $startnummer;
    
            return $this;
    }

    /**
     * Get startnummer
     *
     * @return integer 
     */
    public function getStartnummer()
    {
        return $this->startnummer;
    }

    /**
     * Set meetbrief
     *
     * @param boolean $meetbrief
     * @return Deelname
     */
    public function setMeetbrief($meetbrief)
    {
        $this->meetbrief = $meetbrief;
    
        return $this;
    }

    /**
     * Get meetbrief
     *
     * @return boolean 
     */
    public function getMeetbrief()
    {
        return $this->meetbrief;
    }

    /**
     * Set meetbriefnummer
     *
     * @param string $meetbriefnummer
     * @return Deelname
     */
    public function setMeetbriefnummer($meetbriefnummer)
    {
        $this->meetbriefnummer = $meetbriefnummer;
    
        return $this;
    }

    /**
     * Get meetbriefnummer
     *
     * @return string 
     */
    public function getMeetbriefnummer()
    {
        return $this->meetbriefnummer;
    }

    /**
     * Set persoonlijkereclamelicentie
     *
     * @param boolean $persoonlijkereclamelicentie
     * @return Deelname
     */
    public function setPersoonlijkereclamelicentie($persoonlijkereclamelicentie)
    {
        $this->persoonlijkereclamelicentie = $persoonlijkereclamelicentie;
    
        return $this;
    }

    /**
     * Get persoonlijkereclamelicentie
     *
     * @return boolean 
     */
    public function getPersoonlijkereclamelicentie()
    {
        return $this->persoonlijkereclamelicentie;
    }

    /**
     * Set persoonlijkereclamelicentienummer
     *
     * @param string $persoonlijkereclamelicentienummer
     * @return Deelname
     */
    public function setPersoonlijkereclamelicentienummer($persoonlijkereclamelicentienummer)
    {
        $this->persoonlijkereclamelicentienummer = $persoonlijkereclamelicentienummer;

        return $this;
    }

    /**
     * Get persoonlijkereclamelicentienummer
     *
     * @return string
     */
    public function getPersoonlijkereclamelicentienummer()
    {
        return $this->persoonlijkereclamelicentienummer;
    }

    /**
     * Set bootklasse
     *
     * @param string $bootklasse
     * @return Deelname
     */
    public function setBootklasse($bootklasse)
    {
        $this->bootklasse = $bootklasse;

        return $this;
    }

    /**
     * Get bootklasse
     *
     * @return string
     */
    public function getBootklasse()
    {
        return $this->bootklasse;
    }

    /**
     * Set reclame
     *
     * @param boolean $reclame
     * @return Deelname
     */
    public function setReclame($reclame)
    {
        $this->reclame = $reclame;
    
        return $this;
    }

    /**
     * Get reclame
     *
     * @return boolean 
     */
    public function getReclame()
    {
        return $this->reclame;
    }

    /**
     * Set sponsor
     *
     * @param boolean $sponsor
     * @return Deelname
     */
    public function setSponsor($sponsor)
    {
        $this->sponsor = $sponsor;
    
        return $this;
    }

    /**
     * Get sponsor
     *
     * @return boolean 
     */
    public function getSponsor()
    {
        return $this->sponsor;
    }

    /**
     * Set spinnaker
     *
     * @param boolean $spinnaker
     * @return Deelname
     */
    public function setSpinnaker($spinnaker)
    {
        $this->spinnaker = $spinnaker;
    
        return $this;
    }

    /**
     * Get spinnaker
     *
     * @return boolean 
     */
    public function getSpinnaker()
    {
        return $this->spinnaker;
    }

    /**
     * Set fleet
     *
     * @param string $fleet
     * @return Deelname
     */
    public function setFleet($fleet)
    {
        $this->fleet = $fleet;
    
        return $this;
    }

    /**
     * Get fleet
     *
     * @return string 
     */
    public function getFleet()
    {
        return $this->fleet;
    }

    /**
     * Set memberstatus
     *
     * @param integer $memberstatus
     * @return Deelname
     */
    public function setMemberstatus($memberstatus)
    {
        $this->memberstatus = $memberstatus;

        return $this;
    }

    /**
     * Get memberstatus
     *
     * @return integer
     */
    public function getMemberstatus()
    {
        return $this->memberstatus;
    }

    /**
     * Set racestatus
     *
     * @param integer $racestatus
     * @return Deelname
     */
    public function setRacestatus($racestatus)
    {
        $this->racestatus = $racestatus;

        return $this;
    }

    /**
     * Get racestatus
     *
     * @return integer
     */
    public function getRacestatus()
    {
        return $this->racestatus;
    }

    /**
     * Set verzekeringsbewijsstatus
     *
     * @param boolean $verzekeringsbewijsstatus
     * @return Deelname
     */
    public function setVerzekeringsbewijsstatus($verzekeringsbewijsstatus)
    {
        $this->verzekeringsbewijsstatus = $verzekeringsbewijsstatus;

        return $this;
    }

    /**
     * Get verzekeringsbewijsstatus
     *
     * @return boolean
     */
    public function getVerzekeringsbewijsstatus()
    {
        return $this->verzekeringsbewijsstatus;
    }

    /**
     * Set xcbstatus
     *
     * @param integer $xcbstatus
     * @return Deelname
     */
    public function setXcbstatus($xcbstatus)
    {
        $this->xcbstatus = $xcbstatus;

        return $this;
    }

    /**
     * Get xcbstatus
     *
     * @return integer
     */
    public function getXcbstatus()
    {
        return $this->xcbstatus;
    }

    /**
     * Set dutchopenstatus
     *
     * @param boolean $dutchopenstatus
     * @return Deelname
     */
    public function setDutchopenstatus($dutchopenstatus)
    {
        $this->dutchopenstatus = $dutchopenstatus;

        return $this;
    }

    /**
     * Get dutchopenstatus
     *
     * @return boolean
     */
    public function getDutchopenstatus()
    {
        return $this->dutchopenstatus;
    }

    public function setAanmeldingsmail(\DateTime $aanmeldingsmail) {
        $this->aanmeldingsmail = $aanmeldingsmail;

        return $this;
    }

    public function getAanmeldingsmail() {
        return $this->aanmeldingsmail;
    }

    public function setBevestigingsmail(\DateTime $bevestigingsmail) {
        $this->bevestigingsmail = $bevestigingsmail;

        return $this;
    }

    public function getBevestigingsmail() {
        return $this->bevestigingsmail;
    }

    /**
     * Set bevestigingbriefstatus
     *
     * @param boolean $bevestigingbriefstatus
     * @return Deelname
     */
    public function setBevestigingbriefstatus($bevestigingbriefstatus)
    {
        $this->bevestigingbriefstatus = $bevestigingbriefstatus;

        return $this;
    }

    /**
     * Get bevestigingbriefstatus
     *
     * @return boolean
     */
    public function getBevestigingbriefstatus()
    {
        return $this->bevestigingbriefstatus;
    }

    /**
     * Set helaasbriefstatus
     *
     * @param boolean $helaasbriefstatus
     * @return Deelname
     */
    public function setHelaasbriefstatus($helaasbriefstatus)
    {
        $this->helaasbriefstatus = $helaasbriefstatus;

        return $this;
    }

    /**
     * Get helaasbriefstatus
     *
     * @return boolean
     */
    public function getHelaasbriefstatus()
    {
        return $this->helaasbriefstatus;
    }

    /**
     * Set horstochtstatus
     *
     * @param boolean $horstochtstatus
     * @return Deelname
     */
    public function setHorstochtstatus($horstochtstatus)
    {
        $this->horstochtstatus = $horstochtstatus;

        return $this;
    }

    /**
     * Get horstochtstatus
     *
     * @return boolean
     */
    public function getHorstochtstatus()
    {
        return $this->horstochtstatus;
    }

    /**
     * Set nacrachampstatus
     *
     * @param boolean $nacrachampstatus
     * @return Deelname
     */
    public function setNacrachampstatus($nacrachampstatus)
    {
        $this->nacrachampstatus = $nacrachampstatus;

        return $this;
    }

    /**
     * Get nacrachampstatus
     *
     * @return boolean
     */
    public function getNacrachampstatus()
    {
        return $this->nacrachampstatus;
    }

    /**
     * Set tochtnoordstatus
     *
     * @param boolean $tochtnoordstatus
     * @return Deelname
     */
    public function setTochtnoordstatus($tochtnoordstatus)
    {
        $this->tochtnoordstatus = $tochtnoordstatus;

        return $this;
    }

    /**
     * Get tochtnoordstatus
     *
     * @return boolean
     */
    public function getTochtnoordstatus()
    {
        return $this->tochtnoordstatus;
    }

    /**
     * @param bool $aangemeld
     * @return Deelname
     */
    public function setAangemeld($aangemeld) {
        $this->aangemeld = $aangemeld;

        return $this;
    }

    /**
     * @return bool
     */
    public function getAangemeld() {
        return $this->aangemeld;
    }

    /**
     * @param bool $afgemeld
     * @return Deelname
     */
    public function setAfgemeld($afgemeld) {
        $this->afgemeld = $afgemeld;

        return $this;
    }

    /**
     * @return bool
     */
    public function getAfgemeld() {
        return $this->afgemeld;
    }

    /**
     * Set finishtijd
     *
     * @param int $finishtijd
     * @return Deelname
     */
    public function setFinishtijd($finishtijd) {
        $this->finishtijd = $finishtijd;

        return $this;
    }

    /**
     * Get finishtijd
     *
     * @return int
     */
    public function getFinishtijd() {
        return $this->finishtijd;
    }
    
    /**
     * Get finishtijd as string
     * 
     * @return string
     */
    public function getFinishtijdString() {
        return $this->timeToString($this->finishtijd);
    }

    /**
     * Set modrating
     *
     * @param int $modrating
     * @return Deelname
     */
    public function setModrating($modrating) {
        $this->modrating = $modrating;

        return $this;
    }

    /**
     * Get modrating
     *
     * @return int
     */
    public function getModrating() {
        return $this->modrating;
    }

    /**
     * Set finishtijd
     *
     * @param int $finishtijd
     * @return Deelname
     */
    public function setGecorrigeerdeFinishtijd($gecorrigeerde_finishtijd) {
        $this->gecorrigeerde_finishtijd = $gecorrigeerde_finishtijd;

        return $this;
    }

    /**
     * Get finishtijd
     *
     * @return int
     */
    public function getGecorrigeerdeFinishtijd() {
        return $this->gecorrigeerde_finishtijd;
    }
    
    /**
     * Get gecorrigeerde finishtijd as string
     * 
     * @return string
     */
    public function getGecorrigeerdeFinishtijdString() {
        return $this->timeToString($this->gecorrigeerde_finishtijd);
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
        return $hour . ":" . ($min < 10 ? "0" : "") . $min . ":" . ($sec < 10 ? "0" : "") . $secstring;
    }

    /**
     * Set uitzondering
     *
     * @param Uitzondering $uitzondering
     * @return Deelname
     */
    public function setUitzondering(Uitzondering $uitzondering) {
        $this->uitzondering = $uitzondering;

        return $this;
    }

    /**
     * Get uitzondering
     *
     * @return Uitzondering
     */
    public function getUitzondering() {
        return $this->uitzondering;
    }

    /**
     * Set boot
     *
     * @param Boot $boot
     * @return Deelname
     */
    public function setBoot(Boot $boot = null)
    {
        $this->boot = $boot;

        return $this;
    }

    /**
     * Get boot
     *
     * @return Boot
     */
    public function getBoot()
    {
        return $this->boot;
    }

    /**
     * Set parkeerkaartid
     *
     * @param \ROT\Bundle\PBSBundle\Entity\Parkeerkaart $parkeerkaart
     * @return Deelname
     */
    public function setParkeerkaart(Parkeerkaart $parkeerkaart = null)
    {
        $this->parkeerkaart = $parkeerkaart;

        return $this;
    }

    /**
     * Get parkeerkaartid
     *
     * @return \ROT\Bundle\PBSBundle\Entity\Parkeerkaart
     */
    public function getParkeerkaart()
    {
        return $this->parkeerkaart;
    }

    /**
     * 
     * @param string $kenteken
     * @return \ROT\Bundle\IISBundle\Entity\Deelname
     */
    public function setKenteken($kenteken)
    {
        $this->kenteken = $kenteken;
        
        return $this;
    }
    
    /**
     * 
     * @return string
     */
    public function getKenteken()
    {
        return $this->kenteken;
    }

    /**
     * Set $stuurman
     *
     * @param Stuurman $stuurman
     * @return Deelname
     */
    public function setStuurman(Stuurman $stuurman = null)
    {
        $this->stuurman = $stuurman;

        return $this;
    }

    /**
     * Get stuurmanid
     *
     * @return Stuurman
     */
    public function getStuurman()
    {
        return $this->stuurman;
    }

    /**
     * Set vereniging
     *
     * @param Vereniging $vereniging
     * @return Deelname
     */
    public function setVereniging(Vereniging $vereniging = null)
    {
        $this->vereniging = $vereniging;

        return $this;
    }

    /**
     * Get vereniging
     *
     * @return Vereniging
     */
    public function getVereniging()
    {
        return $this->vereniging;
    }

    /**
     * Set betalingid
     *
     * @param Betaling $betaling
     * @return Deelname
     */
    public function setBetaling(Betaling $betaling = null)
    {
        $this->betaling = $betaling;

        return $this;
    }

    /**
     * Get betalingid
     *
     * @return Betaling
     */
    public function getBetaling()
    {
        return $this->betaling;
    }

    /**
     * Set borgid
     *
     * @param Borg $borg
     * @return Deelname
     */
    public function setBorg(Borg $borg = null)
    {
        $this->borg = $borg;

        return $this;
    }

    /**
     * Get borgid
     *
     * @return Borg
     */
    public function getBorg()
    {
        return $this->borg;
    }

    /**
     * Set fokkemaatid
     *
     * @param Fokkemaat $fokkemaat
     * @return Deelname
     */
    public function setFokkemaat(Fokkemaat $fokkemaat = null)
    {
        $this->fokkemaat = $fokkemaat;

        return $this;
    }

    /**
     * Get fokkemaatid
     *
     * @return Fokkemaat
     */
    public function getFokkemaat()
    {
        return $this->fokkemaat;
    }

    public function validateOptionals(ExecutionContextInterface $context) {
        $groups = array();
        if ($this->getMeetbrief()) {
            $groups[] = "meetbrief";
        } else {
            $groups[] = "geenmeetbrief";
        }
        if ($this->getPersoonlijkereclamelicentie()) {
            $groups[] = "persoonlijkereclamelicentie";
        } else {
            $groups[] = "geenpersoonlijkereclamelicentie";
        }
        $context->validate($this, null, $groups);
    }

    public function __toString() {
    $reserveringscode = $this->getReserveringscode();

            return $reserveringscode ? $reserveringscode : '';
    }
}