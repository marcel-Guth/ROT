<?php

namespace ROT\Bundle\IISBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;

class BorgRepository extends EntityRepository {
    public function applyFilterToQueryBuilder($filter, $alias, QueryBuilder $qb) {
        if ($filter['betaalwijze'] !== null) {
            $qb->andWhere($alias . '.betaalwijze LIKE :betaalwijze');
            $qb->setParameter('betaalwijze', '%' . $filter['betaalwijze'] . '%');
        }
        if ($filter['betaaldatum'] !== null) {
            switch($filter['betaaldatummodifier']) {
                case '=':
                    $qb->andWhere($alias . '.betaaldatum = :betaaldatum');
                    break;
                case '>=':
                    $qb->andWhere($alias . '.betaaldatum >= :betaaldatum');
                    break;
                case '<=':
                    $qb->andWhere($alias . '.betaaldatum <= :betaaldatum');
                    break;
            }
            $qb->setParameter('betaaldatum', $filter['betaaldatum']);
        }
        if ($filter['terugbetaald'] !== null) {
            $qb->andWhere($alias . '.terugbetaald = :terugbetaald');
            $qb->setParameter('terugbetaald', $filter['terugbetaald']);
        }
    }
}