<?php

namespace App\Entity;

use App\Repository\OtazkaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OtazkaRepository::class)
 */
class Otazka
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $otazka;

    /**
     * @ORM\OneToMany(targetEntity=Odpoved::class, mappedBy="otazka")
     */
    private $odpovedi;

    /**
     * @ORM\ManyToOne(targetEntity=Kviz::class, inversedBy="otazky")
     * @ORM\JoinColumn(nullable=false)
     */
    private $kviz;

    /**
     * @var boolean
     */
    private $jeZodpovezenaSpravne = FALSE;

    public function __construct()
    {
        $this->odpovedi = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOtazka(): ?string
    {
        return $this->otazka;
    }

    public function setOtazka(string $otazka): self
    {
        $this->otazka = $otazka;

        return $this;
    }

    /**
     * @return Collection|Odpoved[]
     */
    public function getOdpovedi(): Collection
    {
        return $this->odpovedi;
    }

    public function addOdpovedi(Odpoved $odpovedi): self
    {
        if (!$this->odpovedi->contains($odpovedi)) {
            $this->odpovedi[] = $odpovedi;
            $odpovedi->setOtazka($this);
        }

        return $this;
    }

    public function removeOdpovedi(Odpoved $odpovedi): self
    {
        if ($this->odpovedi->removeElement($odpovedi)) {
            // set the owning side to null (unless already changed)
            if ($odpovedi->getOtazka() === $this) {
                $odpovedi->setOtazka(null);
            }
        }

        return $this;
    }

    public function getKviz(): ?Kviz
    {
        return $this->kviz;
    }

    public function setKviz(?Kviz $kviz): self
    {
        $this->kviz = $kviz;

        return $this;
    }

    public function getJeZodpovezenaSpravne(): bool
    {
        return $this->jeZodpovezenaSpravne;
    }

    public function setJeZodpovezenaSpravne(bool $jeZodpovezenaSpravne): self
    {
        $this->jeZodpovezenaSpravne = $jeZodpovezenaSpravne;

        return $this;
    }

    public function __toString()
    {
        return $this->otazka;
    }
}
