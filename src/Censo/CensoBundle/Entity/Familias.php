<?php

namespace Censo\CensoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Familias
 *
 * @ORM\Table(name="familias", indexes={@ORM\Index(name="IDX_FD33FAC88655CE6B", columns={"habitantes_id"}), @ORM\Index(name="IDX_FD33FAC838EC4CA0", columns={"concejos_comunales_id"})})
 * @ORM\Entity
 */
class Familias
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\SequenceGenerator(sequenceName="familias_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="apellidos", type="string", length=255, nullable=true)
     */
    private $apellidos;

    /**
     * @var string
     *
     * @ORM\Column(name="telefono_local", type="string", length=255, nullable=false)
     */
    private $telefonoLocal;

    /**
     * @var string
     *
     * @ORM\Column(name="direccion", type="string", length=255, nullable=false)
     */
    private $direccion;

    /**
     * @var string
     *
     * @ORM\Column(name="sector", type="string", length=255, nullable=false)
     */
    private $sector;

    /**
     * @var string
     *
     * @ORM\Column(name="nombres_comunidad", type="string", length=255, nullable=false)
     */
    private $nombresComunidad;

    /**
     * @var \Habitantes
     *
     * @ORM\ManyToOne(targetEntity="Habitantes")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="habitantes_id", referencedColumnName="id")
     * })
     */
    private $habitantes;

    /**
     * @var \ConsejosComunales
     *
     * @ORM\ManyToOne(targetEntity="ConsejosComunales")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="concejos_comunales_id", referencedColumnName="id")
     * })
     */
    private $concejosComunales;



    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set apellidos
     *
     * @param string $apellidos
     * @return Familias
     */
    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;

        return $this;
    }

    /**
     * Get apellidos
     *
     * @return string 
     */
    public function getApellidos()
    {
        return $this->apellidos;
    }

    /**
     * Set telefonoLocal
     *
     * @param string $telefonoLocal
     * @return Familias
     */
    public function setTelefonoLocal($telefonoLocal)
    {
        $this->telefonoLocal = $telefonoLocal;

        return $this;
    }

    /**
     * Get telefonoLocal
     *
     * @return string 
     */
    public function getTelefonoLocal()
    {
        return $this->telefonoLocal;
    }

    /**
     * Set direccion
     *
     * @param string $direccion
     * @return Familias
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;

        return $this;
    }

    /**
     * Get direccion
     *
     * @return string 
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Set sector
     *
     * @param string $sector
     * @return Familias
     */
    public function setSector($sector)
    {
        $this->sector = $sector;

        return $this;
    }

    /**
     * Get sector
     *
     * @return string 
     */
    public function getSector()
    {
        return $this->sector;
    }

    /**
     * Set nombresComunidad
     *
     * @param string $nombresComunidad
     * @return Familias
     */
    public function setNombresComunidad($nombresComunidad)
    {
        $this->nombresComunidad = $nombresComunidad;

        return $this;
    }

    /**
     * Get nombresComunidad
     *
     * @return string 
     */
    public function getNombresComunidad()
    {
        return $this->nombresComunidad;
    }

    /**
     * Set habitantes
     *
     * @param \Censo\CensoBundle\Entity\Habitantes $habitantes
     * @return Familias
     */
    public function setHabitantes(\Censo\CensoBundle\Entity\Habitantes $habitantes = null)
    {
        $this->habitantes = $habitantes;

        return $this;
    }

    /**
     * Get habitantes
     *
     * @return \Censo\CensoBundle\Entity\Habitantes 
     */
    public function getHabitantes()
    {
        return $this->habitantes;
    }

    /**
     * Set concejosComunales
     *
     * @param \Censo\CensoBundle\Entity\ConsejosComunales $concejosComunales
     * @return Familias
     */
    public function setConcejosComunales(\Censo\CensoBundle\Entity\ConsejosComunales $concejosComunales = null)
    {
        $this->concejosComunales = $concejosComunales;

        return $this;
    }

    /**
     * Get concejosComunales
     *
     * @return \Censo\CensoBundle\Entity\ConsejosComunales 
     */
    public function getConcejosComunales()
    {
        return $this->concejosComunales;
    }
    public function __toString() {
        return $this->apellidos;
    }
    
}
