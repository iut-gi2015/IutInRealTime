<?php

namespace Iirt\AnnouncementBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Iirt\AnnouncementBundle\Form\AnnouncementFileType;

class AnnouncementType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title','text')
            ->add('content','textarea')
            //->add('date','date')
            //->add('announcement_file',new AnnouncementFileType())
            //->add('student')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Iirt\AnnouncementBundle\Entity\Announcement'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'iirt_announcementbundle_announcement';
    }
}
