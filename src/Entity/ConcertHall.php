<?php

namespace App\Entity;

use App\Repository\ConcertHallRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ConcertHallRepository::class)
 */
class ConcertHall
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=60, nullable=true)
     */
    private $city;

    /**
     * @ORM\OneToMany(targetEntity=hall::class, mappedBy="concertHall")
     */
    private $halls;

    public function __construct()
    {
        $this->halls = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(?string $city): self
    {
        $this->city = $city;

        return $this;
    }

    /**
     * @return Collection|hall[]
     */
    public function getHalls(): Collection
    {
        return $this->halls;
    }

    public function addHall(hall $hall): self
    {
        if (!$this->halls->contains($hall)) {
            $this->halls[] = $hall;
            $hall->setConcertHall($this);
        }

        return $this;
    }

    public function removeHall(hall $hall): self
    {
        if ($this->halls->removeElement($hall)) {
            // set the owning side to null (unless already changed)
            if ($hall->getConcertHall() === $this) {
                $hall->setConcertHall(null);
            }
        }

        return $this;
    }
}
