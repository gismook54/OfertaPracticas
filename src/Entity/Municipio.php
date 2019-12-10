<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Municipio
 *
 * @ORM\Table(name="municipio", indexes={@ORM\Index(name="FK_municipio_estatus", columns={"id_estatus"}), @ORM\Index(name="FK_municipio_estado", columns={"id_estado"})})
 * @ORM\Entity
 */
class Municipio
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_municipio", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idMunicipio;

    /**
     * @var string|null
     *
     * @ORM\Column(name="municipio", type="string", length=200, nullable=true, options={"default"="NULL"})
     */
    private $municipio = 'NULL';

    /**
     * @var \Estado
     *
     * @ORM\ManyToOne(targetEntity="Estado")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_estado", referencedColumnName="id_estado")
     * })
     */
    private $idEstado;

    /**
     * @var \Estatus
     *
     * @ORM\ManyToOne(targetEntity="Estatus")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_estatus", referencedColumnName="id_estatus")
     * })
     */
    private $idEstatus;

    public function getIdMunicipio(): ?int
    {
        return $this->idMunicipio;
    }

    public function getMunicipio(): ?string
    {
        return $this->municipio;
    }

    public function setMunicipio(?string $municipio): self
    {
        $this->municipio = $municipio;

        return $this;
    }

    public function getIdEstado(): ?Estado
    {
        return $this->idEstado;
    }

    public function setIdEstado(?Estado $idEstado): self
    {
        $this->idEstado = $idEstado;

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
