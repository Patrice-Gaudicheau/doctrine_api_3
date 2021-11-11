<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity
 * @ORM\Table(name="Event", uniqueConstraints={@ORM\UniqueConstraint(name="lien", columns={"date_start", "date_end"})})
 * @UniqueEntity(fields={"date_start", "date_end"})
 */
// Avec Authentification
//#[ApiResource(attributes: ["security" => "is_granted('ROLE_USER')"])]
// Sans Authentification
#[ApiResource]
class Event
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_start;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_end;

    /**
     * @ORM\Column(type="integer")
     */
    private $participant_max;


    public function getId(): ?int
    {
        return $this->id;
    }


    public function getDateStart(): ?\DateTimeInterface
    {
        return $this->date_start;
    }

    public function setDateStart(?\DateTimeInterface $date_start): self
    {
        $this->date_start = $date_start;

        return $this;
    }

    public function getDateEnd(): ?\DateTimeInterface
    {
        return $this->date_end;
    }

    public function setDateEnd(?\DateTimeInterface $date_end): self
    {
        $this->date_end = $date_end;

        return $this;
    }

    public function getParticipantMax(): ?int
    {
        return $this->participant_max;
    }

    public function setParticipantMax(?int $participant_max): self
    {
        $this->participant_max = $participant_max;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }
}
