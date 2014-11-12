<?php

namespace Censo\CensoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * Comunas
 *
 * @ORM\Table(name="comunas", indexes={@ORM\Index(name="IDX_14704B9174AFDC17", columns={"parroquia_id"})})
 * @ORM\Entity
 */
class Comunas
{
     /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\SequenceGenerator(sequenceName="comunas_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=255, nullable=false)
     */
    private $nombre;
    
    

    
    /**
     * @var \Parroquias
     *
     * @ORM\ManyToOne(targetEntity="Parroquias")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="parroquia_id", referencedColumnName="id")
     * })
     */
    private $parroquia;

    /**
     * @var string
     *
     * @ORM\Column(name="direccion", type="string", length=255, nullable=false)
     */
    private $direccion;

    /**
     * @var string
     *
     * @ORM\Column(name="rif", type="string", length=15, nullable=false)
     */
    private $rif;

    
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
     * @return Comunas
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
     * Get parroquia
     *
     * @return \Censo\CensoBundle\Entity\Parroquias 
     */
    public function getParroquia()
    {
        return $this->parroquia;
    }

    /**
     * Set direccion
     *
     * @param string $direccion
     * @return Comunas
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
     * Set rif
     *
     * @param string $rif
     * @return Comunas
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
     
    public function __toString() {
        return $this->getNombre();
    }

    /**
     * Set parroquia
     *
     * @param \Censo\CensoBundle\Entity\Parroquias $parroquia
     * @return Comunas
     */
    public function setParroquia(\Censo\CensoBundle\Entity\Parroquias $parroquia = null)
    {
        $this->parroquia = $parroquia;

        return $this;
    }
}
