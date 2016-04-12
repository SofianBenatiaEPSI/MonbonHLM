<?php

namespace MonbonHLM\DashboardBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * AnnonceRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class AnnonceRepository extends EntityRepository
{
    public function Recupererannonce($page=1, $maxperpage=6) {
        $query = $this->createQueryBuilder('i')
            ->addOrderBy('i.id', 'DESC')
            ->getQuery()
            ->setMaxResults($maxperpage);
        $query->setFirstResult(($page-1) * $maxperpage)
            ->setMaxResults($maxperpage);
        return $query->getResult();
    }

    public function countAnnonceTotal()
    {
        $qb = $this->createQueryBuilder('k');
        $qb->select('count(k)');

        $totalentreprises = $qb->getQuery()->getSingleScalarResult();
        return $totalentreprises;
    }

    public function RecupererAnnonceParId($id)
    {
        $entreprise = parent::find($id);
        return $entreprise;
    }
}
