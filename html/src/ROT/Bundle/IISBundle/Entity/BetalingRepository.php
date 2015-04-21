<?php

namespace ROT\Bundle\IISBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;

class BetalingRepository extends EntityRepository {
    public function applyFilterToQueryBuilder($filter, $alias, QueryBuilder $qb) {
        if ($filter['afschriftnummer'] !== null) {
            $qb->andWhere($alias . '.afschriftnummer LIKE :afschriftnummer');
            $qb->setParameter('afschriftnummer', '%' . $filter['afschriftnummer'] . '%');
        }
        if ($filter['bedrag'] !== null) {
            switch($filter['bedragmodifier']) {
                case '=':
                    $qb->andWhere($alias . '.bedrag = :bedrag');
                    break;
                case '>=':
                    $qb->andWhere($alias . '.bedrag >= :bedrag');
                    break;
                case '<=':
                    $qb->andWhere($alias . '.bedrag <= :bedrag');
                    break;
            }
            $qb->setParameter('bedrag', $filter['bedrag']);
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
        if ($filter['afschriftnummer2'] !== null) {
            $qb->andWhere($alias . '.afschriftnummer2 LIKE :afschriftnummer2');
            $qb->setParameter('afschriftnummer2', '%' . $filter['afschriftnummer2'] . '%');
        }
        if ($filter['bedrag2'] !== null) {
            switch($filter['bedragmodifier2']) {
                case '=':
                    $qb->andWhere($alias . '.bedrag2 = :bedrag2');
                    break;
                case '>=':
                    $qb->andWhere($alias . '.bedrag2 >= :bedrag2');
                    break;
                case '<=':
                    $qb->andWhere($alias . '.bedrag2 <= :bedrag2');
                    break;
            }
            $qb->setParameter('bedrag2', $filter['bedrag2']);
        }
        if ($filter['betaaldatum2'] !== null) {
            switch($filter['betaaldatummodifier']) {
                case '=':
                    $qb->andWhere($alias . '.betaaldatum2 = :betaaldatum2');
                    break;
                case '>=':
                    $qb->andWhere($alias . '.betaaldatum2 >= :betaaldatum2');
                    break;
                case '<=':
                    $qb->andWhere($alias . '.betaaldatum2 <= :betaaldatum2');
                    break;
            }
            $qb->setParameter('betaaldatum2', $filter['betaaldatum2']);
        }
    }
}