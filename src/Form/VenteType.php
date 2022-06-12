<?php

namespace App\Form;

use App\Entity\Dresseur;
use App\Entity\PokemonDresseur;
use App\Entity\Vente;
use Symfony\Component\Form\ChoiceList\ChoiceList;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VenteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('prix', IntegerType::class, [
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'À combien de Pokédollars souhaitez-vous vendre votre Pokémon ?'
                ]
            ])
            ->add('pokemonDresseur', EntityType::class, [
                'class' => PokemonDresseur::class,
                'choices' => $options['data']['listPokemonDresseur'],
                'attr' => [
                    'class' => 'form-control',
                ]
            ])
            ->add('create', SubmitType::class, [
                'attr' => [
                    'class' => 'form-control btn btn-primary',
                    'title' => 'Vendre'
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
