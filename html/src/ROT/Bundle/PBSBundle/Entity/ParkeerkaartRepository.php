<?php

namespace ROT\Bundle\PBSBundle\Entity;

use Doctrine\ORM\EntityRepository;

class ParkeerkaartRepository extends EntityRepository {
    public function applyFilterToQueryBuilder($filter, $alias, $qb) {
        if ($filter['kenteken'] !== null) {
            $qb->andWhere($alias . '.kenteken LIKE :kenteken');
            $qb->setParameter('kenteken', '%' . $filter['kenteken'] . '%');
        }

        if ($filter['kaarttype'] !== null) {
            $qb->andWhere($alias . '.kaarttype LIKE :kaarttype');
            $qb->setParameter('kaarttype', '%' . $filter['kaarttype'] . '%');
        }

        if ($filter['vergunningsoort'] !== null) {
            $qb->andWhere($alias . '.vergunningsoort LIKE :vergunningsoort');
            $qb->setParameter('vergunningsoort', '%' . $filter['vergunningsoort'] . '%');
        }

        if ($filter['uitgegeven'] !== null) {
            $qb->andWhere($alias . '.uitgegeven = :uitgegeven');
            $qb->setParameter('uitgegeven', $filter['uitgegeven']);
        }

        if ($filter['uitgavedatum'] !== '') {
            switch($filter['uitgavedatummodifier']) {
                case '=':
                    $qb->andWhere($alias . '.uitgavedatum = :uitgavedatum');
                    break;
                case '>=':
                    $qb->andWhere($alias . '.uitgavedatum >= :uitgavedatum');
                    break;
                case '<=':
                    $qb->andWhere($alias . '.uitgavedatum <= :uitgavedatum');
                    break;
            }
            $qb->setParameter('uitgavedatum', $filter['uitgavedatum']);
        }

        if ($filter['uitgavecount'] !== null) {
            switch($filter['uitgavecountmodifier']) {
                case '=':
                    $qb->andWhere($alias . '.uitgavecount = :uitgavecount');
                    break;
                case '>=':
                    $qb->andWhere($alias . '.uitgavecount >= :uitgavecount');
                    break;
                case '<=':
                    $qb->andWhere($alias . '.uitgavecount <= :uitgavecount');
                    break;
            }
            $qb->setParameter('uitgavecount', $filter['uitgavecount']);
        }

        if ($filter['donderdag'] !== null) {
            $qb->andWhere($alias . '.donderdag = :donderdag');
            $qb->setParameter('donderdag', $filter['donderdag']);
        }
        if ($filter['vrijdag'] !== null) {
            $qb->andWhere($alias . '.vrijdag = :vrijdag');
            $qb->setParameter('vrijdag', $filter['vrijdag']);
        }
        if ($filter['zaterdag'] !== null) {
            $qb->andWhere($alias . '.zaterdag = :zaterdag');
            $qb->setParameter('zaterdag', $filter['zaterdag']);
        }
        if ($filter['zondag'] !== null) {
            $qb->andWhere($alias . '.zondag = :zondag');
            $qb->setParameter('zondag', $filter['zondag']);
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