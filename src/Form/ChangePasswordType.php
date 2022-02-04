<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;

class ChangePasswordType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class, [
                'disabled' => true,
                'label' => 'mon adresse email'
            ])
            ->add('firstname', TextType::class, [
                'disabled' => true,
                'label' => 'mon prénom'
            ])
            ->add('lastname', TextType::class, [
                'disabled' => true,
                'label' => 'mon nom'
            ])
            ->add('oldPassword', PasswordType::class, [
                'label' => 'mon mot de passe actuel',
                'mapped' => false,
                'attr' => [
                    'placeholder' => 'veuillez saisir votre mot de passe actuel'
                ]
            ])
            ->add('newPassword', RepeatedType::class, [
                'type' => PasswordType::class,
                'mapped' => false,
                'invalid_message' => 'le mot de passe doit correspondre',
                'label' => 'Mon nouveau mot de passe',
                'required' => true,
                'first_options' => [
                    'label' => 'mon nouveau Mot de passe',
                    'attr' => [
                        'placeHolder' => 'saisiser votre nouveau mot de passe',
                    ]
                ],
                'second_options' => [
                    'label' => 'confirmez',
                    'attr' => [
                        'placeHolder' => 'confirmez votre nouveau mot de passe',
                    ]
                ]
            ])
            ->add('submit', SubmitType::class, [
                'label' => "mettre a jour",
            ])
        ;
        
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
