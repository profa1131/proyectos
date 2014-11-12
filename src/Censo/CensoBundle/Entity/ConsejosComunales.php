<?php

namespace Censo\CensoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ConsejosComunales
 *
 * @ORM\Table(name="consejos_comunales", indexes={@ORM\Index(name="IDX_7060586473AEFE7", columns={"comuna_id"})})
 * @ORM\Entity
 */
class ConsejosComunales
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\SequenceGenerator(sequenceName="consejos_comunales_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=255, nullable=false)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="direccion", type="string", length=255, nullable=false)
     */
    private $direccion;

    /**
     * @var string
     *
     * @ORM\Column(name="codigo", type="string", length=255, nullable=false)
     */
    private $codigo;

    /**
     * @var string
     *
     * @ORM\Column(name="rif", type="string", nullable=false)
     */
    private $rif;

    /**
     * @var string
     *
     * @ORM\Column(name="numero_cuenta", type="string", length=255, nullable=false)
     */
    private $numeroCuenta;

    /**
     * @var \Comunas
     *
     * @ORM\ManyToOne(targetEntity="Comunas")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="comuna_id", referencedColumnName="id")
     * })
     */
    private $comuna;



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
     * Set nombre
     *
     * @param string $nombre
     * @return ConsejosComunales
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set direccion
     *
     * @param string $direccion
     * @return ConsejosComunales
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
     * Set codigo
     *
     * @param string $codigo
     * @return ConsejosComunales
     */
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;

        return $this;
    }

    /**
     * Get codigo
     *
     * @return string 
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * Set rif
     *
     * @param string $rif
     * @return ConsejosComunales
     */
    public function setRif($rif)
    {
        $this->rif = $rif;

        return $this;
    }

    /**
     * Get rif
     *
     * @return string 
     */
    public function getRif()
    {
        return $this->rif;
    }

    /**
     * Set numeroCuenta
     *
     * @param string $numeroCuenta
     * @return ConsejosComunales
     */
    public function setNumeroCuenta($numeroCuenta)
    {
        $this->numeroCuenta = $numeroCuenta;

        return $this;
    }

    /**
     * Get numeroCuenta
     *
     * @return string 
     */
    public function getNumeroCuenta()
    {
        return $this->numeroCuenta;
    }

    /**
     * Set comuna
     *
     * @param \Censo\CensoBundle\Entity\Comunas $comuna
     * @return ConsejosComunales
     */
    public function setComuna(\Censo\CensoBundle\Entity\Comunas $comuna = null)
    {
        $this->comuna = $comuna;

        return $this;
    }

    /**
     * Get comuna
     *
     * @return \Censo\CensoBundle\Entity\Comunas 
     */
    public function getComuna()
    {
        return $this->comuna;
    }

    public function __toString() {
        return $this->getNombre();
    }
    }
