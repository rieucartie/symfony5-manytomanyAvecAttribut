<?php

namespace App\Repository;

use App\Entity\ArticleCompetence;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ArticleCompetence|null find($id, $lockMode = null, $lockVersion = null)
 * @method ArticleCompetence|null findOneBy(array $criteria, array $orderBy = null)
 * @method ArticleCompetence[]    findAll()
 * @method ArticleCompetence[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArticleCompetenceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ArticleCompetence::class);
    }

    // /**
    //  * @return ArticleCompetence[] Returns an array of ArticleCompetence objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ArticleCompetence
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
