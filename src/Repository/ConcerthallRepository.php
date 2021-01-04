<?php

namespace App\Repository;

use App\Entity\Concerthall;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Concerthall|null find($id, $lockMode = null, $lockVersion = null)
 * @method Concerthall|null findOneBy(array $criteria, array $orderBy = null)
 * @method Concerthall[]    findAll()
 * @method Concerthall[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ConcerthallRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Concerthall::class);
    }

    // /**
    //  * @return Concerthall[] Returns an array of Concerthall objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Concerthall
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
