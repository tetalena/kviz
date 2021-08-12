<?php

namespace App\Entity;

use App\Repository\VysledekRepository;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity(repositoryClass=VysledekRepository::class)
 */
class Vysledek
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="vysledeks")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\Column(type="float")
     */
    private $procent;

    /**
     * @ORM\OneToOne(targetEntity=Kviz::class, inversedBy="vysledek", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $kviz;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getProcent(): ?float
    {
        return $this->procent;
    }

    public function setProcent(float $procent): self
    {
        $this->procent = $procent;

        return $this;
    }

    public function getKviz(): ?Kviz
    {
        return $this->kviz;
    }

    public function setKviz(Kviz $kviz): self
    {
        $this->kviz = $kviz;

        return $this;
    }
}
