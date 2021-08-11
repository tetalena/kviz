<?php

namespace App\Entity;

use App\Repository\OdpovedRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OdpovedRepository::class)
 */
class Odpoved
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $odpoved;

    /**
     * @ORM\ManyToOne(targetEntity=Otazka::class, inversedBy="odpovedi")
     */
    private $otazka;

    /**
     * @ORM\Column(type="boolean", options={"default" : false})
     */
    private $jeSpravna;

    /**
     * @var boolean
     */
    private $jeVybrana = FALSE;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOdpoved(): ?string
    {
        return $this->odpoved;
    }

    public function setOdpoved(string $odpoved): self
    {
        $this->odpoved = $odpoved;

        return $this;
    }

    public function getOtazka(): ?Otazka
    {
        return $this->otazka;
    }

    public function setOtazka(?Otazka $otazka): self
    {
        $this->otazka = $otazka;

        return $this;
    }

    public function getJeSpravna(): bool
    {
        return $this->jeSpravna;
    }

    public function setJeSpravna(bool $jeSpravna): self
    {
        $this->jeSpravna = $jeSpravna;

        return $this;
    }

    public function getjeVybrana(): bool
    {
        return $this->jeVybrana;
    }

    public function setjeVybrana(bool $jeVybrana): self
    {
        $this->jeVybrana = $jeVybrana;

        return $this;
    }
}
