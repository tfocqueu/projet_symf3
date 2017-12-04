<?php

namespace ProjectBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EntrepriseTypeType extends AbstractType

{

    /**

     * {@inheritdoc}

     */

    public function buildForm(FormBuilderInterface $builder, array $options)

    {

        $builder->add('libelle',TextType::class,array(

            'attr'   => [

                'class'    => 'form-control',

                'required' => true,

            ]

        ));

    }


    /**

     * {@inheritdoc}

     */

    public function configureOptions(OptionsResolver $resolver)

    {

        $resolver->setDefaults(array(

            'data_class' => 'ProjectBundle\Entity\EntrepriseType'

        ));

    }

    /**

     * {@inheritdoc}

     */

    public function getBlockPrefix()

    {

        return 'projectbundle_entrepriseType';

    }

}