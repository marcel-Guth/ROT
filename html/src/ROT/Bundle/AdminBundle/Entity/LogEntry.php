<?php

namespace ROT\Bundle\AdminBundle\Entity;

use Gedmo\Loggable\Entity\MappedSuperclass\AbstractLogEntry;
use Doctrine\ORM\Mapping as ORM;

/**
 * LogEntry
 *
 * @ORM\Table(name="logentry")
 * @ORM\Entity(repositoryClass="ROT\Bundle\AdminBundle\Entity\LogEntryRepository")
 */
class LogEntry extends AbstractLogEntry {}