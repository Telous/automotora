<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RegistroVehiculoRepository")
 */
class RegistroVehiculo
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Registro", inversedBy="vehiculo")
     */
    private $registro;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Vehiculo", inversedBy="registro")
     */
    private $vehiculo;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRegistro(): ?Registro
    {
        return $this->registro;
    }

    public function setRegistro(?Registro $registro): self
    {
        $this->registro = $registro;

        return $this;
    }

    public function getVehiculo(): ?Vehiculo
    {
        return $this->vehiculo;
    }

    public function setVehiculo(?Vehiculo $vehiculo): self
    {
        $this->vehiculo = $vehiculo;

        return $this;
    }
}
