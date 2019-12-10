<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * OfertaPracticaProfesional
 *
 * @ORM\Table(name="oferta_practica_profesional", indexes={@ORM\Index(name="FK_oferta_practica_profesional_colegiatura", columns={"id_carrera"}), @ORM\Index(name="FK_oferta_educativa_institucion", columns={"id_institucion"}), @ORM\Index(name="FK_oferta_educativa_modalidad", columns={"id_modalidad"}), @ORM\Index(name="FK_oferta_practica_profesional_estatus", columns={"id_estatus"})})
 * @ORM\Entity
 */
class OfertaPracticaProfesional
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_oferta_practica_profesional", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idOfertaPracticaProfesional;

    /**
     * @var string
     *
     * @ORM\Column(name="carrera", type="string", length=50, nullable=false, options={"default"="'0'"})
     */
    private $carrera = '\'0\'';

    /**
     * @var int
     *
     * @ORM\Column(name="cupo", type="integer", nullable=false)
     */
    private $cupo = '1';

    /**
     * @var int
     *
     * @ORM\Column(name="cupo_asignado", type="integer", nullable=false)
     */
    private $cupoAsignado = '0';

    /**
     * @var \Institucion
     *
     * @ORM\ManyToOne(targetEntity="Institucion")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_institucion", referencedColumnName="id_institucion")
     * })
     */
    private $idInstitucion;

    /**
     * @var \Modalidad
     *
     * @ORM\ManyToOne(targetEntity="Modalidad")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_modalidad", referencedColumnName="id_modalidad")
     * })
     */
    private $idModalidad;

    /**
     * @var \Carrera
     *
     * @ORM\ManyToOne(targetEntity="Carrera")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_carrera", referencedColumnName="id_carrera")
     * })
     */
    private $idCarrera;

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

    public function getIdOfertaPracticaProfesional(): ?int
    {
        return $this->idOfertaPracticaProfesional;
    }

    public function getCarrera(): ?string
    {
        return $this->carrera;
    }

    public function setCarrera(string $carrera): self
    {
        $this->carrera = $carrera;

        return $this;
    }

    public function getCupo(): ?int
    {
        return $this->cupo;
    }

    public function setCupo(int $cupo): self
    {
        $this->cupo = $cupo;

        return $this;
    }

    public function getCupoAsignado(): ?int
    {
        return $this->cupoAsignado;
    }

    public function setCupoAsignado(int $cupoAsignado): self
    {
        $this->cupoAsignado = $cupoAsignado;

        return $this;
    }

    public function getIdInstitucion(): ?Institucion
    {
        return $this->idInstitucion;
    }

    public function setIdInstitucion(?Institucion $idInstitucion): self
    {
        $this->idInstitucion = $idInstitucion;

        return $this;
    }

    public function getIdModalidad(): ?Modalidad
    {
        return $this->idModalidad;
    }

    public function setIdModalidad(?Modalidad $idModalidad): self
    {
        $this->idModalidad = $idModalidad;

        return $this;
    }

    public function getIdCarrera(): ?Carrera
    {
        return $this->idCarrera;
    }

    public function setIdCarrera(?Carrera $idCarrera): self
    {
        $this->idCarrera = $idCarrera;

        return $this;
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
