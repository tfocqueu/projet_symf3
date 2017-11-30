<?php

namespace ProjectBundle\Form;

use ProjectBundle\Entity\Technologie;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use ProjectBundle\Entity\Utilisateur;
use ProjectBundle\Repository\UtilisateurRepository;



class StageType extends AbstractType

{

    /**

     * {@inheritdoc}

     */

    public function buildForm(FormBuilderInterface $builder, array $options)

    {

        $builder->add('libelleStage',TextType::class,array(

            'attr'   => [

                'class'    => 'form-control',

                'required' => true,

            ]

        ))->add('annee',DateType::class,array(

            'widget' => 'single_text',

            'attr'   => [

                'class'    => 'form-control',

                'required' => true,

            ]

        ))

            ->add('datedebut',DateType::class,array(

                'widget' =>'single_text',

                'attr' => [

                    'class'=> 'form-control',

                    'required'=>true,

                ]

            ))

            ->add('datefin',DateType::class,array(

                'widget' => 'single_text',

                'attr' => [

                    'class'=> 'form-control',

                    'required'=>true,

                ]

            ))

            ->add('observation',TextareaType::class,array(

                'attr' => [

                    'class' => 'form-control',

                    'required' => true,

                ]

            ))

            ->add('enteprises',EntityType::class,array(

                'class' => 'ProjectBundle\Entity\Entreprise',

                'attr'        => [

                'class'    => 'form-control',

                'required' => true,

            ],

            ))

            ->add('visits',EntityType::class,array(

                'label'       => 'Visite',

                'class' => 'ProjectBundle\Entity\Visite',

                'attr'        => [

                    'class'    => 'form-control',

                    'required' => true,

                ],

            ))

            ->add('technos',EntityType::class,array(

                'label'       => 'Technologies',

                'class' => 'ProjectBundle\Entity\Technologie',

                'choice_label'=> 'libelleTechnologie',

                'expanded'=> true,

                'multiple'=> true,

                'attr'        => [

                    'class'    => 'form-control',

                    'required' => true,

                ],

            ))->add('utilisateur' ,EntityType::class, [

                'class'       => 'ProjectBundle\Entity\Utilisateur',

                'label'       => 'Eleve',

                'query_builder' => function (UtilisateurRepository $repository){

                    $roles='ROLE_ELEVE';

                    return $repository->createQueryBuilder('u')
                        ->where('u.roles LIKE :roles')
                        ->setParameter('roles', '%"'.$roles.'"%');
                },

                'attr'        => [

                    'class'    => 'form-control',

                    'required' => true,

                ],]);

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

