<?php

namespace App\Entity;

use App\Repository\CarRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: CarRepository::class)]
class Car
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[Assert\NotBlank]
    #[ORM\Column(type: 'string', length: 255)]
    private $Brand;

    #[Assert\NotBlank]
    #[ORM\Column(type: 'string', length: 255)]
    private $Model;

    #[Assert\NotBlank]
    #[ORM\Column(type: 'integer')]
    private $ProductionYear;

    #[Assert\NotBlank]
    #[ORM\Column(type: 'integer')]
    private $HorsePower;

    #[ORM\Column(type: 'string', length: 255)]
    private $ImagePath;

    #[ORM\Column(type: 'string', length: 1000, nullable: true)]
    private $Description;

    #[ORM\ManyToMany(targetEntity: User::class, mappedBy: 'Cars')]
    private $users;

    public function __construct()
    {
        $this->users = new ArrayCollection();
    }
    

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBrand(): ?string
    {
        return $this->Brand;
    }

    public function setBrand(string $Brand): self
    {
        $this->Brand = $Brand;

        return $this;
    }

    public function getModel(): ?string
    {
        return $this->Model;
    }

    public function setModel(string $Model): self
    {
        $this->Model = $Model;

        return $this;
    }

    public function getProductionYear(): ?int
    {
        return $this->ProductionYear;
    }

    public function setProductionYear(int $ProductionYear): self
    {
        $this->ProductionYear = $ProductionYear;

        return $this;
    }

    public function getHorsePower(): ?int
    {
        return $this->HorsePower;
    }

    public function setHorsePower(int $HorsePower): self
    {
        $this->HorsePower = $HorsePower;

        return $this;
    }

    public function getImagePath(): ?string
    {
        return $this->ImagePath;
    }

    public function setImagePath(string $ImagePath): self
    {
        $this->ImagePath = $ImagePath;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(?string $Description): self
    {
        $this->Description = $Description;

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users[] = $user;
            $user->addCar($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->removeElement($user)) {
            $user->removeCar($this);
        }

        return $this;
    }
}
