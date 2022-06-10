<?php

namespace App\Entity;

use App\Repository\CarRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CarRepository::class)]
class Car
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $Brand;

    #[ORM\Column(type: 'string', length: 255)]
    private $Model;

    #[ORM\Column(type: 'integer')]
    private $ProductionYear;

    #[ORM\Column(type: 'integer')]
    private $HorsePower;

    #[ORM\Column(type: 'string', length: 255)]
    private $ImagePath;

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
}
