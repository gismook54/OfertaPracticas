<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Modalidad
 *
 * @ORM\Table(name="modalidad", indexes={@ORM\Index(name="FK_modalidad_estatus", columns={"id_estatus"})})
 * @ORM\Entity
 */
class Modalidad
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_modalidad", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idModalidad;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=50, nullable=false)
     */
    private $descripcion;

    /**
     * @var \Estatus
     *
     * @ORM\ManyToOne(targetEntity="Estatus")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_estatus", referencedColumnName="id_estatus")
     * })
     */
    private $idEstatus;

    public function getIdModalidad(): ?int
    {
        return $this->idModalidad;
    }

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(string $descripcion): self
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    public function getIdEstatus(): ?Estatus
    {
        return $this->idEstatus;
    }

    public function setIdEstatus(?Estatus $idEstatus): self
    {
        $this->idEstatus = $idEstatus;

        return $this;
    }


}
