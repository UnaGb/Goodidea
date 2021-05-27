<?php

namespace App\Form;

use App\Entity\Personne;
use App\Entity\Technologies;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email')
            ->add('roles')
            ->add('password')
            ->add('isVerified')
            ->add('isActivated')
            ->add('createdAt')
            ->add('isDeleted')
            //->add('personne')
            ->add('personne', EntityType::class, [
                'class' => Personne::class,
                ])

            //->add('technos')

            ->add('technos', EntityType::class, [
                'class' => Technologies::class,
                'multiple' => true,
                'choice_label' => 'libelle',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
