<?php

namespace App\DataFixtures;

use App\Entity\Type;
use App\Entity\Region;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
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

        $array_region = [
            'montagne',
            'prairie',
            'ville',
            'foret',
            'plage'
        ];
        foreach($array_region as $region){
            $new_region = new Region();
            $new_region->setNom($region);
            $this->addReference($new_region->getNom(),$new_region);
            $manager->persist($new_region);
        }
        $manager->flush();
    }
}
