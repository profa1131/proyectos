<?php

namespace Censo\CensoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Habitantes
 *
 * @ORM\Table(name="habitantes", indexes={@ORM\Index(name="IDX_8B24F91769EC7CBB", columns={"profaciones_id"}), @ORM\Index(name="IDX_8B24F917409490F9", columns={"areas_de_trabajos_id"}), @ORM\Index(name="IDX_8B24F917B0CDB722", columns={"vocerias_id"})})
 * @ORM\Entity
 */
class Habitantes
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\SequenceGenerator(sequenceName="habitantes_id_seq", allocationSize=1, initialValue=1)
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
     * @ORM\Column(name="segundo_nombre", type="string", length=255, nullable=false)
     */
    private $segundoNombre;

    /**
     * @var string
     *
     * @ORM\Column(name="apellido", type="string", length=255, nullable=false)
     */
    private $apellido;

    /**
     * @var string
     *
     * @ORM\Column(name="segundo_apellido", type="string", length=255, nullable=false)
     */
    private $segundoApellido;

    /**
     * @var string
     *
     * @ORM\Column(name="genero", type="string", length=255, nullable=false)
     */
    private $genero;

    /**
     * @var string
     *
     * @ORM\Column(name="nacionalidad", type="string", length=255, nullable=false)
     */
    private $nacionalidad;

    /**
     * @var string
     *
     * @ORM\Column(name="cedula", type="string", length=255, nullable=false)
     */
    private $cedula;

    /**
     * @var string
     *
     * @ORM\Column(name="empleo", type="string", length=255, nullable=false)
     */
    private $empleo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_nacimiento", type="date", nullable=false)
     */
    private $fechaNacimiento;

    /**
     * @var string
     *
     * @ORM\Column(name="embarazo", type="string", length=255, nullable=false)
     */
    private $embarazo;

    /**
     * @var string
     *
     * @ORM\Column(name="parentesco", type="string", length=255, nullable=false)
     */
    private $parentesco;

    /**
     * @var string
     *
     * @ORM\Column(name="grado_de_instruccion", type="string", length=255, nullable=false)
     */
    private $gradoDeInstruccion;

    /**
     * @var string
     *
     * @ORM\Column(name="cne", type="string", length=255, nullable=false)
     */
    private $cne;

    /**
     * @var string
     *
     * @ORM\Column(name="pensionado", type="string", length=255, nullable=false)
     */
    private $pensionado;

    /**
     * @var string
     *
     * @ORM\Column(name="tipo_de_ingreso", type="string", length=255, nullable=false)
     */
    private $tipoDeIngreso;

    /**
     * @var string
     *
     * @ORM\Column(name="ingreso_mensual", type="string", length=255, nullable=false)
     */
    private $ingresoMensual;

    /**
     * @var string
     *
     * @ORM\Column(name="jefe_grupo_familiar", type="string", length=255, nullable=false)
     */
    private $jefeGrupoFamiliar;

    /**
     * @var string
     *
     * @ORM\Column(name="edo_civil", type="string", length=255, nullable=false)
     */
    private $edoCivil;

    /**
     * @var string
     *
     * @ORM\Column(name="telefono_celular", type="string", length=255, nullable=false)
     */
    private $telefonoCelular;

    /**
     * @var string
     *
     * @ORM\Column(name="correo_electronico", type="string", length=255, nullable=false)
     */
    private $correoElectronico;

    /**
     * @var string
     *
     * @ORM\Column(name="telefono_oficina", type="string", length=255, nullable=false)
     */
    private $telefonoOficina;

    /**
     * @var string
     *
     * @ORM\Column(name="tiempo_en_la_comunidad", type="string", length=255, nullable=false)
     */
    private $tiempoEnLaComunidad;
        
    /**
     * @var string
     *
     * @ORM\Column(name="ley_politica_habitacional", type="string", length=255, nullable=false)
     */
    private $leyPoliticaHabitacional;

    /**
     * @var string
     *
     * @ORM\Column(name="participa_organizacion", type="string", length=255, nullable=false)
     */
    private $participaOrganizacion;

    /**
     * @var \Profesiones
     *
     * @ORM\ManyToOne(targetEntity="Profesiones")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="profaciones_id", referencedColumnName="id")
     * })
     */
    private $profaciones;

    /**
     * @var \AreasDeTrabajos
     *
     * @ORM\ManyToOne(targetEntity="AreasDeTrabajos")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="areas_de_trabajos_id", referencedColumnName="id")
     * })
     */
    private $areasDeTrabajos;

    /**
     * @var \Vocerias
     *
     * @ORM\ManyToOne(targetEntity="Vocerias")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="vocerias_id", referencedColumnName="id")
     * })
     */
    private $vocerias;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Enfermedades", mappedBy="habitantes")
     */
    private $enfermedades;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Discapacidades", inversedBy="habitantes")
     * @ORM\JoinTable(name="habitantes_discapacidades",
     *   joinColumns={
     *     @ORM\JoinColumn(name="habitantes_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="discapacidades_id", referencedColumnName="id")
     *   }
     * )
     */
    private $discapacidades;
    
    /**
     * @var \Familias
     *
     * @ORM\ManyToOne(targetEntity="Familias")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="familias_id", referencedColumnName="id")
     * })
     */
    private $familias;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->enfermedades = new \Doctrine\Common\Collections\ArrayCollection();
        $this->discapacidades = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Habitantes
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
     * Set segundoNombre
     *
     * @param string $segundoNombre
     * @return Habitantes
     */
    public function setSegundoNombre($segundoNombre)
    {
        $this->segundoNombre = $segundoNombre;

        return $this;
    }

    /**
     * Get segundoNombre
     *
     * @return string 
     */
    public function getSegundoNombre()
    {
        return $this->segundoNombre;
    }

    /**
     * Set apellido
     *
     * @param string $apellido
     * @return Habitantes
     */
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;

        return $this;
    }

    /**
     * Get apellido
     *
     * @return string 
     */
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * Set segundoApellido
     *
     * @param string $segundoApellido
     * @return Habitantes
     */
    public function setSegundoApellido($segundoApellido)
    {
        $this->segundoApellido = $segundoApellido;

        return $this;
    }

    /**
     * Get segundoApellido
     *
     * @return string 
     */
    public function getSegundoApellido()
    {
        return $this->segundoApellido;
    }

    /**
     * Set genero
     *
     * @param string $genero
     * @return Habitantes
     */
    public function setGenero($genero)
    {
        $this->genero = $genero;

        return $this;
    }

    /**
     * Get genero
     *
     * @return string 
     */
    public function getGenero()
    {
        return $this->genero;
    }

    /**
     * Set nacionalidad
     *
     * @param string $nacionalidad
     * @return Habitantes
     */
    public function setNacionalidad($nacionalidad)
    {
        $this->nacionalidad = $nacionalidad;

        return $this;
    }

    /**
     * Get nacionalidad
     *
     * @return string 
     */
    public function getNacionalidad()
    {
        return $this->nacionalidad;
    }

    /**
     * Set cedula
     *
     * @param string $cedula
     * @return Habitantes
     */
    public function setCedula($cedula)
    {
        $this->cedula = $cedula;

        return $this;
    }

    /**
     * Get cedula
     *
     * @return string 
     */
    public function getCedula()
    {
        return $this->cedula;
    }

    /**
     * Set empleo
     *
     * @param string $empleo
     * @return Habitantes
     */
    public function setEmpleo($empleo)
    {
        $this->empleo = $empleo;

        return $this;
    }

    /**
     * Get empleo
     *
     * @return string 
     */
    public function getEmpleo()
    {
        return $this->empleo;
    }

    /**
     * Set fechaNacimiento
     *
     * @param \DateTime $fechaNacimiento
     * @return Habitantes
     */
    public function setFechaNacimiento($fechaNacimiento)
    {
        $this->fechaNacimiento = $fechaNacimiento;

        return $this;
    }

    /**
     * Get fechaNacimiento
     *
     * @return \DateTime 
     */
    public function getFechaNacimiento()
    {
        return $this->fechaNacimiento;
    }

    /**
     * Set embarazo
     *
     * @param string $embarazo
     * @return Habitantes
     */
    public function setEmbarazo($embarazo)
    {
        $this->embarazo = $embarazo;

        return $this;
    }

    /**
     * Get embarazo
     *
     * @return string 
     */
    public function getEmbarazo()
    {
        return $this->embarazo;
    }

    /**
     * Set parentesco
     *
     * @param string $parentesco
     * @return Habitantes
     */
    public function setParentesco($parentesco)
    {
        $this->parentesco = $parentesco;

        return $this;
    }

    /**
     * Get parentesco
     *
     * @return string 
     */
    public function getParentesco()
    {
        return $this->parentesco;
    }

    /**
     * Set gradoDeInstruccion
     *
     * @param string $gradoDeInstruccion
     * @return Habitantes
     */
    public function setGradoDeInstruccion($gradoDeInstruccion)
    {
        $this->gradoDeInstruccion = $gradoDeInstruccion;

        return $this;
    }

    /**
     * Get gradoDeInstruccion
     *
     * @return string 
     */
    public function getGradoDeInstruccion()
    {
        return $this->gradoDeInstruccion;
    }

    /**
     * Set cne
     *
     * @param string $cne
     * @return Habitantes
     */
    public function setCne($cne)
    {
        $this->cne = $cne;

        return $this;
    }

    /**
     * Get cne
     *
     * @return string 
     */
    public function getCne()
    {
        return $this->cne;
    }

    /**
     * Set pensionado
     *
     * @param string $pensionado
     * @return Habitantes
     */
    public function setPensionado($pensionado)
    {
        $this->pensionado = $pensionado;

        return $this;
    }

    /**
     * Get pensionado
     *
     * @return string 
     */
    public function getPensionado()
    {
        return $this->pensionado;
    }

    /**
     * Set tipoDeIngreso
     *
     * @param string $tipoDeIngreso
     * @return Habitantes
     */
    public function setTipoDeIngreso($tipoDeIngreso)
    {
        $this->tipoDeIngreso = $tipoDeIngreso;

        return $this;
    }

    /**
     * Get tipoDeIngreso
     *
     * @return string 
     */
    public function getTipoDeIngreso()
    {
        return $this->tipoDeIngreso;
    }

    /**
     * Set ingresoMensual
     *
     * @param string $ingresoMensual
     * @return Habitantes
     */
    public function setIngresoMensual($ingresoMensual)
    {
        $this->ingresoMensual = $ingresoMensual;

        return $this;
    }

    /**
     * Get ingresoMensual
     *
     * @return string 
     */
    public function getIngresoMensual()
    {
        return $this->ingresoMensual;
    }

    /**
     * Set jefeGrupoFamiliar
     *
     * @param string $jefeGrupoFamiliar
     * @return Habitantes
     */
    public function setJefeGrupoFamiliar($jefeGrupoFamiliar)
    {
        $this->jefeGrupoFamiliar = $jefeGrupoFamiliar;

        return $this;
    }

    /**
     * Get jefeGrupoFamiliar
     *
     * @return string 
     */
    public function getJefeGrupoFamiliar()
    {
        return $this->jefeGrupoFamiliar;
    }

    /**
     * Set edoCivil
     *
     * @param string $edoCivil
     * @return Habitantes
     */
    public function setEdoCivil($edoCivil)
    {
        $this->edoCivil = $edoCivil;

        return $this;
    }

    /**
     * Get edoCivil
     *
     * @return string 
     */
    public function getEdoCivil()
    {
        return $this->edoCivil;
    }

    /**
     * Set telefonoCelular
     *
     * @param string $telefonoCelular
     * @return Habitantes
     */
    public function setTelefonoCelular($telefonoCelular)
    {
        $this->telefonoCelular = $telefonoCelular;

        return $this;
    }

    /**
     * Get telefonoCelular
     *
     * @return string 
     */
    public function getTelefonoCelular()
    {
        return $this->telefonoCelular;
    }

    /**
     * Set correoElectronico
     *
     * @param string $correoElectronico
     * @return Habitantes
     */
    public function setCorreoElectronico($correoElectronico)
    {
        $this->correoElectronico = $correoElectronico;

        return $this;
    }

    /**
     * Get correoElectronico
     *
     * @return string 
     */
    public function getCorreoElectronico()
    {
        return $this->correoElectronico;
    }

    /**
     * Set telefonoOficina
     *
     * @param string $telefonoOficina
     * @return Habitantes
     */
    public function setTelefonoOficina($telefonoOficina)
    {
        $this->telefonoOficina = $telefonoOficina;

        return $this;
    }

    /**
     * Get telefonoOficina
     *
     * @return string 
     */
    public function getTelefonoOficina()
    {
        return $this->telefonoOficina;
    }

    /**
     * Set tiempoEnLaComunidad
     *
     * @param string $tiempoEnLaComunidad
     * @return Habitantes
     */
    public function setTiempoEnLaComunidad($tiempoEnLaComunidad)
    {
        $this->tiempoEnLaComunidad = $tiempoEnLaComunidad;

        return $this;
    }

    /**
     * Get tiempoEnLaComunidad
     *
     * @return string 
     */
    public function getTiempoEnLaComunidad()
    {
        return $this->tiempoEnLaComunidad;
    }

    /**
     * Set leyPoliticaHabitacional
     *
     * @param string $leyPoliticaHabitacional
     * @return Habitantes
     */
    public function setLeyPoliticaHabitacional($leyPoliticaHabitacional)
    {
        $this->leyPoliticaHabitacional = $leyPoliticaHabitacional;

        return $this;
    }

    /**
     * Get leyPoliticaHabitacional
     *
     * @return string 
     */
    public function getLeyPoliticaHabitacional()
    {
        return $this->leyPoliticaHabitacional;
    }

    /**
     * Set participaOrganizacion
     *
     * @param string $participaOrganizacion
     * @return Habitantes
     */
    public function setParticipaOrganizacion($participaOrganizacion)
    {
        $this->participaOrganizacion = $participaOrganizacion;

        return $this;
    }

    /**
     * Get participaOrganizacion
     *
     * @return string 
     */
    public function getParticipaOrganizacion()
    {
        return $this->participaOrganizacion;
    }

    /**
     * Set profaciones
     *
     * @param \Censo\CensoBundle\Entity\Profesiones $profaciones
     * @return Habitantes
     */
    public function setProfaciones(\Censo\CensoBundle\Entity\Profesiones $profaciones = null)
    {
        $this->profaciones = $profaciones;

        return $this;
    }

    /**
     * Get profaciones
     *
     * @return \Censo\CensoBundle\Entity\Profesiones 
     */
    public function getProfaciones()
    {
        return $this->profaciones;
    }

    /**
     * Set areasDeTrabajos
     *
     * @param \Censo\CensoBundle\Entity\AreasDeTrabajos $areasDeTrabajos
     * @return Habitantes
     */
    public function setAreasDeTrabajos(\Censo\CensoBundle\Entity\AreasDeTrabajos $areasDeTrabajos = null)
    {
        $this->areasDeTrabajos = $areasDeTrabajos;

        return $this;
    }

    /**
     * Get areasDeTrabajos
     *
     * @return \Censo\CensoBundle\Entity\AreasDeTrabajos 
     */
    public function getAreasDeTrabajos()
    {
        return $this->areasDeTrabajos;
    }

    /**
     * Set vocerias
     *
     * @param \Censo\CensoBundle\Entity\Vocerias $vocerias
     * @return Habitantes
     */
    public function setVocerias(\Censo\CensoBundle\Entity\Vocerias $vocerias = null)
    {
        $this->vocerias = $vocerias;

        return $this;
    }

    /**
     * Get vocerias
     *
     * @return \Censo\CensoBundle\Entity\Vocerias 
     */
    public function getVocerias()
    {
        return $this->vocerias;
    }

    /**
     * Add enfermedades
     *
     * @param \Censo\CensoBundle\Entity\Enfermedades $enfermedades
     * @return Habitantes
     */
    public function addEnfermedade(\Censo\CensoBundle\Entity\Enfermedades $enfermedades)
    {
        $this->enfermedades[] = $enfermedades;

        return $this;
    }

    /**
     * Remove enfermedades
     *
     * @param \Censo\CensoBundle\Entity\Enfermedades $enfermedades
     */
    public function removeEnfermedade(\Censo\CensoBundle\Entity\Enfermedades $enfermedades)
    {
        $this->enfermedades->removeElement($enfermedades);
    }

    /**
     * Get enfermedades
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getEnfermedades()
    {
        return $this->enfermedades;
    }

    /**
     * Add discapacidades
     *
     * @param \Censo\CensoBundle\Entity\Discapacidades $discapacidades
     * @return Habitantes
     */
    public function addDiscapacidade(\Censo\CensoBundle\Entity\Discapacidades $discapacidades)
    {
        $this->discapacidades[] = $discapacidades;

        return $this;
    }

    /**
     * Remove discapacidades
     *
     * @param \Censo\CensoBundle\Entity\Discapacidades $discapacidades
     */
    public function removeDiscapacidade(\Censo\CensoBundle\Entity\Discapacidades $discapacidades)
    {
        $this->discapacidades->removeElement($discapacidades);
    }

    /**
     * Get discapacidades
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getDiscapacidades()
    {
        return $this->discapacidades;
    }
    

    /**
     * Set familias
     *
     * @param \Censo\CensoBundle\Entity\Familias $familias
     * @return Habitantes
     */
    public function setFamilias(\Censo\CensoBundle\Entity\Familias $familias = null)
    {
        $this->familias = $familias;

        return $this;
    }

    /**
     * Get familias
     *
     * @return \Censo\CensoBundle\Entity\Familias 
     */
    public function getFamilias()
    {
        return $this->familias;
    }
    
}
