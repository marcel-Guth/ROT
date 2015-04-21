<?php

namespace ROT\Bundle\AdminBundle\Entity;

use Doctrine\ORM\EntityRepository;

class VariableRepository extends EntityRepository
{
    function getIndexModificationTime() {
        return new \DateTime($this->getEntityManager()->createQuery("
            SELECT MAX(g.updatedAt) FROM ROTAdminBundle:Gebruiker g
        ")->getSingleScalarResult());
    }
}