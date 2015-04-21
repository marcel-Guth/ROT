<?php

namespace ROT\Bundle\AdminBundle\Entity;

use Gedmo\Loggable\Entity\Repository\LogEntryRepository as GedmoLogEntryRepository;

class LogEntryRepository extends GedmoLogEntryRepository {
    public function getLogEntriesWithLimit($entity, $limit) {
        return $this->getLogEntriesQuery($entity)->setMaxResults($limit)->getResult();
    }
}