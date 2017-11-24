<?php

namespace ProjectBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;


class StageType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('annee',DateType::class,array(
                        'widget' =>'single_text'
        ))
                            ->add('datedebut',DateType::class,array(
                                'html5'=>false,
                                'attr'=>['class'=>'form-group'],
                                'widget' =>'single_text'
                ))
                ->add('datefin',DateType::class,array(
                    'html5'=>false,
                    'attr'=>['class'=>'form-group'],
                    'widget' =>'single_text'
                ))
                ->add('visits',EntityType::class,array(
                    'class' => 'ProjectBundle\Entity\Visite'
                ))
                ->add('technos',EntityType::class,array(
                    'class' => 'ProjectBundle\Entity\Technologie',
                    'choice_label' => 'libelleTechnologie',
                    'expanded' => false,
                    'multiple' => false
                ));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ProjectBundle\Entity\Stage'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'projectbundle_stage';
    }


}
