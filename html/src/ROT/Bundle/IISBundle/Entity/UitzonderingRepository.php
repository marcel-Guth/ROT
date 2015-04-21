<?php

namespace ROT\Bundle\IISBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;

class UitzonderingRepository extends EntityRepository {
    public function applyFilterToQueryBuilder($filter, $alias, QueryBuilder $qb) {
        if ($filter['uitzondering'] !== null) {
            $qb->andWhere($alias . '.uitzondering LIKE :uitzondering');
            $qb->setParameter('uitzondering', '%' . $filter['uitzondering'] . '%');
        }
        if ($filter['afkorting'] !== null) {
            $qb->andWhere($alias . '.afkorting LIKE :afkorting');
            $qb->setParameter('afkorting', '%' . $filter['afkorting'] . '%');
        }
    }

    public function getIndexModificationTime() {
        $time = $this->getEntityManager()->createQuery("
            SELECT MAX(u.updatedAt) FROM ROTIISBundle:Uitzondering u
        ")->getSingleScalarResult();

        if ($time !== null) {
            return new \DateTime($time);
        }
    }
}