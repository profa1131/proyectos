<?php

namespace Censo\CensoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ActividadComercialVivienda
 *
 * @ORM\Table(name="actividad_comercial_vivienda")
 * @ORM\Entity
 */
class ActividadComercialVivienda
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\SequenceGenerator(sequenceName="actividad_comercial_vivienda_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=255, nullable=false)
     */
    private $nombre;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="RegistroSocioeconomico", inversedBy="actividadComercial")
     * @ORM\JoinTable(name="registro_actividad_comercial",
     *   joinColumns={
     *     @ORM\JoinColumn(name="actividad_comercial_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="rgistro_socioeconomico_id", referencedColumnName="id")
     *   }
     * )
     */
    private $rgistroSocioeconomico;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->rgistroSocioeconomico = new \Doctrine\Common\Collections\ArrayCollection();
    }


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
     * @return ActividadComercialVivienda
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
     * Add rgistroSocioeconomico
     *
     * @param \Censo\CensoBundle\Entity\RegistroSocioeconomico $rgistroSocioeconomico
     * @return ActividadComercialVivienda
     */
    public function addRgistroSocioeconomico(\Censo\CensoBundle\Entity\RegistroSocioeconomico $rgistroSocioeconomico)
    {
        $this->rgistroSocioeconomico[] = $rgistroSocioeconomico;

        return $this;
    }

    /**
     * Remove rgistroSocioeconomico
     *
     * @param \Censo\CensoBundle\Entity\RegistroSocioeconomico $rgistroSocioeconomico
     */
    public function removeRgistroSocioeconomico(\Censo\CensoBundle\Entity\RegistroSocioeconomico $rgistroSocioeconomico)
    {
        $this->rgistroSocioeconomico->removeElement($rgistroSocioeconomico);
    }

    /**
     * Get rgistroSocioeconomico
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getRgistroSocioeconomico()
    {
        return $this->rgistroSocioeconomico;
    }
    public function __toString() {
        return $this->getNombre();
    }
}
