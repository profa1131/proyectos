<?php

namespace Censo\CensoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Telefonias
 *
 * @ORM\Table(name="telefonias")
 * @ORM\Entity
 */
class Telefonias
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\SequenceGenerator(sequenceName="telefonias_id_seq", allocationSize=1, initialValue=1)
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
     * @ORM\ManyToMany(targetEntity="RegistroSocioeconomico", inversedBy="telefonias")
     * @ORM\JoinTable(name="registro_telefonias_id",
     *   joinColumns={
     *     @ORM\JoinColumn(name="telefonias_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="registro_socioeconomico_id", referencedColumnName="id")
     *   }
     * )
     */
    private $registroSocioeconomico;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->registroSocioeconomico = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Telefonias
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
     * Add registroSocioeconomico
     *
     * @param \Censo\CensoBundle\Entity\RegistroSocioeconomico $registroSocioeconomico
     * @return Telefonias
     */
    public function addRegistroSocioeconomico(\Censo\CensoBundle\Entity\RegistroSocioeconomico $registroSocioeconomico)
    {
        $this->registroSocioeconomico[] = $registroSocioeconomico;

        return $this;
    }

    /**
     * Remove registroSocioeconomico
     *
     * @param \Censo\CensoBundle\Entity\RegistroSocioeconomico $registroSocioeconomico
     */
    public function removeRegistroSocioeconomico(\Censo\CensoBundle\Entity\RegistroSocioeconomico $registroSocioeconomico)
    {
        $this->registroSocioeconomico->removeElement($registroSocioeconomico);
    }

    /**
     * Get registroSocioeconomico
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getRegistroSocioeconomico()
    {
        return $this->registroSocioeconomico;
    }
    
    public function __toString() {
        return $this->getNombre();
    }
  }
