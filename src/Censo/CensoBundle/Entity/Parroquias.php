<?php

namespace Censo\CensoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Parroquias
 *
 * @ORM\Table(name="parroquias", indexes={@ORM\Index(name="IDX_584481774723E346", columns={"municipios_id"})})
 * @ORM\Entity
 */
class Parroquias
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\SequenceGenerator(sequenceName="parroquias_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=255, nullable=false)
     */
    private $nombre;

    /**
     * @var \Municipios
     *
     * @ORM\ManyToOne(targetEntity="Municipios")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="municipios_id", referencedColumnName="id")
     * })
     */
    private $municipios;



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
     * @return Parroquias
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
     * Set municipios
     *
     * @param \Censo\CensoBundle\Entity\Municipios $municipios
     * @return Parroquias
     */
    public function setMunicipios(\Censo\CensoBundle\Entity\Municipios $municipios = null)
    {
        $this->municipios = $municipios;

        return $this;
    }

    /**
     * Get municipios
     *
     * @return \Censo\CensoBundle\Entity\Municipios 
     */
    public function getMunicipios()
    {
        return $this->municipios;
    }
    public function __toString() {
        return $this->getNombre();
    }
}
