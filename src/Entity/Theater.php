<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use App\Entity\Show;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TheaterRepository")
 * @ORM\Table(name="theaters")
 * @ApiResource
 */
class Theater
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Assert\NotBlank()
     * @ORM\Column(type="string", length=255)
     */
    private $address;

    /**
     * @Assert\NotBlank()
     * @ORM\Column(type="integer")
     */
    private $capacity;

    /**
     * @Assert\NotBlank()
     * @ORM\Column(type="integer")
     */
    private $administrator;

    /**
     * @var Show[] Available shows for this theater.
     *
     * @ORM\OneToMany(targetEntity="Show", mappedBy="theater")
     */
    private $shows;

    /**
     * theater constructor.
     */
    public function __construct()
    {
        $this->shows = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getCapacity(): ?int
    {
        return $this->capacity;
    }

    public function setCapacity(int $capacity): self
    {
        $this->capacity = $capacity;

        return $this;
    }

    public function getAdministrator(): ?int
    {
        return $this->administrator;
    }

    public function setAdministrator(int $administrator): self
    {
        $this->administrator = $administrator;

        return $this;
    }

    /**
     * @return Collection|Show[]
     */
    public function getShows(): Collection
    {
        return $this->shows;
    }
}
