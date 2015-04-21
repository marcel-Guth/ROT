<?php

namespace ROT\Bundle\IISBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;

class KlasseRepository extends EntityRepository {
    public function applyFilterToQueryBuilder($filter, $alias, QueryBuilder $qb) {

    }

    public function getIndexModificationTime() {
        $time = $this->getEntityManager()->createQuery("
            SELECT MAX(k.updatedAt) FROM ROTIISBundle:Klasse k
        ")->getSingleScalarResult();

        if ($time !== null) {
            return new \DateTime($time);
        }
    }

    public function findAllWithOrderedDeelnames() {
        return $this->createQueryBuilder('k')
            ->join('k.deelnames', 'd')
            ->orderBy('d.gecorrigeerde_finishtijd')
            ->getQuery()
            ->getResult();
    }

    public function findOneByIdWithOrderedDeelnames($id) {
        return $this->createQueryBuilder('k')
            ->join('k.deelnames', 'd')
            ->orderBy('d.gecorrigeerde_finishtijd')
            ->getQuery()
            ->getSingleResult();
    }
}