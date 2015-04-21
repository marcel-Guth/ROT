<?php

namespace ROT\Bundle\IISBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;

class BootRepository extends EntityRepository {
    public function applyFilterToQueryBuilder($filter, $alias, QueryBuilder $qb) {
        if ($filter['type'] !== null) {
            $qb->andWhere($alias . '.type LIKE :type');
            $qb->setParameter('type', '%' . $filter['type'] . '%');
        }
        if ($filter['klasse'] !== null) {
            $qb->andWhere($alias . '.klasse LIKE :klasse');
            $qb->setParameter('klasse', '%' . $filter['klasse'] . '%');
        }
        if ($filter['spinnakerrating'] !== null) {
            switch($filter['spinnakerratingmodifier']) {
                case '=':
                    $qb->andWhere($alias . '.spinnakerrating LIKE :spinnakerrating');
                    break;
                case '>=':
                    $qb->andWhere($alias . '.spinnakerrating >= :spinnakerrating');
                    break;
                case '<=':
                    $qb->andWhere($alias . '.spinnakerrating <= :spinnakerrating');
                    break;
            }
            $qb->setParameter('spinnakerrating', $filter['spinnakerrating']);
        }
        if ($filter['normalrating'] !== null) {
            switch($filter['normalratingmodifier']) {
                case '=':
                    $qb->andWhere($alias . '.normalrating LIKE :normalrating');
                    break;
                case '>=':
                    $qb->andWhere($alias . '.normalrating >= :normalrating');
                    break;
                case '<=':
                    $qb->andWhere($alias . '.normalrating <= :normalrating');
                    break;
            }
            $qb->setParameter('spinnakerrating', $filter['spinnakerrating']);
        }
        if ($filter['iscustom'] !== null) {
            $qb->andWhere($alias . '.iscustom = :iscustom');
            $qb->setParameter('iscustom', $filter['iscustom']);
        }
    }

    public function getIndexModificationTime() {
        $time = $this->getEntityManager()->createQuery("
            SELECT MAX(b.updatedAt) FROM ROTIISBundle:Boot b
        ")->getSingleScalarResult();

        if ($time !== null) {
            return new \DateTime($time);
        }
    }
}