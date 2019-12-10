<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AreaEstudio
 *
 * @ORM\Table(name="area_estudio")
 * @ORM\Entity
 */
class AreaEstudio
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_area_estudio", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idAreaEstudio;

    /**
     * @var string|null
     *
     * @ORM\Column(name="descripcion", type="string", length=100, nullable=true, options={"default"="NULL"})
     */
    private $descripcion = 'NULL';

    public function getIdAreaEstudio(): ?int
    {
        return $this->idAreaEstudio;
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


}
