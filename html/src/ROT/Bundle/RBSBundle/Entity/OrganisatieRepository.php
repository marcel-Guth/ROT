<?php

namespace ROT\Bundle\RBSBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;

class OrganisatieRepository extends EntityRepository {
    public function applyFilterToQueryBuilder($filter, $alias, QueryBuilder $qb) {
        if ($filter['organisatie'] !== null) {
            $qb->andWhere($alias . '.organisatie LIKE :organisatie');
            $qb->setParameter('organisatie', '%' . $filter['organisatie'] . '%');
        }
    }

    public function getIndexModificationTime() {
        $time = $this->getEntityManager()->createQuery("
            SELECT MAX(p.updatedAt) FROM ROTPBSBundle:Parkeerkaart p
        ")->getSingleScalarResult();

        if ($time !== null) {
            return new \DateTime($time);
        }
    }
}