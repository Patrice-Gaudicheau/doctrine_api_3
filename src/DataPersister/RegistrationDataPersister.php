<?php

namespace App\DataPersister;

use ApiPlatform\Core\DataPersister\ContextAwareDataPersisterInterface;
use App\Entity\Registration;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\EventRepository;
use App\Repository\RegistrationRepository;

class RegistrationDataPersister implements ContextAwareDataPersisterInterface
{
    public function __construct(
        EntityManagerInterface $entityManager,
        RegistrationRepository $RegistrationRepository
    ) {
        $this->entityManager = $entityManager;
        $this->RegistrationRepository = $RegistrationRepository;
    }

    public function supports($data, array $context = []): bool
    {
        return $data instanceof Registration;
    }

    public function persist($data, array $context = [])
    {
        // Nombre de Participant Max pour l'Event
        $eventParticipantMax = $data->getEvent()->getParticipantMax();
        // Event ID
        $eventId = $data->getEvent()->getId();
        // Compter le nombre de Participant inscrit à cet Event
        $participantNumberAlreadyRegistered = $this->RegistrationRepository->RegistrationParticipantTotal($eventId);
        $participantNumberAlreadyRegistered = $participantNumberAlreadyRegistered[0][1];
        // Si la limite n'est pas atteinte
        if ($participantNumberAlreadyRegistered <= $eventParticipantMax) {
            $this->entityManager->persist($data);
            $this->entityManager->flush();
        }
    }

    public function remove($data, array $context = [])
    {
        $this->entityManager->remove($data);
        $this->entityManager->flush();
    }
}
