<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UsuarioInstitucion
 *
 * @ORM\Table(name="usuario_institucion", indexes={@ORM\Index(name="FK_usuario_institucion_estatus", columns={"id_estatus"}), @ORM\Index(name="FK_usuario_institucion_institucion", columns={"id_institucion"})})
 * @ORM\Entity
 */
class UsuarioInstitucion
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_usuario_institucion", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idUsuarioInstitucion;

    /**
     * @var string
     *
     * @ORM\Column(name="foto", type="string", length=0, nullable=false, options={"default"="''"})
     */
    private $foto = '\'\'';

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=50, nullable=false, options={"default"="''"})
     */
    private $nombre = '\'\'';

    /**
     * @var string
     *
     * @ORM\Column(name="apellido", type="string", length=50, nullable=false, options={"default"="''"})
     */
    private $apellido = '\'\'';

    /**
     * @var string
     *
     * @ORM\Column(name="cargo", type="string", length=50, nullable=false, options={"default"="''"})
     */
    private $cargo = '\'\'';

    /**
     * @var string
     *
     * @ORM\Column(name="telefono", type="string", length=50, nullable=false, options={"default"="''"})
     */
    private $telefono = '\'\'';

    /**
     * @var string
     *
     * @ORM\Column(name="correo", type="string", length=50, nullable=false, options={"default"="''"})
     */
    private $correo = '\'\'';

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

    public function getIdUsuarioInstitucion(): ?int
    {
        return $this->idUsuarioInstitucion;
    }

    public function getFoto(): ?string
    {
        return $this->foto;
    }

    public function setFoto(string $foto): self
    {
        $this->foto = $foto;

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

    public function getApellido(): ?string
    {
        return $this->apellido;
    }

    public function setApellido(string $apellido): self
    {
        $this->apellido = $apellido;

        return $this;
    }

    public function getCargo(): ?string
    {
        return $this->cargo;
    }

    public function setCargo(string $cargo): self
    {
        $this->cargo = $cargo;

        return $this;
    }

    public function getTelefono(): ?string
    {
        return $this->telefono;
    }

    public function setTelefono(string $telefono): self
    {
        $this->telefono = $telefono;

        return $this;
    }

    public function getCorreo(): ?string
    {
        return $this->correo;
    }

    public function setCorreo(string $correo): self
    {
        $this->correo = $correo;

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

    public function getIdRol(): ?Roles
    {
        return $this->idRol;
    }

    public function setIdRol(?Roles $idRol): self
    {
        $this->idEstatus = $idRol;

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
}
