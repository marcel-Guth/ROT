<?php

namespace ROT\Bundle\IISBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;

class StuurmanRepository extends EntityRepository {
    public function applyFilterToQueryBuilder($filter, $alias, QueryBuilder $qb) {

    }
}