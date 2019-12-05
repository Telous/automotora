<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RegistroRepository")
 */
class Registro
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $fecha;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $comentarios;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Administrador", inversedBy="registros")
     * @ORM\JoinColumn(nullable=false)
     */
    private $administrador;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Cliente", inversedBy="registros")
     * @ORM\JoinColumn(nullable=false)
     */
    private $cliente;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Vehiculo", mappedBy="registro")
     */
    private $vehiculos;

    public function __construct()
    {
        $this->vehiculos = new ArrayCollection();
    }

    public function __toString() {
        return $this->vehiculos;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFecha(): ?\DateTimeInterface
    {
        return $this->fecha;
    }

    public function setFecha(\DateTimeInterface $fecha): self
    {
        $this->fecha = $fecha;

        return $this;
    }

    public function getComentarios(): ?string
    {
        return $this->comentarios;
    }

    public function setComentarios(?string $comentarios): self
    {
        $this->comentarios = $comentarios;

        return $this;
    }

    public function getAdministrador(): ?Administrador
    {
        return $this->administrador;
    }

    public function setAdministrador(?Administrador $administrador): self
    {
        $this->administrador = $administrador;

        return $this;
    }

    public function getCliente(): ?Cliente
    {
        return $this->cliente;
    }

    public function setCliente(?Cliente $cliente): self
    {
        $this->cliente = $cliente;

        return $this;
    }

    /**
     * @return Collection|Vehiculo[]
     */
    public function getVehiculos(): Collection
    {
        return $this->vehiculos;
    }

    public function addVehiculo(Vehiculo $vehiculo): self
    {
        if (!$this->vehiculos->contains($vehiculo)) {
            $this->vehiculos[] = $vehiculo;
            $vehiculo->setRegistro($this);
        }

        return $this;
    }

    public function removeVehiculo(Vehiculo $vehiculo): self
    {
        if ($this->vehiculos->contains($vehiculo)) {
            $this->vehiculos->removeElement($vehiculo);
            // set the owning side to null (unless already changed)
            if ($vehiculo->getRegistro() === $this) {
                $vehiculo->setRegistro(null);
            }
        }

        return $this;
    }
}
