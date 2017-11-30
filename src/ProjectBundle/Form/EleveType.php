<?php

namespace ProjectBundle\Form;

use ProjectBundle\Entity\Technologie;
use ProjectBundle\Entity\Utilisateur;
use ProjectBundle\Repository\UtilisateurRepository;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;

use Symfony\Component\Form\AbstractType;

use Symfony\Component\Form\Extension\Core\Type\CollectionType;

use Symfony\Component\Form\Extension\Core\Type\TextareaType;

use Symfony\Component\Form\Extension\Core\Type\TextType;

use Symfony\Component\Form\FormBuilderInterface;

use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\DateType;

class EleveType extends AbstractType

{

    /**

     * {@inheritdoc}

     */

    public function buildForm(FormBuilderInterface $builder, array $options)

    {

        $builder->add('nom',TextType::class,array(

            'attr'   => [

                'class'    => 'form-control',

                'required' => true,

            ]

        ))->add('prenom',TextType::class,array(

            'attr'   => [

                'class'    => 'form-control',

                'required' => true,

            ]

        ))->add('email',TextType::class,array(

                'attr'   => [

                    'class'    => 'form-control',

                    'required' => true,

                ]

            ))->add('adresse',TextType::class,array(

            'attr'   => [

                'class'    => 'form-control',

                'required' => true,

            ]

        ))->add('anneeobtention',TextType::class,array(

            'label'       => 'Année obtention du bac',

            'attr'   => [

                'class'    => 'form-control',

                'required' => true,

            ]
        ))->add('diplomes',EntityType::class,array(

            'class' => 'ProjectBundle\Entity\Diplome',

            'attr'        => [

                'class'    => 'form-control',

                'required' => true,

            ],
        ))->add('stages',EntityType::class,array(

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

            'data_class' => 'ProjectBundle\Entity\Utilisateur'

        ));

    }

    /**

     * {@inheritdoc}

     */

    public function getBlockPrefix()

    {

        return 'projectbundle_eleveType';

    }

}