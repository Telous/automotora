<?php

namespace App\Entity;

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
     * @ORM\ManyToOne(targetEntity="App\Entity\Registro", inversedBy="vehiculos")
     */
    private $registro;

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

    public function getRegistro(): ?Registro
    {
        return $this->registro;
    }

    public function setRegistro(?Registro $registro): self
    {
        $this->registro = $registro;

        return $this;
    }
}
