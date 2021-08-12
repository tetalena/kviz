<?php

namespace App\Repository;

use App\Entity\Vysledek;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Vysledek|null find($id, $lockMode = null, $lockVersion = null)
 * @method Vysledek|null findOneBy(array $criteria, array $orderBy = null)
 * @method Vysledek[]    findAll()
 * @method Vysledek[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VysledekRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Vysledek::class);
    }

    // /**
    //  * @return Vysledek[] Returns an array of Vysledek objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('v.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Vysledek
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
