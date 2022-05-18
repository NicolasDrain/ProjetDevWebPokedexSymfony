<?php

namespace App\Repository;

use App\Entity\PokemonDresseur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PokemonDresseur>
 *
 * @method PokemonDresseur|null find($id, $lockMode = null, $lockVersion = null)
 * @method PokemonDresseur|null findOneBy(array $criteria, array $orderBy = null)
 * @method PokemonDresseur[]    findAll()
 * @method PokemonDresseur[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PokemonDresseurRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PokemonDresseur::class);
    }

    public function add(PokemonDresseur $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(PokemonDresseur $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return PokemonDresseur[] Returns an array of PokemonDresseur objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('p.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?PokemonDresseur
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
