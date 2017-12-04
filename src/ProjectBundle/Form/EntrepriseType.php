<?php

namespace ProjectBundle\Form;

use ProjectBundle\Repository\UtilisateurRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EntrepriseType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nom' ,TextType::class, [

            'label'       => 'Nom entreprise',

            'attr'        => [

                'class'    => 'form-control',

                'required' => true,

            ],])->add('chiffreaffaires',IntegerType::class, [

        'label'       => 'Chiffre d\'affaires',

        'attr'        => [

            'class'    => 'form-control',

            'required' => true,

        ],])->add('entrepriseType' ,EntityType::class, [

            'class' => 'ProjectBundle\Entity\EntrepriseType',

            'attr'  => [

                'class'    => 'form-control',

                'required' => true,

        ],])->add('adresse' ,TextType::class, [

            'label'       => 'Adresse',

            'attr'        => [

                'class'    => 'form-control',

                'required' => true,

            ],])->add('telephone' ,IntegerType::class, [

            'label'       => 'Téléphone',

            'attr'        => [

                'class'    => 'form-control',

                'required' => true,

            ],])->add('users' ,EntityType::class, [

            'class'       => 'ProjectBundle\Entity\Utilisateur',

            'label'       => 'Responsable_technique',

            'query_builder' => function (UtilisateurRepository $repository){

                $roles='ROLE_REFPRO';

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
            'data_class' => 'ProjectBundle\Entity\Entreprise'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'projectbundle_entreprise';
    }


}
