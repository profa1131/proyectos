<?php

namespace Censo\CensoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class FamiliasType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('apellidos','text',
                    array(
                    'label'=>'* Apellidos',
                    'required'=> 'true',
                    'attr'=> array('class'=> 'form-control',
                    'placeholder' => 'Apellidos principales de la Familia'),
                    
                     ))
                
            ->add('telefonoLocal','text',
                    array(
                    'label'=>'* Telefono Local',
                    'required'=> 'true',
                    'attr'=> array('class'=> 'form-control',
                    'placeholder' => 'Numero Telefonico Local de la Vivienda'),
                    
                     ))
            ->add('direccion','textarea',array(
                    'label'=>'* Direccion',
                    'required'=> 'true',
                    'attr'=> array('class'=> 'form-control',
                    'placeholder' => 'Direccion de la Vivienda'),
                
                                         ))
            ->add('sector','text',array(
                    'label'=>'* Sector',
                    'required'=> 'true',
                    'attr'=> array('class'=> 'form-control',
                    'placeholder' => 'Sector de la Comunidad'),
                    
                
                     ))
            ->add('nombresComunidad','text',array(
                    'label'=>'* Nombre de la Comunidad',
                    'required'=> 'true',
                    'attr'=> array('class'=> 'form-control',
                    'placeholder' => 'Nombre de la Comunidad'),
                    
                     ))
//            s->add('habitantes')
                
            ->add('concejosComunales', null, array(
                'label'=>'* Nombre del Consejo Comunal',               
                'empty_value'=> 'Seleccione',
                'attr'=> array('class'=> 'form-control',
            )));
          }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Censo\CensoBundle\Entity\Familias'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'censo_censobundle_familias';
    }
}
