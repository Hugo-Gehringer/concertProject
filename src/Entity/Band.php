<?php

namespace App\Entity;

use App\Repository\BandRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BandRepository::class)
 */
class Band
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
    public $name;

    /**
     * @ORM\OneToMany(targetEntity=Member::class, mappedBy="band", orphanRemoval=false)
     */
    public $members;

    /**
     * @ORM\OneToMany(targetEntity=Concert::class, mappedBy="band", orphanRemoval=false)
     */
    public $concerts;

    /**
     * @ORM\Column(type="string", length=30)
     */
    public $style;

    /**
     * @ORM\Column(type="string", length=30, nullable=true)
     */
    public $lastAlbumName;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    public $yearOfCreation;

    public function __construct()
    {
        $this->members = new ArrayCollection();
        $this->concerts = new ArrayCollection();
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

    /**
     * @return Collection|member[]
     */
    public function getMembers(): Collection
    {
        return $this->members;
    }

    public function addMember(member $member): self
    {
        if (!$this->members->contains($member)) {
            $this->members[] = $member;
            $member->setBand($this);
        }

        return $this;
    }

    public function removeMember(member $member): self
    {
        if ($this->members->removeElement($member)) {
            // set the owning side to null (unless already changed)
            if ($member->getBand() === $this) {
                $member->setBand(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Concert[]
     */
    public function getConcerts(): Collection
    {
        return $this->concerts;
    }

    public function addShow(Concert $show): self
    {
        if (!$this->concerts->contains($show)) {
            $this->concerts[] = $show;
            $show->setBand($this);
        }

        return $this;
    }

    public function removeShow(Concert $show): self
    {
        if ($this->concerts->removeElement($show)) {
            // set the owning side to null (unless already changed)
            if ($show->getBand() === $this) {
                $show->setBand(null);
            }
        }

        return $this;
    }

    public function getStyle(): ?string
    {
        return $this->style;
    }

    public function setStyle(string $style): self
    {
        $this->style = $style;

        return $this;
    }

    public function getLastAlbumName(): ?string
    {
        return $this->lastAlbumName;
    }

    public function setLastAlbumName(?string $lastAlbumName): self
    {
        $this->lastAlbumName = $lastAlbumName;

        return $this;
    }

    public function getYearOfCreation(): ?\DateTimeInterface
    {
        return $this->yearOfCreation;
    }

    public function setYearOfCreation(?\DateTimeInterface $yearOfCreation): self
    {
        $this->yearOfCreation = $yearOfCreation;

        return $this;
    }
}
