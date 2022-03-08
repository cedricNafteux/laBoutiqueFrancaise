<?php

namespace App\Form;

use App\Entity\Address;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;

class AddressType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Quel nom souhaitez-vous donner à votre adresse ?',
                'attr' => [
                    'placeholder' => 'Nommez votre adresse'
                ]
            ])
            ->add('firstname', TextType::class, [
                'label' => 'Votre prénom',
                'attr' => [
                    'placeholder' => 'Entrez votre prénom'
                ]
            ])
            ->add('lastname', TextType::class, [
                'label' => 'Votre nom',
                'attr' => [
                    'placeholder' => 'Entrez votre prénom'
                ]
            ])
            ->add('company', TextType::class, [
                'label' => 'votre société',
                'required' => false,
                'attr' => [
                    'placeholder' => '(falcultatif)Entrez votre societe'
                ]
            ])
            ->add('address', TextType::class, [
                'label' => 'votre adresse',
                'attr' => [
                    'placeholder' => '8, rue des ...'
                ]
            ])
            ->add('postal', TextType::class, [
                'label' => 'votre code postal',
                'attr' => [
                    'placeholder' => 'entrez votre code postal'
                ]
            ])
            ->add('city', TextType::class, [
                'label' => 'votre ville',
                'attr' => [
                    'placeholder' => 'entrez votre ville'
                ]
            ])
            ->add('country', CountryType::class, [
                'label' => 'votre pays',
                'attr' => [
                    'placeholder' => 'entrez votre pays'
                ]
            ])
            ->add('phone', TelType::class, [
                'label' => 'votre téléphonne',
                'attr' => [
                    'placeholder' => 'entrez votre téléphonne'
                ]
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'valider',
                'attr' => [
                    'class' => 'btn-block btn-info'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Address::class,
        ]);
    }
}
