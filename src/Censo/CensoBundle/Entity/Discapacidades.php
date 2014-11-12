<?php

namespace Censo\CensoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Discapacidades
 *
 * @ORM\Table(name="discapacidades")
 * @ORM\Entity
 */
class Discapacidades
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\SequenceGenerator(sequenceName="discapacidades_id_seq", allocationSize=1, initialValue=1)
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
     * @ORM\ManyToMany(targetEntity="Habitantes", mappedBy="discapacidades")
     */
    private $habitantes;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->habitantes = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Discapacidades
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
     * Add habitantes
     *
     * @param \Censo\CensoBundle\Entity\Habitantes $habitantes
     * @return Discapacidades
     */
    public function addHabitante(\Censo\CensoBundle\Entity\Habitantes $habitantes)
    {
        $this->habitantes[] = $habitantes;

        return $this;
    }

    /**
     * Remove habitantes
     *
     * @param \Censo\CensoBundle\Entity\Habitantes $habitantes
     */
    public function removeHabitante(\Censo\CensoBundle\Entity\Habitantes $habitantes)
    {
        $this->habitantes->removeElement($habitantes);
    }

    /**
     * Get habitantes
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getHabitantes()
    {
        return $this->habitantes;
    }

    public function __toString() {
        return $this->getNombre();
    }
    }
