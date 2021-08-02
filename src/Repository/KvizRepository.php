<?php

namespace App\Repository;

use App\Entity\Kviz;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Kviz|null find($id, $lockMode = null, $lockVersion = null)
 * @method Kviz|null findOneBy(array $criteria, array $orderBy = null)
 * @method Kviz[]    findAll()
 * @method Kviz[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class KvizRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Kviz::class);
    }

    // /**
    //  * @return Kviz[] Returns an array of Kviz objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('k')
            ->andWhere('k.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('k.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Kviz
    {
        return $this->createQueryBuilder('k')
            ->andWhere('k.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
