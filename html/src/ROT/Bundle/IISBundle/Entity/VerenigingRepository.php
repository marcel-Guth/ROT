<?php

namespace ROT\Bundle\IISBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;

class VerenigingRepository extends EntityRepository {
    public function applyFilterToQueryBuilder($filter, $alias, QueryBuilder $qb) {
        if ($filter['naam'] !== null) {
            $qb->andWhere($alias . '.naam LIKE :naam');
            $qb->setParameter('naam', '%' . $filter['naam'] . '%');
        }
        if ($filter['iscustom'] !== null) {
            $qb->andWhere($alias . '.iscustom = :iscustom');
            $qb->setParameter('iscustom', $filter['iscustom']);
        }
    }

    public function getIndexModificationTime() {
        $time = $this->getEntityManager()->createQuery("
            SELECT MAX(v.updatedAt) FROM ROTIISBundle:Vereniging v
        ")->getSingleScalarResult();

        if ($time !== null) {
            return new \DateTime($time);
        }
    }
}