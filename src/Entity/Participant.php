<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity
 * @ORM\Table(name="Participant", uniqueConstraints={@ORM\UniqueConstraint(name="lien", columns={"firstname", "lasname"})})
 * @UniqueEntity(fields={"firstname", "lasname"})
 */
// Avec Authentification
//#[ApiResource(attributes: ["security" => "is_granted('ROLE_USER')"])]
// Sans Authentification
#[ApiResource]
class Participant
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
    private $firstname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lasname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $phone;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLasname(): ?string
    {
        return $this->lasname;
    }

    public function setLasname(string $lasname): self
    {
        $this->lasname = $lasname;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }
}
