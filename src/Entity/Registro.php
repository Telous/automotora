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
     * @ORM\OneToMany(targetEntity="App\Entity\RegistroVehiculo", mappedBy="registro", cascade={"persist", "remove"}, orphanRemoval=true)
     */
    private $vehiculo;

    public function __construct()
    {
        $this->vehiculo = new ArrayCollection();
    }

    public function __toString() {
        return $this->vehiculos;
    }

    public function getId(): ?int
    {
        return $this->id;
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
     * @return Collection|RegistroVehiculo[]
     */
    public function getVehiculo(): Collection
    {
        return $this->vehiculo;
    }

    public function addVehiculo(RegistroVehiculo $vehiculo): self
    {
        if (!$this->vehiculo->contains($vehiculo)) {
            $this->vehiculo[] = $vehiculo;
            $vehiculo->setRegistro($this);
        }

        return $this;
    }

    public function removeVehiculo(RegistroVehiculo $vehiculo): self
    {
        if ($this->vehiculo->contains($vehiculo)) {
            $this->vehiculo->removeElement($vehiculo);
            // set the owning side to null (unless already changed)
            if ($vehiculo->getRegistro() === $this) {
                $vehiculo->setRegistro(null);
            }
        }

        return $this;
    }
}
