<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\VehiculoRepository")
 */
class Vehiculo
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", unique=true, length=255)
     */
    private $chasis;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $marca;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $modelo;

    /**
     * @ORM\Column(type="smallint")
     * @Assert\Length(
     *      min = 4,
     *      max = 4
     * )
     */
    private $year;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\RegistroVehiculo", mappedBy="vehiculo", cascade={"persist", "remove"}, orphanRemoval=true)
     */
    private $registro;

    public function __construct()
    {
        $this->registro = new ArrayCollection();
    }

    public function __toString() {

        $test = $this->marca." ".$this->modelo;

        return $test;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getChasis(): ?string
    {
        return $this->chasis;
    }

    public function setChasis(string $chasis): self
    {
        $this->chasis = $chasis;

        return $this;
    }

    public function getMarca(): ?string
    {
        return $this->marca;
    }

    public function setMarca(string $marca): self
    {
        $this->marca = $marca;

        return $this;
    }

    public function getModelo(): ?string
    {
        return $this->modelo;
    }

    public function setModelo(string $modelo): self
    {
        $this->modelo = $modelo;

        return $this;
    }

    public function getYear(): ?int
    {
        return $this->year;
    }

    public function setYear(int $year): self
    {
        $this->year = $year;

        return $this;
    }

    /**
     * @return Collection|RegistroVehiculo[]
     */
    public function getRegistro(): Collection
    {
        return $this->registro;
    }

    public function addRegistro(RegistroVehiculo $registro): self
    {
        if (!$this->registro->contains($registro)) {
            $this->registro[] = $registro;
            $registro->setVehiculo($this);
        }

        return $this;
    }

    public function removeRegistro(RegistroVehiculo $registro): self
    {
        if ($this->registro->contains($registro)) {
            $this->registro->removeElement($registro);
            // set the owning side to null (unless already changed)
            if ($registro->getVehiculo() === $this) {
                $registro->setVehiculo(null);
            }
        }

        return $this;
    }

}
