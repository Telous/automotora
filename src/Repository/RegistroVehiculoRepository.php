<?php

namespace App\Repository;

use App\Entity\RegistroVehiculo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method RegistroVehiculo|null find($id, $lockMode = null, $lockVersion = null)
 * @method RegistroVehiculo|null findOneBy(array $criteria, array $orderBy = null)
 * @method RegistroVehiculo[]    findAll()
 * @method RegistroVehiculo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RegistroVehiculoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RegistroVehiculo::class);
    }

    // /**
    //  * @return RegistroVehiculo[] Returns an array of RegistroVehiculo objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?RegistroVehiculo
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
