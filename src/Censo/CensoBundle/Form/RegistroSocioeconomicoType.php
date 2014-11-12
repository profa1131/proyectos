<?php

namespace Censo\CensoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class RegistroSocioeconomicoType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('ingresoFamiliar', 'text', array(
                    'label' => '* Ingreso Familiar',
                    'required' => 'true',
                    'attr' => array('class' => 'form-control',
                        'placeholder' => 'Indique el Numero de Telefono Celular'),
                ))              
            ->add('habitacionesVivienda', 'text', array(
                    'label' => '* Habitaciones de la Vivienda',
                    'required' => 'true',
                    'attr' => array('class' => 'form-control',
                        'placeholder' => 'Indique el Numero de Habitaciones '),
                ))
            ->add('ninosCalle', 'choice', array(
                    'choices' => array(
                        'si' => 'SI',
                        'no' => 'NO'
                    ),
                    'required' => true,
                    'expanded' => true
                ))
            ->add('indigentes', 'choice', array(
                    'choices' => array(
                        'si' => 'SI',
                        'no' => 'NO'
                    ),
                    'required' => true,
                    'expanded' => true
                ))
            ->add('enfermosTerminales', 'choice', array(
                    'choices' => array(
                        'si' => 'SI',
                        'no' => 'NO'
                    ),
                    'required' => true,
                    'expanded' => true
                ))
            ->add('discapacitados', 'choice', array(
                    'choices' => array(
                        'si' => 'SI',
                        'no' => 'NO'
                    ),
                    'required' => true,
                    'expanded' => true
                ))
            ->add('terceraEdad', 'choice', array(
                    'choices' => array(
                        'si' => 'SI',
                        'no' => 'NO'
                    ),
                    'required' => true,
                    'expanded' => true
                ))
            ->add('ayudaSalud', 'choice', array(
                    'choices' => array(
                        'si' => 'SI',
                        'no' => 'NO'
                    ),
                    'required' => true,
                    'expanded' => true
                ))
            ->add('ayudaVivienda', 'choice', array(
                    'choices' => array(
                        'si' => 'SI',
                        'no' => 'NO'
                    ),
                    'required' => true,
                    'expanded' => true
                ))
            ->add('aguasBlancas', 'choice', array(
                    'choices' => array(
                        'si' => 'SI',
                        'no' => 'NO'
                    ),
                    'required' => true,
                    'expanded' => true
                ))
            ->add('tanque', 'choice', array(
                    'choices' => array(
                        'si' => 'SI',
                        'no' => 'NO'
                    ),
                    'required' => true,
                    'expanded' => true
                ))
            ->add('ltsTanque', 'text', array(
                    'label' => '* Litros del Tanque',
                    'required' => 'true',
                    'attr' => array('class' => 'form-control',
                        'placeholder' => 'Indique el Numero de Telefono Celular'),
                ))
            ->add('tipoTanque', 'text', array(
                    'label' => '* Tipo de Tanque',
                    'required' => 'true',
                    'attr' => array('class' => 'form-control',
                        'placeholder' => 'Tipo de Tanque'),
                ))
            ->add('pipotes', 'choice', array(
                    'choices' => array(
                        'si' => 'SI',
                        'no' => 'NO'
                    ),
                    'required' => true,
                    'expanded' => true
                ))
            ->add('cuantos', 'text', array(
                    'label' => '* Cuantos Pipotes',
                    'required' => 'true',
                    'attr' => array('class' => 'form-control',
                        'placeholder' => 'Cuantos Pipotes'),
                ))
            ->add('tipoPipotes', 'text', array(
                    'label' => '* Tipo de Pipotes',
                    'required' => 'true',
                    'attr' => array('class' => 'form-control',
                        'placeholder' => 'Tipos de Pipotes'),
                ))
            ->add('medidorAgua', 'choice', array(
                    'choices' => array(
                        'si' => 'SI',
                        'no' => 'NO'
                    ),
                    'required' => true,
                    'expanded' => true
                ))
            ->add('gas', 'choice', array(
                    'choices' => array(
                        'si' => 'SI',
                        'no' => 'NO'
                    ),
                    'required' => true,
                    'expanded' => true
                ))
            ->add('empresaGas', 'text', array(
                    'label' => '* Empresa de GAS',
                    'required' => 'true',
                    'attr' => array('class' => 'form-control',
                        'placeholder' => 'Empresa de gas'),
                ))
            ->add('cantidadCilindros', 'text', array(
                    'label' => '* Cantidad de Cilindros',
                    'required' => 'true',
                    'attr' => array('class' => 'form-control',
                        'placeholder' => 'Cantidad de Cilindros'),
                ))
            ->add('capacidadCilindro', 'text', array(
                    'label' => '* Capacidad de Cilindros',
                    'required' => 'true',
                    'attr' => array('class' => 'form-control',
                        'placeholder' => 'Capacidadad de Cilindros'),
                ))
            ->add('duracionCilindro', 'text', array(
                    'label' => '* Duracion de Cilindros',
                    'required' => 'true',
                    'attr' => array('class' => 'form-control',
                        'placeholder' => 'Duracion de Cilindros'),
                ))
            ->add('precioCilindro', 'text', array(
                    'label' => '* Precio del Cilindro',
                    'required' => 'true',
                    'attr' => array('class' => 'form-control',
                        'placeholder' => 'Precio del Cilindro'),
                ))
            ->add('sistemaElectrico', 'choice', array(
                    'choices' => array(
                        'si' => 'SI',
                        'no' => 'NO'
                    ),
                    'required' => true,
                    'expanded' => true
                ))
            ->add('medidor', 'choice', array(
                    'choices' => array(
                        'si' => 'SI',
                        'no' => 'NO'
                    ),
                    'required' => true,
                    'expanded' => true
                ))
            ->add('bombillosAhorradores', 'choice', array(
                    'choices' => array(
                        'si' => 'SI',
                        'no' => 'NO'
                    ),
                    'required' => true,
                    'expanded' => true
                ))
            ->add('cuantosBobillosNecesita', 'text', array(
                    'label' => '* Cuantos Bombillos Necesita',
                    'required' => 'true',
                    'attr' => array('class' => 'form-control',
                        'placeholder' => 'Cuantos Bombillos Necesita'),
                ))
            ->add('mecanismoInformacionId', 'text', array(
                    'label' => '* mecanismos de Informacion',
                    'required' => 'true',
                    'attr' => array('class' => 'form-control',
                        'placeholder' => 'Mecanismos de Informacion'),
                ))
            ->add('organizacionesCounitarias', 'text', array(
                    'label' => '* Organizaciones Comunitarias',
                    'required' => 'true',
                    'attr' => array('class' => 'form-control',
                        'placeholder' => 'Organizaciones Comunitarias'),
                ))
            ->add('fecha')
            ->add('registroSocioeconomico')
            ->add('recoleccionBasura', null, array(
                'label'=>'* Recoleccion de Basura',               
                'empty_value'=> 'Seleccione',
                'attr'=> array('class'=> 'form-control',
            )))
            ->add('aguasServidas', null, array(
                'label'=>'* Aguas Servidas',               
                'empty_value'=> 'Seleccione',
                'attr'=> array('class'=> 'form-control',
            )))
            ->add('condicionesSalubridad', null, array(
                'label'=>'* ondicion de Salubridad',               
                'empty_value'=> 'Seleccione',
                'attr'=> array('class'=> 'form-control',
            )))
            ->add('formaTenencias', null, array(
                'label'=>'* Forma de Tenencia',               
                'empty_value'=> 'Seleccione',
                'attr'=> array('class'=> 'form-control',
            )))
            ->add('condicionTerreno', null, array(
                'label'=>'* Condicion del Terreno',               
                'empty_value'=> 'Seleccione',
                'attr'=> array('class'=> 'form-control',
            )))
            ->add('tipoViviendas', null, array(
                'label'=>'* Tipo de Vivienda',               
                'empty_value'=> 'Seleccione',
                'attr'=> array('class'=> 'form-control',
            )))
            ->add('familias', null, array(
                'label'=>'* Familias',               
                'empty_value'=> 'Familia',
                'attr'=> array('class'=> 'form-control',
            )))
            ->add('telefonias', null, array(
                'label'=>'* Telefonias',
                    'expanded'=> true,
                    'multiple'=> true,
                'empty_value'=> 'Seleccione',
                
            ))
            ->add('misiones', null, array(
                'label'=>'* Misiones',
                    'expanded'=> true,
                    'multiple'=> true,
                'empty_value'=> 'Seleccione',
                
            ))
            ->add('transporte', null, array(
                'label'=>'* Medios de Transporte',
                    'expanded'=> true,
                    'multiple'=> true,
                'empty_value'=> 'Seleccione',
                
            ))
            ->add('plagas', null, array(
                'label'=>'* Plagas',
                    'expanded'=> true,
                    'multiple'=> true,
                'empty_value'=> 'Seleccione',
                
            ))
            ->add('serviciosComunales', null, array(
                'label'=>'* Servicios Comunales',
                    'expanded'=> true,
                    'multiple'=> true,
                'empty_value'=> 'Seleccione',
                
            ))
            ->add('tipoTechos', null, array(
                'label'=>'* Tipo de Techos',
                    'expanded'=> true,
                    'multiple'=> true,
                'empty_value'=> 'Seleccione',
                
            ))
            ->add('mecanismosInformacion', null, array(
                'label'=>'* Mecanismos de Informacion',
                    'expanded'=> true,
                    'multiple'=> true,
                'empty_value'=> 'Seleccione',
                
            ))
            ->add('animales', null, array(
                'label'=>'* Animales',
                    'expanded'=> true,
                    'multiple'=> true,
                'empty_value'=> 'Seleccione',
                
            ))
            ->add('actividadComercial', null, array(
                'label'=>'* Actividad Comercial',
                    'expanded'=> true,
                    'multiple'=> true,
                'empty_value'=> 'Seleccione',
                
            ))
            ->add('enseres', null, array(
                'label'=>'* Enseres',
                    'expanded'=> true,
                    'multiple'=> true,
                'empty_value'=> 'Seleccione',
                
            ))
            ->add('tipoParedes', null, array(
                'label'=>'* Tipo de Paredes',
                    'expanded'=> true,
                    'multiple'=> true,
                'empty_value'=> 'Seleccione',
                
            ))
            ->add('preguntas', null, array(
                'label'=>'* Preguntas',
                    'expanded'=> true,
                    'multiple'=> true,
                'empty_value'=> 'Seleccione',
                
            ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Censo\CensoBundle\Entity\RegistroSocioeconomico'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'censo_censobundle_registrosocioeconomico';
    }
}
