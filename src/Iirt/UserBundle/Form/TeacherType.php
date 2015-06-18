<?php

namespace Iirt\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TeacherType extends AbstractType
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
            ->add('password','password')
            //->add('department')
            ->add('department', 'entity', array(
                'class' => 'IirtUserBundle:Department',
                'property' => 'name'
            ))
            ->add('email','email')
            //->add('inscriptDate','date')
            //->add('connected')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Iirt\UserBundle\Entity\Teacher'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'iirt_userbundle_teacher';
    }
}
