<?php

namespace App\Repository;

use App\Entity\Otazka;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Otazka|null find($id, $lockMode = null, $lockVersion = null)
 * @method Otazka|null findOneBy(array $criteria, array $orderBy = null)
 * @method Otazka[]    findAll()
 * @method Otazka[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OtazkaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Otazka::class);
    }

    // /**
    //  * @return Otazka[] Returns an array of Otazka objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Otazka
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
