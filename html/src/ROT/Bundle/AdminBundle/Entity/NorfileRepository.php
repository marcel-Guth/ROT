<?php

namespace ROT\Bundle\AdminBundle\Entity;

use Doctrine\ORM\EntityRepository;

class NorfileRepository extends EntityRepository
{
    public function findPDFNorfiles() {
        return $this->findByExtension('pdf');
    }

    public function findHTMLNorfiles() {
        return $this->findByExtension('html');
    }

    public function findImageNorfiles() {
        return $this->findByExtension('img');
    }
}