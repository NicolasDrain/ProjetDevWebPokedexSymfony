<?php

namespace App\Form;

use App\Entity\PokemonDresseur;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PokemonDresseurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('surnom', TextType::class, [
            'attr' => [
                'class' => 'form-control',
            ]
        ])
        ->add('create', SubmitType::class, [
            'attr' => [
                'class' => 'form-control btn btn-primary',
                'title' => 'Changer le surnom'
            ]
        ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => null,
        ]);
    }
}
