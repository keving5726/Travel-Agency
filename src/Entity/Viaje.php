<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\ViajeRepository")
 */
class Viaje
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     * @Assert\NotBlank(message="Este valor no debe estar vacio.")
     * @Assert\Type(type="string", message="El valor debe ser de tipo string.")
     */
    private $codigo;

    /**
     * @Assert\NotBlank(message="Este valor no debe estar vacio.")
     * @ORM\Column(type="integer")
     */
    private $plazas;

    /**
     * @Assert\NotBlank(message="Este valor no debe estar vacio.")
     * @ORM\Column(type="string", length=180)
     */
    private $origen;

    /**
     * @Assert\NotBlank(message="Este valor no debe estar vacio.")
     * @ORM\Column(type="string", length=180)
     */
    private $destino;

    /**
     * @Assert\NotBlank(message="Este valor no debe estar vacio.")
     * @Assert\Range(min=1, minMessage="El precio debe ser superior a 0.")
     * @Assert\Type(type="float")
     * @ORM\Column(type="float")
     */
    private $precio;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodigo(): ?string
    {
        return $this->codigo;
    }

    public function setCodigo(string $codigo): self
    {
        $this->codigo = $codigo;

        return $this;
    }

    public function getPlazas(): ?string
    {
        return $this->plazas;
    }

    public function setPlazas(string $plazas): self
    {
        $this->plazas = $plazas;

        return $this;
    }

    public function getOrigen(): ?string
    {
        return $this->origen;
    }

    public function setOrigen(string $origen): self
    {
        $this->origen = $origen;

        return $this;
    }

    public function getDestino(): ?string
    {
        return $this->destino;
    }

    public function setDestino(string $destino): self
    {
        $this->destino = $destino;

        return $this;
    }

    public function getPrecio(): ?float
    {
        return $this->precio;
    }

    public function setPrecio(float $precio): self
    {
        $this->precio = $precio;

        return $this;
    }
}
