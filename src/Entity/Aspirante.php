<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use phpDocumentor\Reflection\Types\Boolean;
use Symfony\Component\Security\Core\User\AdvancedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Aspirante
 *
 * @ORM\Table(name="aspirante", indexes={@ORM\Index(name="FK_aspirante_estatus", columns={"id_estatus"})})
 * @ORM\Entity
 */
class Aspirante
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_aspirante", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idAspirante;

    /**
     * @var string|null
     *
     * @ORM\Column(name="curp", type="string", length=50, nullable=true, options={"default"="NULL"})
     */
    private $curp = '';

    /**
     * @var string|null
     *
     * @ORM\Column(name="nombre", type="string", length=50, nullable=true, options={"default"="NULL"})
     */
    private $nombre = '';

    /**
     * @var string|null
     *
     * @ORM\Column(name="apellido_paterno", type="string", length=50, nullable=true, options={"default"="NULL"})
     */
    private $apellidoPaterno = '';

    /**
     * @var string|null
     *
     * @ORM\Column(name="apellido_materno", type="string", length=50, nullable=true, options={"default"="NULL"})
     */
    private $apellidoMaterno = '';

    /**
     * @var string|null
     *
     * @ORM\Column(name="correo", type="string", length=50, nullable=true, options={"default"="NULL"})
     */
    private $correo = 'Ejemplo@ejemplo.com';

    /**
     * @var string|null
     *
     * @ORM\Column(name="telefono", type="string", length=20, nullable=true, options={"default"="NULL"})
     */
    private $telefono = '';

    /**
     * @var string|null
     *
     * @ORM\Column(name="celular", type="string", length=20, nullable=true, options={"default"="NULL"})
     */
    private $celular = '';

    /**
     * @var string|null
     *
     * @ORM\Column(name="universidad", type="string", length=100, nullable=true, options={"default"="NULL"})
     */
    private $universidad = '';

    /**
     * @var string|null
     *
     * @ORM\Column(name="usuario", type="string", length=100, nullable=true, options={"default"="NULL"})
     */
    private $usuario = '';

    /**
     * @var string|null
     *
     * @ORM\Column(name="password", type="string", length=100, nullable=true, options={"default"="NULL"})
     */
    private $password = '';

    /**
     * @var string|null
     *
     * @ORM\Column(name="matricula", type="string", length=100, nullable=true, options={"default"="NULL"})
     */
    private $matricula = '';

    /**
     * @var boolean|null
     *
     * @ORM\Column(name="credencial_unadm", type="boolean", nullable=true, options={"default"="NULL"})
     */
    private $credencialUnadm = NULL;

    /**
     * @var \Roles
     *
     * @ORM\ManyToOne(targetEntity="Roles")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_rol", referencedColumnName="id_rol")
     * })
     */
    private $idRol;

    /**
     * @var \Estatus
     *
     * @ORM\ManyToOne(targetEntity="Estatus")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_estatus", referencedColumnName="id_estatus")
     * })
     */
    private $idEstatus;

    public function getIdAspirante(): ?int
    {
        return $this->idAspirante;
    }

    public function getCurp(): ?string
    {
        return $this->curp;
    }

    public function setCurp(?string $curp): self
    {
        $this->curp = $curp;

        return $this;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(?string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getApellidoPaterno(): ?string
    {
        return $this->apellidoPaterno;
    }

    public function setApellidoPaterno(?string $apellidoPaterno): self
    {
        $this->apellidoPaterno = $apellidoPaterno;

        return $this;
    }

    public function getApellidoMaterno(): ?string
    {
        return $this->apellidoMaterno;
    }

    public function setApellidoMaterno(?string $apellidoMaterno): self
    {
        $this->apellidoMaterno = $apellidoMaterno;

        return $this;
    }

    public function getCorreo(): ?string
    {
        return $this->correo;
    }

    public function setCorreo(?string $correo): self
    {
        $this->correo = $correo;

        return $this;
    }

    public function getTelefono(): ?string
    {
        return $this->telefono;
    }

    public function setTelefono(?string $telefono): self
    {
        $this->telefono = $telefono;

        return $this;
    }

    public function getCelular(): ?string
    {
        return $this->celular;
    }

    public function setCelular(?string $celular): self
    {
        $this->celular = $celular;

        return $this;
    }

    public function getUniversidad(): ?string
    {
        return $this->universidad;
    }

    public function setUniversidad(?string $universidad): self
    {
        $this->universidad = $universidad;

        return $this;
    }

    public function getUsuario(): ?string
    {
        return $this->usuario;
    }

    public function setUsuario(?string $usuario): self
    {
        $this->usuario = $usuario;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(?string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getMatricula(): ?string
    {
        return $this->matricula;
    }

    public function setMatricula(?string $matricula): self
    {
        $this->matricula = $matricula;

        return $this;
    }

    public function getCredencialUnadm(): ?Boolean
    {
        return $this->credencialUnadm;
    }

    public function setCredencialUnadm(?Boolean $credencialUnadm): self
    {
        $this->usuario = $credencialUnadm;
        return $this;
    }

    public function getIdRol(): ?Roles
    {
        return $this->idRol;
    }

    public function setIdRol(?Roles $idRol): self
    {
        $this->idRol = $idRol;

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
