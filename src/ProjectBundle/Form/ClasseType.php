<?php

namespace ProjectBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class ClasseType extends AbstractType

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

        ))->add('designation',TextType::class,array(

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

            'data_class' => 'ProjectBundle\Entity\Classe'

        ));

    }

    /**

     * {@inheritdoc}

     */

    public function getBlockPrefix()

    {

        return 'projectbundle_classe';

    }

}
