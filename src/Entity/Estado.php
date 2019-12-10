<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Estado
 *
 * @ORM\Table(name="estado", indexes={@ORM\Index(name="FK_estado_estatus", columns={"id_estatus"})})
 * @ORM\Entity
 */
class Estado
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_estado", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idEstado;

    /**
     * @var string|null
     *
     * @ORM\Column(name="estado", type="string", length=100, nullable=true, options={"default"="NULL"})
     */
    private $estado = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="estado_corto", type="string", length=100, nullable=true, options={"default"="NULL"})
     */
    private $estadoCorto = 'NULL';

    /**
     * @var \Estatus
     *
     * @ORM\ManyToOne(targetEntity="Estatus")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_estatus", referencedColumnName="id_estatus")
     * })
     */
    private $idEstatus;

    public function getIdEstado(): ?int
    {
        return $this->idEstado;
    }

    public function getEstado(): ?string
    {
        return $this->estado;
    }

    public function setEstado(?string $estado): self
    {
        $this->estado = $estado;

        return $this;
    }

    public function getEstadoCorto(): ?string
    {
        return $this->estadoCorto;
    }

    public function setEstadoCorto(?string $estadoCorto): self
    {
        $this->estadoCorto = $estadoCorto;

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
