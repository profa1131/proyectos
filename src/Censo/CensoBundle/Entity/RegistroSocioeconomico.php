<?php

namespace Censo\CensoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RegistroSocioeconomico
 *
 * @ORM\Table(name="registro_socioeconomico", indexes={@ORM\Index(name="IDX_637EBCFABED92726", columns={"recoleccion_basura_id"}), @ORM\Index(name="IDX_637EBCFAB93B4618", columns={"aguas_servidas_id"}), @ORM\Index(name="IDX_637EBCFA94784347", columns={"condiciones_salubridad_id"}), @ORM\Index(name="IDX_637EBCFA93C71764", columns={"forma_tenencias"}), @ORM\Index(name="IDX_637EBCFA379EDFD1", columns={"condicion_terreno_id"}), @ORM\Index(name="IDX_637EBCFAB7C04F60", columns={"tipo_viviendas_id"}), @ORM\Index(name="IDX_637EBCFAA87E6A14", columns={"familias_id"})})
 * @ORM\Entity
 */
class RegistroSocioeconomico
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\SequenceGenerator(sequenceName="registro_socioeconomico_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="ingreso_familiar", type="string", length=255, nullable=false)
     */
    private $ingresoFamiliar;

    /**
     * @var integer
     *
     * @ORM\Column(name="actividad_comercial_vivienda_id", type="bigint", nullable=false)
     */
    private $actividadComercialViviendaId;

    /**
     * @var string
     *
     * @ORM\Column(name="habitaciones_vivienda", type="string", nullable=false)
     */
    private $habitacionesVivienda;

    /**
     * @var string
     *
     * @ORM\Column(name="ninos_calle", type="string", length=255, nullable=false)
     */
    private $ninosCalle;

    /**
     * @var string
     *
     * @ORM\Column(name="indigentes", type="string", length=255, nullable=false)
     */
    private $indigentes;

    /**
     * @var string
     *
     * @ORM\Column(name="enfermos_terminales", type="string", length=255, nullable=false)
     */
    private $enfermosTerminales;

    /**
     * @var string
     *
     * @ORM\Column(name="discapacitados", type="string", length=255, nullable=false)
     */
    private $discapacitados;

    /**
     * @var string
     *
     * @ORM\Column(name="tercera_edad", type="string", length=255, nullable=false)
     */
    private $terceraEdad;

    /**
     * @var string
     *
     * @ORM\Column(name="ayuda_salud", type="string", length=255, nullable=false)
     */
    private $ayudaSalud;

    /**
     * @var string
     *
     * @ORM\Column(name="ayuda_vivienda", type="string", length=255, nullable=false)
     */
    private $ayudaVivienda;

    /**
     * @var string
     *
     * @ORM\Column(name="aguas_blancas", type="string", length=255, nullable=false)
     */
    private $aguasBlancas;

    /**
     * @var string
     *
     * @ORM\Column(name="tanque", type="string", length=255, nullable=false)
     */
    private $tanque;

    /**
     * @var string
     *
     * @ORM\Column(name="lts_tanque", type="string", length=255, nullable=false)
     */
    private $ltsTanque;

    /**
     * @var string
     *
     * @ORM\Column(name="tipo_tanque", type="string", length=255, nullable=false)
     */
    private $tipoTanque;

    /**
     * @var string
     *
     * @ORM\Column(name="pipotes", type="string", length=255, nullable=false)
     */
    private $pipotes;

    /**
     * @var string
     *
     * @ORM\Column(name="cuantos", type="string", length=255, nullable=false)
     */
    private $cuantos;

    /**
     * @var string
     *
     * @ORM\Column(name="tipo_pipotes", type="string", length=255, nullable=false)
     */
    private $tipoPipotes;

    /**
     * @var string
     *
     * @ORM\Column(name="medidor_agua", type="string", length=255, nullable=false)
     */
    private $medidorAgua;

    /**
     * @var string
     *
     * @ORM\Column(name="gas", type="string", length=255, nullable=false)
     */
    private $gas;

    /**
     * @var string
     *
     * @ORM\Column(name="empresa_gas", type="string", length=255, nullable=false)
     */
    private $empresaGas;

    /**
     * @var string
     *
     * @ORM\Column(name="cantidad_cilindros", type="string", length=255, nullable=false)
     */
    private $cantidadCilindros;

    /**
     * @var string
     *
     * @ORM\Column(name="capacidad_cilindro", type="string", length=255, nullable=false)
     */
    private $capacidadCilindro;

    /**
     * @var string
     *
     * @ORM\Column(name="duracion_cilindro", type="string", length=255, nullable=false)
     */
    private $duracionCilindro;

    /**
     * @var string
     *
     * @ORM\Column(name="precio_cilindro", type="string", length=255, nullable=false)
     */
    private $precioCilindro;

    /**
     * @var string
     *
     * @ORM\Column(name="sistema_electrico", type="string", length=255, nullable=false)
     */
    private $sistemaElectrico;

    /**
     * @var string
     *
     * @ORM\Column(name="medidor", type="string", length=255, nullable=false)
     */
    private $medidor;

    /**
     * @var string
     *
     * @ORM\Column(name="bombillos_ahorradores", type="string", length=255, nullable=false)
     */
    private $bombillosAhorradores;

    /**
     * @var string
     *
     * @ORM\Column(name="cuantos_bobillos_necesita", type="string", length=255, nullable=false)
     */
    private $cuantosBobillosNecesita;

    /**
     * @var integer
     *
     * @ORM\Column(name="mecanismo_informacion_id", type="bigint", nullable=false)
     */
    private $mecanismoInformacionId;

    /**
     * @var string
     *
     * @ORM\Column(name="organizaciones_counitarias", type="string", length=255, nullable=false)
     */
    private $organizacionesCounitarias;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="date", nullable=true)
     */
    private $fecha;

    /**
     * @var string
     *
     * @ORM\Column(name="registro_socioeconomico", type="string", length=10, nullable=false)
     */
    private $registroSocioeconomico;

    /**
     * @var \RecoleccionBasura
     *
     * @ORM\ManyToOne(targetEntity="RecoleccionBasura")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="recoleccion_basura_id", referencedColumnName="id")
     * })
     */
    private $recoleccionBasura;

    /**
     * @var \AguasServidas
     *
     * @ORM\ManyToOne(targetEntity="AguasServidas")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="aguas_servidas_id", referencedColumnName="id")
     * })
     */
    private $aguasServidas;

    /**
     * @var \CondicionesSalubridad
     *
     * @ORM\ManyToOne(targetEntity="CondicionesSalubridad")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="condiciones_salubridad_id", referencedColumnName="id")
     * })
     */
    private $condicionesSalubridad;

    /**
     * @var \FormaTenencias
     *
     * @ORM\ManyToOne(targetEntity="FormaTenencias")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="forma_tenencias", referencedColumnName="id")
     * })
     */
    private $formaTenencias;

    /**
     * @var \CondicionTerrenos
     *
     * @ORM\ManyToOne(targetEntity="CondicionTerrenos")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="condicion_terreno_id", referencedColumnName="id")
     * })
     */
    private $condicionTerreno;

    /**
     * @var \TipoViviendas
     *
     * @ORM\ManyToOne(targetEntity="TipoViviendas")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tipo_viviendas_id", referencedColumnName="id")
     * })
     */
    private $tipoViviendas;

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
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Telefonias", mappedBy="registroSocioeconomico")
     */
    private $telefonias;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Misiones", mappedBy="registroSocioeconomico")
     */
    private $misiones;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Transportes", inversedBy="registroSocioeconomico")
     * @ORM\JoinTable(name="registro_transporte",
     *   joinColumns={
     *     @ORM\JoinColumn(name="registro_socioeconomico_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="transporte_id", referencedColumnName="id")
     *   }
     * )
     */
    private $transporte;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Plagas", inversedBy="registroSocioeconomico")
     * @ORM\JoinTable(name="registro_plagas",
     *   joinColumns={
     *     @ORM\JoinColumn(name="registro_socioeconomico_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="plagas_id", referencedColumnName="id")
     *   }
     * )
     */
    private $plagas;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="ServiciosComunales", mappedBy="registroSocioeconomico")
     */
    private $serviciosComunales;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="TipoTechos", mappedBy="registroSocioeconomico")
     */
    private $tipoTechos;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="MecanismosInformacion", inversedBy="registroSocioeconomico")
     * @ORM\JoinTable(name="registro_mecanismos_informacion",
     *   joinColumns={
     *     @ORM\JoinColumn(name="registro_socioeconomico_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="mecanismos_informacion_id", referencedColumnName="id")
     *   }
     * )
     */
    private $mecanismosInformacion;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Animales", inversedBy="registroSocioeconomico")
     * @ORM\JoinTable(name="registro_animales",
     *   joinColumns={
     *     @ORM\JoinColumn(name="registro_socioeconomico_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="animales_id", referencedColumnName="id")
     *   }
     * )
     */
    private $animales;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="ActividadComercialVivienda", mappedBy="rgistroSocioeconomico")
     */
    private $actividadComercial;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Enseres", inversedBy="registroSocioeconomico")
     * @ORM\JoinTable(name="registro_enseres",
     *   joinColumns={
     *     @ORM\JoinColumn(name="registro_socioeconomico_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="enseres_id", referencedColumnName="id")
     *   }
     * )
     */
    private $enseres;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="TipoParedes", mappedBy="registroSocioeconomico")
     */
    private $tipoParedes;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Preguntas", mappedBy="registroSocioeconomico")
     */
    private $preguntas;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->telefonias = new \Doctrine\Common\Collections\ArrayCollection();
        $this->misiones = new \Doctrine\Common\Collections\ArrayCollection();
        $this->transporte = new \Doctrine\Common\Collections\ArrayCollection();
        $this->plagas = new \Doctrine\Common\Collections\ArrayCollection();
        $this->serviciosComunales = new \Doctrine\Common\Collections\ArrayCollection();
        $this->tipoTechos = new \Doctrine\Common\Collections\ArrayCollection();
        $this->mecanismosInformacion = new \Doctrine\Common\Collections\ArrayCollection();
        $this->animales = new \Doctrine\Common\Collections\ArrayCollection();
        $this->actividadComercial = new \Doctrine\Common\Collections\ArrayCollection();
        $this->enseres = new \Doctrine\Common\Collections\ArrayCollection();
        $this->tipoParedes = new \Doctrine\Common\Collections\ArrayCollection();
        $this->preguntas = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set ingresoFamiliar
     *
     * @param string $ingresoFamiliar
     * @return RegistroSocioeconomico
     */
    public function setIngresoFamiliar($ingresoFamiliar)
    {
        $this->ingresoFamiliar = $ingresoFamiliar;

        return $this;
    }

    /**
     * Get ingresoFamiliar
     *
     * @return string 
     */
    public function getIngresoFamiliar()
    {
        return $this->ingresoFamiliar;
    }

    /**
     * Set actividadComercialViviendaId
     *
     * @param integer $actividadComercialViviendaId
     * @return RegistroSocioeconomico
     */
    public function setActividadComercialViviendaId($actividadComercialViviendaId)
    {
        $this->actividadComercialViviendaId = $actividadComercialViviendaId;

        return $this;
    }

    /**
     * Get actividadComercialViviendaId
     *
     * @return integer 
     */
    public function getActividadComercialViviendaId()
    {
        return $this->actividadComercialViviendaId;
    }

    /**
     * Set habitacionesVivienda
     *
     * @param string $habitacionesVivienda
     * @return RegistroSocioeconomico
     */
    public function setHabitacionesVivienda($habitacionesVivienda)
    {
        $this->habitacionesVivienda = $habitacionesVivienda;

        return $this;
    }

    /**
     * Get habitacionesVivienda
     *
     * @return string 
     */
    public function getHabitacionesVivienda()
    {
        return $this->habitacionesVivienda;
    }

    /**
     * Set ninosCalle
     *
     * @param string $ninosCalle
     * @return RegistroSocioeconomico
     */
    public function setNinosCalle($ninosCalle)
    {
        $this->ninosCalle = $ninosCalle;

        return $this;
    }

    /**
     * Get ninosCalle
     *
     * @return string 
     */
    public function getNinosCalle()
    {
        return $this->ninosCalle;
    }

    /**
     * Set indigentes
     *
     * @param string $indigentes
     * @return RegistroSocioeconomico
     */
    public function setIndigentes($indigentes)
    {
        $this->indigentes = $indigentes;

        return $this;
    }

    /**
     * Get indigentes
     *
     * @return string 
     */
    public function getIndigentes()
    {
        return $this->indigentes;
    }

    /**
     * Set enfermosTerminales
     *
     * @param string $enfermosTerminales
     * @return RegistroSocioeconomico
     */
    public function setEnfermosTerminales($enfermosTerminales)
    {
        $this->enfermosTerminales = $enfermosTerminales;

        return $this;
    }

    /**
     * Get enfermosTerminales
     *
     * @return string 
     */
    public function getEnfermosTerminales()
    {
        return $this->enfermosTerminales;
    }

    /**
     * Set discapacitados
     *
     * @param string $discapacitados
     * @return RegistroSocioeconomico
     */
    public function setDiscapacitados($discapacitados)
    {
        $this->discapacitados = $discapacitados;

        return $this;
    }

    /**
     * Get discapacitados
     *
     * @return string 
     */
    public function getDiscapacitados()
    {
        return $this->discapacitados;
    }

    /**
     * Set terceraEdad
     *
     * @param string $terceraEdad
     * @return RegistroSocioeconomico
     */
    public function setTerceraEdad($terceraEdad)
    {
        $this->terceraEdad = $terceraEdad;

        return $this;
    }

    /**
     * Get terceraEdad
     *
     * @return string 
     */
    public function getTerceraEdad()
    {
        return $this->terceraEdad;
    }

    /**
     * Set ayudaSalud
     *
     * @param string $ayudaSalud
     * @return RegistroSocioeconomico
     */
    public function setAyudaSalud($ayudaSalud)
    {
        $this->ayudaSalud = $ayudaSalud;

        return $this;
    }

    /**
     * Get ayudaSalud
     *
     * @return string 
     */
    public function getAyudaSalud()
    {
        return $this->ayudaSalud;
    }

    /**
     * Set ayudaVivienda
     *
     * @param string $ayudaVivienda
     * @return RegistroSocioeconomico
     */
    public function setAyudaVivienda($ayudaVivienda)
    {
        $this->ayudaVivienda = $ayudaVivienda;

        return $this;
    }

    /**
     * Get ayudaVivienda
     *
     * @return string 
     */
    public function getAyudaVivienda()
    {
        return $this->ayudaVivienda;
    }

    /**
     * Set aguasBlancas
     *
     * @param string $aguasBlancas
     * @return RegistroSocioeconomico
     */
    public function setAguasBlancas($aguasBlancas)
    {
        $this->aguasBlancas = $aguasBlancas;

        return $this;
    }

    /**
     * Get aguasBlancas
     *
     * @return string 
     */
    public function getAguasBlancas()
    {
        return $this->aguasBlancas;
    }

    /**
     * Set tanque
     *
     * @param string $tanque
     * @return RegistroSocioeconomico
     */
    public function setTanque($tanque)
    {
        $this->tanque = $tanque;

        return $this;
    }

    /**
     * Get tanque
     *
     * @return string 
     */
    public function getTanque()
    {
        return $this->tanque;
    }

    /**
     * Set ltsTanque
     *
     * @param string $ltsTanque
     * @return RegistroSocioeconomico
     */
    public function setLtsTanque($ltsTanque)
    {
        $this->ltsTanque = $ltsTanque;

        return $this;
    }

    /**
     * Get ltsTanque
     *
     * @return string 
     */
    public function getLtsTanque()
    {
        return $this->ltsTanque;
    }

    /**
     * Set tipoTanque
     *
     * @param string $tipoTanque
     * @return RegistroSocioeconomico
     */
    public function setTipoTanque($tipoTanque)
    {
        $this->tipoTanque = $tipoTanque;

        return $this;
    }

    /**
     * Get tipoTanque
     *
     * @return string 
     */
    public function getTipoTanque()
    {
        return $this->tipoTanque;
    }

    /**
     * Set pipotes
     *
     * @param string $pipotes
     * @return RegistroSocioeconomico
     */
    public function setPipotes($pipotes)
    {
        $this->pipotes = $pipotes;

        return $this;
    }

    /**
     * Get pipotes
     *
     * @return string 
     */
    public function getPipotes()
    {
        return $this->pipotes;
    }

    /**
     * Set cuantos
     *
     * @param string $cuantos
     * @return RegistroSocioeconomico
     */
    public function setCuantos($cuantos)
    {
        $this->cuantos = $cuantos;

        return $this;
    }

    /**
     * Get cuantos
     *
     * @return string 
     */
    public function getCuantos()
    {
        return $this->cuantos;
    }

    /**
     * Set tipoPipotes
     *
     * @param string $tipoPipotes
     * @return RegistroSocioeconomico
     */
    public function setTipoPipotes($tipoPipotes)
    {
        $this->tipoPipotes = $tipoPipotes;

        return $this;
    }

    /**
     * Get tipoPipotes
     *
     * @return string 
     */
    public function getTipoPipotes()
    {
        return $this->tipoPipotes;
    }

    /**
     * Set medidorAgua
     *
     * @param string $medidorAgua
     * @return RegistroSocioeconomico
     */
    public function setMedidorAgua($medidorAgua)
    {
        $this->medidorAgua = $medidorAgua;

        return $this;
    }

    /**
     * Get medidorAgua
     *
     * @return string 
     */
    public function getMedidorAgua()
    {
        return $this->medidorAgua;
    }

    /**
     * Set gas
     *
     * @param string $gas
     * @return RegistroSocioeconomico
     */
    public function setGas($gas)
    {
        $this->gas = $gas;

        return $this;
    }

    /**
     * Get gas
     *
     * @return string 
     */
    public function getGas()
    {
        return $this->gas;
    }

    /**
     * Set empresaGas
     *
     * @param string $empresaGas
     * @return RegistroSocioeconomico
     */
    public function setEmpresaGas($empresaGas)
    {
        $this->empresaGas = $empresaGas;

        return $this;
    }

    /**
     * Get empresaGas
     *
     * @return string 
     */
    public function getEmpresaGas()
    {
        return $this->empresaGas;
    }

    /**
     * Set cantidadCilindros
     *
     * @param string $cantidadCilindros
     * @return RegistroSocioeconomico
     */
    public function setCantidadCilindros($cantidadCilindros)
    {
        $this->cantidadCilindros = $cantidadCilindros;

        return $this;
    }

    /**
     * Get cantidadCilindros
     *
     * @return string 
     */
    public function getCantidadCilindros()
    {
        return $this->cantidadCilindros;
    }

    /**
     * Set capacidadCilindro
     *
     * @param string $capacidadCilindro
     * @return RegistroSocioeconomico
     */
    public function setCapacidadCilindro($capacidadCilindro)
    {
        $this->capacidadCilindro = $capacidadCilindro;

        return $this;
    }

    /**
     * Get capacidadCilindro
     *
     * @return string 
     */
    public function getCapacidadCilindro()
    {
        return $this->capacidadCilindro;
    }

    /**
     * Set duracionCilindro
     *
     * @param string $duracionCilindro
     * @return RegistroSocioeconomico
     */
    public function setDuracionCilindro($duracionCilindro)
    {
        $this->duracionCilindro = $duracionCilindro;

        return $this;
    }

    /**
     * Get duracionCilindro
     *
     * @return string 
     */
    public function getDuracionCilindro()
    {
        return $this->duracionCilindro;
    }

    /**
     * Set precioCilindro
     *
     * @param string $precioCilindro
     * @return RegistroSocioeconomico
     */
    public function setPrecioCilindro($precioCilindro)
    {
        $this->precioCilindro = $precioCilindro;

        return $this;
    }

    /**
     * Get precioCilindro
     *
     * @return string 
     */
    public function getPrecioCilindro()
    {
        return $this->precioCilindro;
    }

    /**
     * Set sistemaElectrico
     *
     * @param string $sistemaElectrico
     * @return RegistroSocioeconomico
     */
    public function setSistemaElectrico($sistemaElectrico)
    {
        $this->sistemaElectrico = $sistemaElectrico;

        return $this;
    }

    /**
     * Get sistemaElectrico
     *
     * @return string 
     */
    public function getSistemaElectrico()
    {
        return $this->sistemaElectrico;
    }

    /**
     * Set medidor
     *
     * @param string $medidor
     * @return RegistroSocioeconomico
     */
    public function setMedidor($medidor)
    {
        $this->medidor = $medidor;

        return $this;
    }

    /**
     * Get medidor
     *
     * @return string 
     */
    public function getMedidor()
    {
        return $this->medidor;
    }

    /**
     * Set bombillosAhorradores
     *
     * @param string $bombillosAhorradores
     * @return RegistroSocioeconomico
     */
    public function setBombillosAhorradores($bombillosAhorradores)
    {
        $this->bombillosAhorradores = $bombillosAhorradores;

        return $this;
    }

    /**
     * Get bombillosAhorradores
     *
     * @return string 
     */
    public function getBombillosAhorradores()
    {
        return $this->bombillosAhorradores;
    }

    /**
     * Set cuantosBobillosNecesita
     *
     * @param string $cuantosBobillosNecesita
     * @return RegistroSocioeconomico
     */
    public function setCuantosBobillosNecesita($cuantosBobillosNecesita)
    {
        $this->cuantosBobillosNecesita = $cuantosBobillosNecesita;

        return $this;
    }

    /**
     * Get cuantosBobillosNecesita
     *
     * @return string 
     */
    public function getCuantosBobillosNecesita()
    {
        return $this->cuantosBobillosNecesita;
    }

    /**
     * Set mecanismoInformacionId
     *
     * @param integer $mecanismoInformacionId
     * @return RegistroSocioeconomico
     */
    public function setMecanismoInformacionId($mecanismoInformacionId)
    {
        $this->mecanismoInformacionId = $mecanismoInformacionId;

        return $this;
    }

    /**
     * Get mecanismoInformacionId
     *
     * @return integer 
     */
    public function getMecanismoInformacionId()
    {
        return $this->mecanismoInformacionId;
    }

    /**
     * Set organizacionesCounitarias
     *
     * @param string $organizacionesCounitarias
     * @return RegistroSocioeconomico
     */
    public function setOrganizacionesCounitarias($organizacionesCounitarias)
    {
        $this->organizacionesCounitarias = $organizacionesCounitarias;

        return $this;
    }

    /**
     * Get organizacionesCounitarias
     *
     * @return string 
     */
    public function getOrganizacionesCounitarias()
    {
        return $this->organizacionesCounitarias;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return RegistroSocioeconomico
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime 
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set registroSocioeconomico
     *
     * @param string $registroSocioeconomico
     * @return RegistroSocioeconomico
     */
    public function setRegistroSocioeconomico($registroSocioeconomico)
    {
        $this->registroSocioeconomico = $registroSocioeconomico;

        return $this;
    }

    /**
     * Get registroSocioeconomico
     *
     * @return string 
     */
    public function getRegistroSocioeconomico()
    {
        return $this->registroSocioeconomico;
    }

    /**
     * Set recoleccionBasura
     *
     * @param \Censo\CensoBundle\Entity\RecoleccionBasura $recoleccionBasura
     * @return RegistroSocioeconomico
     */
    public function setRecoleccionBasura(\Censo\CensoBundle\Entity\RecoleccionBasura $recoleccionBasura = null)
    {
        $this->recoleccionBasura = $recoleccionBasura;

        return $this;
    }

    /**
     * Get recoleccionBasura
     *
     * @return \Censo\CensoBundle\Entity\RecoleccionBasura 
     */
    public function getRecoleccionBasura()
    {
        return $this->recoleccionBasura;
    }

    /**
     * Set aguasServidas
     *
     * @param \Censo\CensoBundle\Entity\AguasServidas $aguasServidas
     * @return RegistroSocioeconomico
     */
    public function setAguasServidas(\Censo\CensoBundle\Entity\AguasServidas $aguasServidas = null)
    {
        $this->aguasServidas = $aguasServidas;

        return $this;
    }

    /**
     * Get aguasServidas
     *
     * @return \Censo\CensoBundle\Entity\AguasServidas 
     */
    public function getAguasServidas()
    {
        return $this->aguasServidas;
    }

    /**
     * Set condicionesSalubridad
     *
     * @param \Censo\CensoBundle\Entity\CondicionesSalubridad $condicionesSalubridad
     * @return RegistroSocioeconomico
     */
    public function setCondicionesSalubridad(\Censo\CensoBundle\Entity\CondicionesSalubridad $condicionesSalubridad = null)
    {
        $this->condicionesSalubridad = $condicionesSalubridad;

        return $this;
    }

    /**
     * Get condicionesSalubridad
     *
     * @return \Censo\CensoBundle\Entity\CondicionesSalubridad 
     */
    public function getCondicionesSalubridad()
    {
        return $this->condicionesSalubridad;
    }

    /**
     * Set formaTenencias
     *
     * @param \Censo\CensoBundle\Entity\FormaTenencias $formaTenencias
     * @return RegistroSocioeconomico
     */
    public function setFormaTenencias(\Censo\CensoBundle\Entity\FormaTenencias $formaTenencias = null)
    {
        $this->formaTenencias = $formaTenencias;

        return $this;
    }

    /**
     * Get formaTenencias
     *
     * @return \Censo\CensoBundle\Entity\FormaTenencias 
     */
    public function getFormaTenencias()
    {
        return $this->formaTenencias;
    }

    /**
     * Set condicionTerreno
     *
     * @param \Censo\CensoBundle\Entity\CondicionTerrenos $condicionTerreno
     * @return RegistroSocioeconomico
     */
    public function setCondicionTerreno(\Censo\CensoBundle\Entity\CondicionTerrenos $condicionTerreno = null)
    {
        $this->condicionTerreno = $condicionTerreno;

        return $this;
    }

    /**
     * Get condicionTerreno
     *
     * @return \Censo\CensoBundle\Entity\CondicionTerrenos 
     */
    public function getCondicionTerreno()
    {
        return $this->condicionTerreno;
    }

    /**
     * Set tipoViviendas
     *
     * @param \Censo\CensoBundle\Entity\TipoViviendas $tipoViviendas
     * @return RegistroSocioeconomico
     */
    public function setTipoViviendas(\Censo\CensoBundle\Entity\TipoViviendas $tipoViviendas = null)
    {
        $this->tipoViviendas = $tipoViviendas;

        return $this;
    }

    /**
     * Get tipoViviendas
     *
     * @return \Censo\CensoBundle\Entity\TipoViviendas 
     */
    public function getTipoViviendas()
    {
        return $this->tipoViviendas;
    }

    /**
     * Set familias
     *
     * @param \Censo\CensoBundle\Entity\Familias $familias
     * @return RegistroSocioeconomico
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

    /**
     * Add telefonias
     *
     * @param \Censo\CensoBundle\Entity\Telefonias $telefonias
     * @return RegistroSocioeconomico
     */
    public function addTelefonia(\Censo\CensoBundle\Entity\Telefonias $telefonias)
    {
        $this->telefonias[] = $telefonias;

        return $this;
    }

    /**
     * Remove telefonias
     *
     * @param \Censo\CensoBundle\Entity\Telefonias $telefonias
     */
    public function removeTelefonia(\Censo\CensoBundle\Entity\Telefonias $telefonias)
    {
        $this->telefonias->removeElement($telefonias);
    }

    /**
     * Get telefonias
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTelefonias()
    {
        return $this->telefonias;
    }

    /**
     * Add misiones
     *
     * @param \Censo\CensoBundle\Entity\Misiones $misiones
     * @return RegistroSocioeconomico
     */
    public function addMisione(\Censo\CensoBundle\Entity\Misiones $misiones)
    {
        $this->misiones[] = $misiones;

        return $this;
    }

    /**
     * Remove misiones
     *
     * @param \Censo\CensoBundle\Entity\Misiones $misiones
     */
    public function removeMisione(\Censo\CensoBundle\Entity\Misiones $misiones)
    {
        $this->misiones->removeElement($misiones);
    }

    /**
     * Get misiones
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMisiones()
    {
        return $this->misiones;
    }

    /**
     * Add transporte
     *
     * @param \Censo\CensoBundle\Entity\Transportes $transporte
     * @return RegistroSocioeconomico
     */
    public function addTransporte(\Censo\CensoBundle\Entity\Transportes $transporte)
    {
        $this->transporte[] = $transporte;

        return $this;
    }

    /**
     * Remove transporte
     *
     * @param \Censo\CensoBundle\Entity\Transportes $transporte
     */
    public function removeTransporte(\Censo\CensoBundle\Entity\Transportes $transporte)
    {
        $this->transporte->removeElement($transporte);
    }

    /**
     * Get transporte
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTransporte()
    {
        return $this->transporte;
    }

    /**
     * Add plagas
     *
     * @param \Censo\CensoBundle\Entity\Plagas $plagas
     * @return RegistroSocioeconomico
     */
    public function addPlaga(\Censo\CensoBundle\Entity\Plagas $plagas)
    {
        $this->plagas[] = $plagas;

        return $this;
    }

    /**
     * Remove plagas
     *
     * @param \Censo\CensoBundle\Entity\Plagas $plagas
     */
    public function removePlaga(\Censo\CensoBundle\Entity\Plagas $plagas)
    {
        $this->plagas->removeElement($plagas);
    }

    /**
     * Get plagas
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPlagas()
    {
        return $this->plagas;
    }

    /**
     * Add serviciosComunales
     *
     * @param \Censo\CensoBundle\Entity\ServiciosComunales $serviciosComunales
     * @return RegistroSocioeconomico
     */
    public function addServiciosComunale(\Censo\CensoBundle\Entity\ServiciosComunales $serviciosComunales)
    {
        $this->serviciosComunales[] = $serviciosComunales;

        return $this;
    }

    /**
     * Remove serviciosComunales
     *
     * @param \Censo\CensoBundle\Entity\ServiciosComunales $serviciosComunales
     */
    public function removeServiciosComunale(\Censo\CensoBundle\Entity\ServiciosComunales $serviciosComunales)
    {
        $this->serviciosComunales->removeElement($serviciosComunales);
    }

    /**
     * Get serviciosComunales
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getServiciosComunales()
    {
        return $this->serviciosComunales;
    }

    /**
     * Add tipoTechos
     *
     * @param \Censo\CensoBundle\Entity\TipoTechos $tipoTechos
     * @return RegistroSocioeconomico
     */
    public function addTipoTecho(\Censo\CensoBundle\Entity\TipoTechos $tipoTechos)
    {
        $this->tipoTechos[] = $tipoTechos;

        return $this;
    }

    /**
     * Remove tipoTechos
     *
     * @param \Censo\CensoBundle\Entity\TipoTechos $tipoTechos
     */
    public function removeTipoTecho(\Censo\CensoBundle\Entity\TipoTechos $tipoTechos)
    {
        $this->tipoTechos->removeElement($tipoTechos);
    }

    /**
     * Get tipoTechos
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTipoTechos()
    {
        return $this->tipoTechos;
    }

    /**
     * Add mecanismosInformacion
     *
     * @param \Censo\CensoBundle\Entity\MecanismosInformacion $mecanismosInformacion
     * @return RegistroSocioeconomico
     */
    public function addMecanismosInformacion(\Censo\CensoBundle\Entity\MecanismosInformacion $mecanismosInformacion)
    {
        $this->mecanismosInformacion[] = $mecanismosInformacion;

        return $this;
    }

    /**
     * Remove mecanismosInformacion
     *
     * @param \Censo\CensoBundle\Entity\MecanismosInformacion $mecanismosInformacion
     */
    public function removeMecanismosInformacion(\Censo\CensoBundle\Entity\MecanismosInformacion $mecanismosInformacion)
    {
        $this->mecanismosInformacion->removeElement($mecanismosInformacion);
    }

    /**
     * Get mecanismosInformacion
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMecanismosInformacion()
    {
        return $this->mecanismosInformacion;
    }

    /**
     * Add animales
     *
     * @param \Censo\CensoBundle\Entity\Animales $animales
     * @return RegistroSocioeconomico
     */
    public function addAnimale(\Censo\CensoBundle\Entity\Animales $animales)
    {
        $this->animales[] = $animales;

        return $this;
    }

    /**
     * Remove animales
     *
     * @param \Censo\CensoBundle\Entity\Animales $animales
     */
    public function removeAnimale(\Censo\CensoBundle\Entity\Animales $animales)
    {
        $this->animales->removeElement($animales);
    }

    /**
     * Get animales
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAnimales()
    {
        return $this->animales;
    }

    /**
     * Add actividadComercial
     *
     * @param \Censo\CensoBundle\Entity\ActividadComercialVivienda $actividadComercial
     * @return RegistroSocioeconomico
     */
    public function addActividadComercial(\Censo\CensoBundle\Entity\ActividadComercialVivienda $actividadComercial)
    {
        $this->actividadComercial[] = $actividadComercial;

        return $this;
    }

    /**
     * Remove actividadComercial
     *
     * @param \Censo\CensoBundle\Entity\ActividadComercialVivienda $actividadComercial
     */
    public function removeActividadComercial(\Censo\CensoBundle\Entity\ActividadComercialVivienda $actividadComercial)
    {
        $this->actividadComercial->removeElement($actividadComercial);
    }

    /**
     * Get actividadComercial
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getActividadComercial()
    {
        return $this->actividadComercial;
    }

    /**
     * Add enseres
     *
     * @param \Censo\CensoBundle\Entity\Enseres $enseres
     * @return RegistroSocioeconomico
     */
    public function addEnsere(\Censo\CensoBundle\Entity\Enseres $enseres)
    {
        $this->enseres[] = $enseres;

        return $this;
    }

    /**
     * Remove enseres
     *
     * @param \Censo\CensoBundle\Entity\Enseres $enseres
     */
    public function removeEnsere(\Censo\CensoBundle\Entity\Enseres $enseres)
    {
        $this->enseres->removeElement($enseres);
    }

    /**
     * Get enseres
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getEnseres()
    {
        return $this->enseres;
    }

    /**
     * Add tipoParedes
     *
     * @param \Censo\CensoBundle\Entity\TipoParedes $tipoParedes
     * @return RegistroSocioeconomico
     */
    public function addTipoParede(\Censo\CensoBundle\Entity\TipoParedes $tipoParedes)
    {
        $this->tipoParedes[] = $tipoParedes;

        return $this;
    }

    /**
     * Remove tipoParedes
     *
     * @param \Censo\CensoBundle\Entity\TipoParedes $tipoParedes
     */
    public function removeTipoParede(\Censo\CensoBundle\Entity\TipoParedes $tipoParedes)
    {
        $this->tipoParedes->removeElement($tipoParedes);
    }

    /**
     * Get tipoParedes
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTipoParedes()
    {
        return $this->tipoParedes;
    }

    /**
     * Add preguntas
     *
     * @param \Censo\CensoBundle\Entity\Preguntas $preguntas
     * @return RegistroSocioeconomico
     */
    public function addPregunta(\Censo\CensoBundle\Entity\Preguntas $preguntas)
    {
        $this->preguntas[] = $preguntas;

        return $this;
    }

    /**
     * Remove preguntas
     *
     * @param \Censo\CensoBundle\Entity\Preguntas $preguntas
     */
    public function removePregunta(\Censo\CensoBundle\Entity\Preguntas $preguntas)
    {
        $this->preguntas->removeElement($preguntas);
    }

    /**
     * Get preguntas
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPreguntas()
    {
        return $this->preguntas;
    }
}
