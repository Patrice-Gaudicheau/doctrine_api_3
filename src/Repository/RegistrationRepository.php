<?php

namespace App\Repository;

use App\Entity\Registration;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Registration|null find($id, $lockMode = null, $lockVersion = null)
 * @method Registration|null findOneBy(array $criteria, array $orderBy = null)
 * @method Registration[]    findAll()
 * @method Registration[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RegistrationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Registration::class);
    }

    // ------------------------------------------------------
    // Nombre de Participant inscrits à un Event
    public function RegistrationParticipantTotal($event_id)
    {
        return $this->createQueryBuilder('r')
            ->select('count(r.id)')
            ->where('r.event = :event_id')
            ->setParameter('event_id', $event_id)
            ->getQuery()
            ->getResult();
    }
}
