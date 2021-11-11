<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity
 * @ORM\Table(name="Registration", uniqueConstraints={@ORM\UniqueConstraint(name="lien", columns={"event_id", "participant_id"})})
 * @UniqueEntity(fields={"event", "participant"})
 */
// Avec Authentification
//#[ApiResource(attributes: ["security" => "is_granted('ROLE_USER')"])]
// Sans Authentification
#[ApiResource]
class Registration
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Event::class, fetch="EAGER")
     * @ORM\JoinColumn(nullable=false)
     */
    private $event;

    /**
     * @ORM\ManyToOne(targetEntity=Participant::class, fetch="EAGER")
     * @ORM\JoinColumn(nullable=false)
     */
    private $participant;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $registration_date;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $cancellation_date;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEvent(): ?Event
    {
        return $this->event;
    }

    public function setEvent(?Event $event): self
    {
        $this->event = $event;

        return $this;
    }

    public function getParticipant(): ?Participant
    {
        return $this->participant;
    }

    public function setParticipant(?Participant $participant): self
    {
        $this->participant = $participant;

        return $this;
    }

    public function getRegistrationDate(): ?\DateTimeInterface
    {
        return $this->registration_date;
    }

    public function setRegistrationDate(?\DateTimeInterface $registration_date): self
    {
        $this->registration_date = $registration_date;

        return $this;
    }

    public function getCancellationDate(): ?\DateTimeInterface
    {
        return $this->cancellation_date;
    }

    public function setCancellationDate(?\DateTimeInterface $cancellation_date): self
    {
        $this->cancellation_date = $cancellation_date;

        return $this;
    }
}
