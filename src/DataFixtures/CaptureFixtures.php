<?php

namespace App\DataFixtures;

use App\Entity\Capture;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CaptureFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $array_capture = [
            ['id_type'=>'acier','id_region'=>'montagne'],
            ['id_type'=>'dragon','id_region'=>'montagne'],
            ['id_type'=>'glace','id_region'=>'montagne'],
            ['id_type'=>'normal','id_region'=>'montagne'],
            ['id_type'=>'roche','id_region'=>'montagne'],
            ['id_type'=>'feu','id_region'=>'prairie'],
            ['id_type'=>'normal','id_region'=>'prairie'],
            ['id_type'=>'plante','id_region'=>'prairie'],
            ['id_type'=>'sol','id_region'=>'prairie'],
            ['id_type'=>'vol','id_region'=>'prairie'],
            ['id_type'=>'fée','id_region'=>'prairie'],
            ['id_type'=>'combat','id_region'=>'ville'],
            ['id_type'=>'electrik','id_region'=>'ville'],
            ['id_type'=>'normal','id_region'=>'ville'],
            ['id_type'=>'psy','id_region'=>'ville'],
            ['id_type'=>'insecte','id_region'=>'foret'],
            ['id_type'=>'normal','id_region'=>'foret'],
            ['id_type'=>'spectre','id_region'=>'foret'],
            ['id_type'=>'vol','id_region'=>'foret'],
            ['id_type'=>'dragon','id_region'=>'plage'],
            ['id_type'=>'eau','id_region'=>'plage'],
            ['id_type'=>'normal','id_region'=>'plage'],
            ['id_type'=>'poison','id_region'=>'plage']
        ];
        foreach($array_capture as $capture){
            $new_capture = new Capture();
            $type = $this->getReference($capture['id_type']);
            $region = $this->getReference($capture['id_region']);
            $new_capture->setIdType($type);
            $new_capture->setIdRegion($region);
            $manager->persist($new_capture);
        }

        $manager->flush();
    }
}
