<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Institucion
 *
 * @ORM\Table(name="institucion", indexes={@ORM\Index(name="FK_institucion_municipio", columns={"id_municipio"}), @ORM\Index(name="FK_institucion_tipo_institucion", columns={"id_tipo_institucion"}), @ORM\Index(name="FK_institucion_estatus", columns={"id_estatus"})})
 * @ORM\Entity
 */
class Institucion
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_institucion", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idInstitucion;

    /**
     * @var string
     *
     * @ORM\Column(name="domicilio", type="string", length=250, nullable=false, options={"default"="''"})
     */
    private $domicilio = '\'\'';

    /**
     * @var string
     *
     * @ORM\Column(name="rfc", type="string", length=50, nullable=false, options={"default"="''"})
     */
    private $rfc = '\'\'';

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=200, nullable=false, options={"default"="'NULL'"})
     */
    private $nombre = '\'NULL\'';

    /**
     * @var string
     *
     * @ORM\Column(name="iesglobal", type="string", length=200, nullable=false, options={"default"="'NULL'"})
     */
    private $iesglobal = '\'NULL\'';

    /**
     * @var \Estatus
     *
     * @ORM\ManyToOne(targetEntity="Estatus")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_estatus", referencedColumnName="id_estatus")
     * })
     */
    private $idEstatus;

    /**
     * @var \Municipio
     *
     * @ORM\ManyToOne(targetEntity="Municipio")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_municipio", referencedColumnName="id_municipio")
     * })
     */
    private $idMunicipio;

    /**
     * @var \TipoInstitucion
     *
     * @ORM\ManyToOne(targetEntity="TipoInstitucion")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_tipo_institucion", referencedColumnName="id_tipo_institucion")
     * })
     */
    private $idTipoInstitucion;

    public function getIdInstitucion(): ?int
    {
        return $this->idInstitucion;
    }

    public function getDomicilio(): ?string
    {
        return $this->domicilio;
    }

    public function setDomicilio(string $domicilio): self
    {
        $this->domicilio = $domicilio;

        return $this;
    }

    public function getRfc(): ?string
    {
        return $this->rfc;
    }

    public function setRfc(string $rfc): self
    {
        $this->rfc = $rfc;

        return $this;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getIesglobal(): ?string
    {
        return $this->iesglobal;
    }

    public function setIesglobal(string $iesglobal): self
    {
        $this->iesglobal = $iesglobal;

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

    public function getIdMunicipio(): ?Municipio
    {
        return $this->idMunicipio;
    }

    public function setIdMunicipio(?Municipio $idMunicipio): self
    {
        $this->idMunicipio = $idMunicipio;

        return $this;
    }

    public function getIdTipoInstitucion(): ?TipoInstitucion
    {
        return $this->idTipoInstitucion;
    }

    public function setIdTipoInstitucion(?TipoInstitucion $idTipoInstitucion): self
    {
        $this->idTipoInstitucion = $idTipoInstitucion;

        return $this;
    }


}
