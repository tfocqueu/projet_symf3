<?php

namespace ProjectBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;



class StageEleveType extends AbstractType

{

    /**

     * {@inheritdoc}

     */

    public function buildForm(FormBuilderInterface $builder, array $options)

    {

        $builder->add('stage',EntityType::class,array(

                'class' => 'ProjectBundle\Entity\Stage',

                'attr'        => [

                    'class'    => 'form-control',

                    'required' => true,

                ],

            ));

    }


    /**

     * {@inheritdoc}

     */

    public function configureOptions(OptionsResolver $resolver)

    {

        $resolver->setDefaults(array(

            'data_class' => 'ProjectBundle\Entity\Eleve'

        ));

    }

    /**

     * {@inheritdoc}

     */

    public function getBlockPrefix()

    {

        return 'projectbundle_eleve';

    }

}

