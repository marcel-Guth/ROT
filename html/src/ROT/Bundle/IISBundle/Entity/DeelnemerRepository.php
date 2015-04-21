<?php

namespace ROT\Bundle\IISBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;

class DeelnemerRepository extends EntityRepository {
    public function applyFilterToQueryBuilder($filter, $alias, QueryBuilder $qb) {
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
        if ($filter['adres'] !== null) {
            $qb->andWhere($alias . '.adres LIKE :adres');
            $qb->setParameter('adres', '%' . $filter['adres'] . '%');
        }
        if ($filter['huisnummer'] !== null) {
            $qb->andWhere($alias . '.huisnummer LIKE :huisnummer');
            $qb->setParameter('huisnummer', '%' . $filter['huisnummer'] . '%');
        }
        if ($filter['woonplaats'] !== null) {
            $qb->andWhere($alias . '.woonplaats LIKE :woonplaats');
            $qb->setParameter('woonplaats', '%' . $filter['woonplaats'] . '%');
        }
        if ($filter['huisnummer'] !== null) {
            $qb->andWhere($alias . '.huisnummer LIKE :huisnummer');
            $qb->setParameter('huisnummer', '%' . $filter['huisnummer'] . '%');
        }
        if ($filter['huisnummer'] !== null) {
            $qb->andWhere($alias . '.huisnummer LIKE :huisnummer');
            $qb->setParameter('huisnummer', '%' . $filter['huisnummer'] . '%');
        }
        if ($filter['huisnummer'] !== null) {
            $qb->andWhere($alias . '.huisnummer LIKE :huisnummer');
            $qb->setParameter('huisnummer', '%' . $filter['huisnummer'] . '%');
        }
    }
}