<?php

namespace Iirt\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class StudentType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname','text')
            ->add('lastname','text')
            ->add('phoneNumber','number')
            ->add('matricule','text')
            ->add('password','password')
           ->add('cycle', 'entity', array(
                'class' => 'IirtUserBundle:Cycle',
                'property' => 'name'
            ))
            ->add('path','entity', array(
                'class' => 'IirtUserBundle:Path',
                'property' => 'name'
            ))
            ->add('niveau', 'entity', array(
                'class' => 'IirtUserBundle:Niveau',
                'property' => 'name'
            ))
            ->add('formation', 'entity', array(
                'class' => 'IirtUserBundle:Formation',
                'property' => 'name'
            ))
            ->add('email','email')
            //->add('inscriptDate','date')
            //->add('able')
            //->add('connected')
            //->add('roles')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Iirt\UserBundle\Entity\Student'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'iirt_userbundle_student';
    }
}
