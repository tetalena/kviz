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
}
