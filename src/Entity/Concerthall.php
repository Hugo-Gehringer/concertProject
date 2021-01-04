<?php

namespace App\Entity;

use App\Repository\ConcerthallRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ConcerthallRepository::class)
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
     * @ORM\ManyToOne(targetEntity=hall::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $halls;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $name;

    /**
     * @ORM\Column(type="integer")
     */
    private $totalPlaces;

    /**
     * @ORM\Column(type="string", length=60)
     */
    private $city;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHalls(): ?hall
    {
        return $this->halls;
    }

    public function setHalls(?hall $halls): self
    {
        $this->halls = $halls;

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

    public function getTotalPlaces(): ?int
    {
        return $this->totalPlaces;
    }

    public function setTotalPlaces(int $totalPlaces): self
    {
        $this->totalPlaces = $totalPlaces;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

}
