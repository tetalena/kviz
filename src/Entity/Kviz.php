<?php

namespace App\Entity;

use App\Repository\KvizRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=KvizRepository::class)
 */
class Kviz
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
    private $nazev;

    /**
     * @ORM\Column(type="string", length=100, unique=true)
     */
    private $slug;

    /**
     * @ORM\Column(type="text")
     */
    private $popis;

    /**
     * @ORM\OneToMany(targetEntity=Otazka::class, mappedBy="kviz")
     */
    private $otazky;

    /**
     * @var Vysledek|null
     */
    private $vysledek = NULL;

    public function __construct()
    {
        $this->otazky = new ArrayCollection();
        $this->vysledeks = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNazev(): ?string
    {
        return $this->nazev;
    }

    public function setNazev(string $nazev): self
    {
        $this->nazev = $nazev;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getPopis(): ?string
    {
        return $this->popis;
    }

    public function setPopis(string $popis): self
    {
        $this->popis = $popis;

        return $this;
    }

    /**
     * @return Collection|Otazka[]
     */
    public function getOtazky(): Collection
    {
        return $this->otazky;
    }

    public function addOtazky(Otazka $otazky): self
    {
        if (!$this->otazky->contains($otazky)) {
            $this->otazky[] = $otazky;
            $otazky->setKviz($this);
        }

        return $this;
    }

    public function removeOtazky(Otazka $otazky): self
    {
        if ($this->otazky->removeElement($otazky)) {
            // set the owning side to null (unless already changed)
            if ($otazky->getKviz() === $this) {
                $otazky->setKviz(null);
            }
        }

        return $this;
    }

    public function getVysledek()
    {
        return $this->vysledek;
    }

    public function setVysledky(Vysledek $vysledek)
    {
        $this->vysledek = $vysledek;
    }

    public function __toString()
    {
        return $this->nazev;
    }
}
