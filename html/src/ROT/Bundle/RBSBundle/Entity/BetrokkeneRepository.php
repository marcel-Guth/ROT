<?php

namespace ROT\Bundle\RBSBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Query;
use Doctrine\ORM\QueryBuilder;

class BetrokkeneRepository extends EntityRepository {
    public function applyFilterToQueryBuilder($filter, $alias, QueryBuilder $qb) {
        if ($filter['organisatie'] !== null) {
            $qb->leftJoin($alias . '.organisatie', 'o');
            $qb->andWhere('o.id = :organisatie');
            $qb->setParameter('organisatie', $filter['organisatie']);
        }

        if ($filter['voornaam'] !== null) {
            $qb->andWhere($alias . '.voornaam LIKE :voornaam');
            $qb->setParameter('voornaam', '%' . $filter['voornaam'] . '%');
        }

        if ($filter['tussenvoegsel'] !== null) {
            $qb->andWhere($alias . '.tussenvoegsel LIKE :tussenvoegsel');
            $qb->setParameter('tussenvoegsel', '%' . $filter['tussenvoegsel'] . '%');
        }

        if ($filter['achternaam'] !== null) {
            $qb->andWhere($alias . '.achternaam LIKE :achternaam');
            $qb->setParameter('achternaam', '%' . $filter['achternaam'] . '%');
        }

        if ($filter['soort'] !== null) {
            $qb->andWhere($alias . '.soort LIKE :soort');
            $qb->setParameter('soort', '%' . $filter['soort'] . '%');
        }

        if ($filter['hasparkeerkaart'] !== null) {
            switch($filter['hasparkeerkaart']) {
                case 0:
                    $qb->andWhere($alias . '.parkeerkaart IS NULL');
                    break;
                case 1:
                    $qb->join($alias . '.parkeerkaart', 'p');
                    $this->getEntityManager()->getRepository('ROTPBSBundle:Parkeerkaart')->applyFilterToQueryBuilder($filter['parkeerkaart'], 'p', $qb);
                    break;
            }
        }
    }

    public function getIndexModificationTime() {
        $time = max($this->getEntityManager()->createQuery("
            SELECT MAX(b.updatedAt), MAX(p.updatedAt) FROM ROTRBSBundle:Betrokkene b
            LEFT JOIN b.parkeerkaart p
        ")->getSingleResult(Query::HYDRATE_ARRAY));

        if ($time !== null) {
            return new \DateTime($time);
        }
    }

    public function getModificationTime($id) {
        return max($this->getEntityManager()->createQuery("
            SELECT b.updatedAt b_u, p.updatedAt p_u FROM ROTRBSBundle:Betrokkene b
            LEFT JOIN b.parkeerkaart p
            WHERE b.id = :id
        ")->setParameter('id', $id)->getSingleResult(Query::HYDRATE_ARRAY));
    }
}