<?php

namespace ROT\Bundle\IISBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;

class NationaliteitRepository extends EntityRepository {
    public function applyFilterToQueryBuilder($filter, $alias, QueryBuilder $qb) {
        if ($filter['nationaliteit'] !== null) {
            $qb->andWhere($alias . '.nationaliteit LIKE :nationaliteit');
            $qb->setParameter('nationaliteit', '%' . $filter['nationaliteit'] . '%');
        }
        if ($filter['landcode'] !== null) {
            $qb->andWhere($alias . '.landcode LIKE :landcode');
            $qb->setParameter('landcode', '%' . $filter['landcode'] . '%');
        }
    }

    public function getIndexModificationTime() {
        $time =$this->getEntityManager()->createQuery("
            SELECT MAX(n.updatedAt) FROM ROTIISBundle:Nationaliteit n
        ")->getSingleScalarResult();

        if ($time !== null) {
            return new \DateTime($time);
        }
    }
}