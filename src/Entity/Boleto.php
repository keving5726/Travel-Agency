<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Controller\BoletoController;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource(
 *     collectionOperations={
 *         "get",
 *         "post"={
 *             "path"="/boleto",
 *             "swagger_context" = {
 *                 "parameters" = {
 *                     {
 *                         "in" = "body",
 *                         "name" = "codigo",
 *                         "type" : "string",
 *                         "description" = "El codigo del boleto",
 *                         "required" = "true",
 *                     }
 *                 }
 *             },
 *             "controller"=BoletoController::class
 *         }
 *     },
 *     itemOperations={"get"}
 *     )
 * @ORM\Entity(repositoryClass="App\Repository\BoletoRepository")
 */
class Boleto
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Usuario")
     * @ORM\JoinColumn(nullable=false)
     */
    private $usuario;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Viaje")
     * @ORM\JoinColumn(nullable=false)
     */
    private $codigo;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsuario(): ?Usuario
    {
        return $this->usuario;
    }

    public function setUsuario(?Usuario $usuario): self
    {
        $this->usuario = $usuario;

        return $this;
    }

    public function getCodigo(): ?Boleto
    {
        return $this->codigo;
    }

    public function setCodigo(?Boleto $codigo): self
    {
        $this->codigo = $codigo;

        return $this;
    }
}
