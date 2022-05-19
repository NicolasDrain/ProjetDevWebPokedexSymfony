<?php

namespace App\DataFixtures;

use App\Entity\Type;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $array_type = [
            'acier',
            'combat',
            'dragon',
            'eau',
            'electrik',
            'feu',
            'glace',
            'insecte',
            'normal',
            'plante',
            'poison',
            'psy',
            'roche',
            'sol',
            'spectre',
            'vol',
            'fée'
        ];
        foreach($array_type as $type){
            $new_type = new Type();
            $new_type->setNom($type);
            $this->addReference($new_type->getNom(),$new_type);
            $manager->persist($new_type);
        }
        $manager->flush();
    }
}
