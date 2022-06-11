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

    public function findPokemonDresseurUnsold($dresseur): array
    { 
        $query = $this->createQueryBuilder('p');
        $query
        ->leftJoin('App\Entity\Vente', 'v', 'WITH', 'p.id = v.id_pokemon_dresseur')
        ->andWhere('p.id_dresseur = :dresseur')
        ->andWhere($query->expr()->orX('v.statut <> :statut')->add('v.statut is NULL'))
        ->setParameter('dresseur', $dresseur)
        ->setParameter('statut', 'En cours');



        return $query->getQuery()->getResult();
    }

    public function findPokemonAvailable($dresseur): array
    { 
        $dateTime = new \DateTime("-1 hour");
        $query = $this->createQueryBuilder('p');
        $query
        ->andWhere('p.id_dresseur = :dresseur')
        ->andWhere('p.date_time_derniere_activite < :dateTime')
        ->setParameter('dresseur', $dresseur)
        ->setParameter('dateTime', $dateTime);

        return $query->getQuery()->getResult();
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
