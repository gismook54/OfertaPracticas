<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Carrera
 *
 * @ORM\Table(name="carrera", indexes={@ORM\Index(name="FK_colegiatura_area_estudio", columns={"id_area_estudio"})})
 * @ORM\Entity
 */
class Carrera
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_carrera", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCarrera;

    /**
     * @var string|null
     *
     * @ORM\Column(name="descripcion", type="string", length=50, nullable=true, options={"default"="NULL"})
     */
    private $descripcion = 'NULL';

    /**
     * @var \AreaEstudio
     *
     * @ORM\ManyToOne(targetEntity="AreaEstudio")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_area_estudio", referencedColumnName="id_area_estudio")
     * })
     */
    private $idAreaEstudio;

    public function getIdCarrera(): ?int
    {
        return $this->idCarrera;
    }

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(?string $descripcion): self
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    public function getIdAreaEstudio(): ?AreaEstudio
    {
        return $this->idAreaEstudio;
    }

    public function setIdAreaEstudio(?AreaEstudio $idAreaEstudio): self
    {
        $this->idAreaEstudio = $idAreaEstudio;

        return $this;
    }


}
