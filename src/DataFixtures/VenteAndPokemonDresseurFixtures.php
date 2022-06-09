<?php

namespace App\DataFixtures;

use App\Entity\Vente;
use App\Entity\PokemonDresseur;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class VenteAndPokemonDresseurFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for($i=1; $i<=15 ;$i++){
            $list_pokemon_dresseur=[];
            $dresseur = $this->getReference('dresseur'.$i);
            for($j=1; $j<=15; $j++){
                $pokemonDresseur = new PokemonDresseur();
                $pokemonDresseur->setIdDresseur($dresseur);
                $pokemonDresseur->setIdPokemon($this->getReference('pokemon'.rand(1,151)));
                if(rand(0,1)==1){
                    $genre = 'M';
                }
                else{
                    $genre = 'F';
                }
                $pokemonDresseur->setGenre($genre);
                $pokemonDresseur->setExp(rand(0,30000));
                array_push($list_pokemon_dresseur, $pokemonDresseur);
                $manager->persist($pokemonDresseur);
            }
            for($j=1; $j<=5; $j++){
                $nb=rand(0,15-$j);
                $vente = new Vente();
                $vente->setIdDresseur($dresseur);
                $vente->setIdPokemonDresseur($list_pokemon_dresseur[$nb]);
                array_splice($list_pokemon_dresseur, $nb, 1);
                $vente->setPrix(rand(1000,20000));
                if(rand(0,1)==1){
                    $statut = 'En cours';
                }
                else{
                    $statut = 'Terminee';
                }
                $vente->setStatut($statut);
                $manager->persist($vente);
            }
        }
        

        $manager->flush();
    }
}
