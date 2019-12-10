<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AspiranteOfertaPracticaProfecional
 *
 * @ORM\Table(name="aspirante_oferta_practica_profecional", indexes={@ORM\Index(name="FK_aspirante_oferta_educativa_oferta_educativa", columns={"id_oferta_practica_profecional"}), @ORM\Index(name="FK_aspirante_oferta_educativa_aspirante", columns={"id_aspirante"}), @ORM\Index(name="FK_aspirante_oferta_practica_profecional_estatus", columns={"id_estatus"})})
 * @ORM\Entity
 */
class AspiranteOfertaPracticaProfecional
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_aspirante_oferta_practica_profecional", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idAspiranteOfertaPracticaProfecional;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="fecha_registro", type="datetime", nullable=true, options={"default"="NULL"})
     */
    private $fechaRegistro = 'NULL';

    /**
     * @var \Aspirante
     *
     * @ORM\ManyToOne(targetEntity="Aspirante")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_aspirante", referencedColumnName="id_aspirante")
     * })
     */
    private $idAspirante;

    /**
     * @var \OfertaPracticaProfesional
     *
     * @ORM\ManyToOne(targetEntity="OfertaPracticaProfesional")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_oferta_practica_profecional", referencedColumnName="id_oferta_practica_profesional")
     * })
     */
    private $idOfertaPracticaProfecional;

    /**
     * @var \Estatus
     *
     * @ORM\ManyToOne(targetEntity="Estatus")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_estatus", referencedColumnName="id_estatus")
     * })
     */
    private $idEstatus;

    public function getIdAspiranteOfertaPracticaProfecional(): ?int
    {
        return $this->idAspiranteOfertaPracticaProfecional;
    }

    public function getFechaRegistro(): ?\DateTimeInterface
    {
        return $this->fechaRegistro;
    }

    public function setFechaRegistro(?\DateTimeInterface $fechaRegistro): self
    {
        $this->fechaRegistro = $fechaRegistro;

        return $this;
    }

    public function getIdAspirante(): ?Aspirante
    {
        return $this->idAspirante;
    }

    public function setIdAspirante(?Aspirante $idAspirante): self
    {
        $this->idAspirante = $idAspirante;

        return $this;
    }

    public function getIdOfertaPracticaProfecional(): ?OfertaPracticaProfesional
    {
        return $this->idOfertaPracticaProfecional;
    }

    public function setIdOfertaPracticaProfecional(?OfertaPracticaProfesional $idOfertaPracticaProfecional): self
    {
        $this->idOfertaPracticaProfecional = $idOfertaPracticaProfecional;

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
