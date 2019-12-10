<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TipoInstitucion
 *
 * @ORM\Table(name="tipo_institucion", indexes={@ORM\Index(name="FK_tipo_institucion_estatus", columns={"id_estatus"})})
 * @ORM\Entity
 */
class TipoInstitucion
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_tipo_institucion", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idTipoInstitucion;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=50, nullable=false, options={"default"="''"})
     */
    private $descripcion = '\'\'';

    /**
     * @var \Estatus
     *
     * @ORM\ManyToOne(targetEntity="Estatus")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_estatus", referencedColumnName="id_estatus")
     * })
     */
    private $idEstatus;

    public function getIdTipoInstitucion(): ?int
    {
        return $this->idTipoInstitucion;
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
