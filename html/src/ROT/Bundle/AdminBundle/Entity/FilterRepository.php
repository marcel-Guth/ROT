<?php

namespace ROT\Bundle\AdminBundle\Entity;

use Doctrine\ORM\EntityRepository;

class FilterRepository extends EntityRepository
{
    public function findByTypeOrderedByName($type) {
        return $this->createQueryBuilder('p')
            ->where('p.type = :type')
            ->setParameter('type', $type)
            ->orderBy('p.name')
            ->getQuery()
            ->getResult();
    }
}