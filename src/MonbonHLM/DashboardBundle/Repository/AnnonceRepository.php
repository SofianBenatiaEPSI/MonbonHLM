<?php

namespace MonbonHLM\DashboardBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;

/**
 * AnnonceRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class AnnonceRepository extends EntityRepository
{
    public function Recupererannonce($page=1, $maxperpage=9) {
        $query = $this->createQueryBuilder('i')
            ->addOrderBy('i.id', 'DESC')
            ->getQuery()
            ->setMaxResults($maxperpage);
        $query->setFirstResult(($page-1) * $maxperpage)
            ->setMaxResults($maxperpage);
        return $query->getResult();
    }

    public function Recupererannoncequartier($idquartier, $page=1, $maxperpage=9) {
        $query = $this->createQueryBuilder('i')
            ->select('i')
            ->where('i.quartier = :identifier')
            ->addOrderBy('i.id', 'DESC')
            ->getQuery()
            ->setMaxResults($maxperpage)
            ->setParameter('identifier', $idquartier);
        $query->setFirstResult(($page-1) * $maxperpage)
            ->setMaxResults($maxperpage);
        return $query->getResult();
    }

    public function Recupererannoncebailleurs($idbailleur, $page=1, $maxperpage=9) {
        $query = $this->createQueryBuilder('i')
            ->select('i')
            ->where('i.reference_bailleur = :identifier')
            ->addOrderBy('i.id', 'DESC')
            ->getQuery()
            ->setMaxResults($maxperpage)
            ->setParameter('identifier', $idbailleur);
        $query->setFirstResult(($page-1) * $maxperpage)
            ->setMaxResults($maxperpage);
        return $query->getResult();
    }

    public function Recupererannonceaccueil($page=1, $maxperpage=12) {
        $query = $this->createQueryBuilder('i')
            ->addOrderBy('i.id', 'DESC')
            ->getQuery()
            ->setMaxResults($maxperpage);
        $query->setFirstResult(($page-1) * $maxperpage)
            ->setMaxResults($maxperpage);
        return $query->getResult();
    }

    public function countAnnonceQuartierTotal($idquartier)
    {
        $qb = $this->createQueryBuilder('k');
        $qb->select('count(k)')
        ->where('k.quartier = :identifier')
            ->setParameter('identifier', $idquartier);

        $totalannonces = $qb->getQuery()->getSingleScalarResult();
        return $totalannonces;
    }

    public function countAnnonceBailleursTotal($idbailleurs)
    {
        $qb = $this->createQueryBuilder('k');
        $qb->select('count(k)')
            ->where('k.reference_bailleur = :identifier')
            ->setParameter('identifier', $idbailleurs);

        $totalannonces = $qb->getQuery()->getSingleScalarResult();
        return $totalannonces;
    }

    public function countAnnonceTotal()
    {
        $qb = $this->createQueryBuilder('k');
        $qb->select('count(k)');

        $totalannonces = $qb->getQuery()->getSingleScalarResult();
        return $totalannonces;
    }

    public function RecupererAnnonceParId($id)
    {
        $annonce = parent::find($id);
        return $annonce;
    }

    public function Auteurannonce($id) {
        $query = $this->createQueryBuilder('n')
            ->select('n')
            ->where('n.auteur = :identifier')
            ->setParameter('identifier', $id)
            ->getQuery();
        $query->setFirstResult(0);
        return $query->getOneOrNullResult();
    }


    public function Recupererannoncetypelogement($idtypelogement, $page=1, $maxperpage=6) {
        $query = $this->createQueryBuilder('i')
            ->select('i')
            ->where('i.type_logement = :identifier')
            ->addOrderBy('i.id', 'DESC')
            ->getQuery()
            ->setMaxResults($maxperpage)
            ->setParameter('identifier', $idtypelogement);
        $query->setFirstResult(($page-1) * $maxperpage)
            ->setMaxResults($maxperpage);
        return $query->getResult();
    }

    public function countAnnonceTypelogementTotal($idtypelogement)
    {
        $qb = $this->createQueryBuilder('k');
        $qb->select('count(k)')
            ->where('k.type_logement = :identifier')
            ->setParameter('identifier', $idtypelogement);

        $totalannonces = $qb->getQuery()->getSingleScalarResult();
        return $totalannonces;
    }

    public function Recuperertypelogement($page=1, $maxperpage=6) {
        $query = $this->createQueryBuilder('i')
            ->addOrderBy('i.id', 'ASC')
            ->getQuery()
            ->setMaxResults($maxperpage);
        $query->setFirstResult(($page-1) * $maxperpage)
            ->setMaxResults($maxperpage);
        return $query->getResult();
    }

    public function counttypelogementTotal()
    {
        $qb = $this->createQueryBuilder('k');
        $qb->select('count(k)');

        $totaltypelogement = $qb->getQuery()->getSingleScalarResult();
        return $totaltypelogement;
    }

    public function RecuperertypelogementParId($id)
    {
        $typelogement = parent::find($id);
        return $typelogement;
    }

    public function Recupererannonceadmin($page=1, $maxperpage=30) {
        $query = $this->createQueryBuilder('i')
            ->addOrderBy('i.id', 'DESC')
            ->getQuery()
            ->setMaxResults($maxperpage);
        $query->setFirstResult(($page-1) * $maxperpage)
            ->setMaxResults($maxperpage);
        return $query->getResult();
    }
}
