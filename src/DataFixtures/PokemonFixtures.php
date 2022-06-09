<?php

namespace App\DataFixtures;

use App\Entity\Pokemon;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class PokemonFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $array_pokemon = [
            ['nom'=>'Bulbizarre','is_evolution'=>false,'is_starter'=>true,'type_courbe'=>'P','id_type_1'=>'plante','id_type_2'=>'poison','photo'=>'images/pokemon/001.png','can_evolve'=>true],
            ['nom'=>'Herbizarre','is_evolution'=>true,'is_starter'=>false,'type_courbe'=>'P','id_type_1'=>'plante','id_type_2'=>'poison','photo'=>'images/pokemon/002.png','can_evolve'=>true],
            ['nom'=>'Florizarre','is_evolution'=>true,'is_starter'=>false,'type_courbe'=>'P','id_type_1'=>'plante','id_type_2'=>'poison','photo'=>'images/pokemon/003.png','can_evolve'=>false],
            ['nom'=>'Salamèche','is_evolution'=>false,'is_starter'=>true,'type_courbe'=>'P','id_type_1'=>'feu','id_type_2'=>NULL,'photo'=>'images/pokemon/004.png','can_evolve'=>true],
            ['nom'=>'Reptincel','is_evolution'=>true,'is_starter'=>false,'type_courbe'=>'P','id_type_1'=>'feu','id_type_2'=>NULL,'photo'=>'images/pokemon/005.png','can_evolve'=>true],
            ['nom'=>'Dracaufeu','is_evolution'=>true,'is_starter'=>false,'type_courbe'=>'P','id_type_1'=>'feu','id_type_2'=>'vol','photo'=>'images/pokemon/006.png','can_evolve'=>false],
            ['nom'=>'Carapuce','is_evolution'=>false,'is_starter'=>true,'type_courbe'=>'P','id_type_1'=>'eau','id_type_2'=>NULL,'photo'=>'images/pokemon/007.png','can_evolve'=>true],
            ['nom'=>'Carabaffe','is_evolution'=>true,'is_starter'=>false,'type_courbe'=>'P','id_type_1'=>'eau','id_type_2'=>NULL,'photo'=>'images/pokemon/008.png','can_evolve'=>true],
            ['nom'=>'Tortank','is_evolution'=>true,'is_starter'=>false,'type_courbe'=>'P','id_type_1'=>'eau','id_type_2'=>NULL,'photo'=>'images/pokemon/009.png','can_evolve'=>false],
            ['nom'=>'Chenipan','is_evolution'=>false,'is_starter'=>false,'type_courbe'=>'M','id_type_1'=>'insecte','id_type_2'=>NULL,'photo'=>'images/pokemon/010.png','can_evolve'=>true],
            ['nom'=>'Chrysacier','is_evolution'=>true,'is_starter'=>false,'type_courbe'=>'M','id_type_1'=>'insecte','id_type_2'=>NULL,'photo'=>'images/pokemon/011.png','can_evolve'=>true],
            ['nom'=>'Papilusion','is_evolution'=>true,'is_starter'=>false,'type_courbe'=>'M','id_type_1'=>'insecte','id_type_2'=>'vol','photo'=>'images/pokemon/012.png','can_evolve'=>false],
            ['nom'=>'Aspicot','is_evolution'=>false,'is_starter'=>false,'type_courbe'=>'M','id_type_1'=>'insecte','id_type_2'=>'poison','photo'=>'images/pokemon/013.png','can_evolve'=>true],
            ['nom'=>'Coconfort','is_evolution'=>true,'is_starter'=>false,'type_courbe'=>'M','id_type_1'=>'insecte','id_type_2'=>'poison','photo'=>'images/pokemon/014.png','can_evolve'=>true],
            ['nom'=>'Dardargnan','is_evolution'=>true,'is_starter'=>false,'type_courbe'=>'M','id_type_1'=>'insecte','id_type_2'=>'poison','photo'=>'images/pokemon/015.png','can_evolve'=>false],
            ['nom'=>'Roucool','is_evolution'=>false,'is_starter'=>false,'type_courbe'=>'P','id_type_1'=>'normal','id_type_2'=>'vol','photo'=>'images/pokemon/016.png','can_evolve'=>true],
            ['nom'=>'Roucoups','is_evolution'=>true,'is_starter'=>false,'type_courbe'=>'P','id_type_1'=>'normal','id_type_2'=>'vol','photo'=>'images/pokemon/017.png','can_evolve'=>true],
            ['nom'=>'Roucarnage','is_evolution'=>true,'is_starter'=>false,'type_courbe'=>'P','id_type_1'=>'normal','id_type_2'=>'vol','photo'=>'images/pokemon/018.png','can_evolve'=>false],
            ['nom'=>'Rattata','is_evolution'=>false,'is_starter'=>false,'type_courbe'=>'M','id_type_1'=>'normal','id_type_2'=>NULL,'photo'=>'images/pokemon/019.png','can_evolve'=>true],
            ['nom'=>'Rattatac','is_evolution'=>true,'is_starter'=>false,'type_courbe'=>'M','id_type_1'=>'normal','id_type_2'=>NULL,'photo'=>'images/pokemon/020.png','can_evolve'=>false],
            ['nom'=>'Piafabec','is_evolution'=>false,'is_starter'=>false,'type_courbe'=>'M','id_type_1'=>'normal','id_type_2'=>'vol','photo'=>'images/pokemon/021.png','can_evolve'=>true],
            ['nom'=>'Rapasdepic','is_evolution'=>true,'is_starter'=>false,'type_courbe'=>'M','id_type_1'=>'normal','id_type_2'=>'vol','photo'=>'images/pokemon/022.png','can_evolve'=>false],
            ['nom'=>'Abo','is_evolution'=>false,'is_starter'=>false,'type_courbe'=>'M','id_type_1'=>'poison','id_type_2'=>NULL,'photo'=>'images/pokemon/023.png','can_evolve'=>true],
            ['nom'=>'Arbok','is_evolution'=>true,'is_starter'=>false,'type_courbe'=>'M','id_type_1'=>'poison','id_type_2'=>NULL,'photo'=>'images/pokemon/024.png','can_evolve'=>false],
            ['nom'=>'Pikachu','is_evolution'=>false,'is_starter'=>false,'type_courbe'=>'M','id_type_1'=>'electrik','id_type_2'=>NULL,'photo'=>'images/pokemon/025.png','can_evolve'=>true],
            ['nom'=>'Raichu','is_evolution'=>true,'is_starter'=>false,'type_courbe'=>'M','id_type_1'=>'electrik','id_type_2'=>NULL,'photo'=>'images/pokemon/026.png','can_evolve'=>false],
            ['nom'=>'Sabelette','is_evolution'=>false,'is_starter'=>false,'type_courbe'=>'M','id_type_1'=>'sol','id_type_2'=>NULL,'photo'=>'images/pokemon/027.png','can_evolve'=>true],
            ['nom'=>'Sablaireau','is_evolution'=>true,'is_starter'=>false,'type_courbe'=>'M','id_type_1'=>'sol','id_type_2'=>NULL,'photo'=>'images/pokemon/028.png','can_evolve'=>false],
            ['nom'=>'NidoranF','is_evolution'=>false,'is_starter'=>false,'type_courbe'=>'P','id_type_1'=>'poison','id_type_2'=>NULL,'photo'=>'images/pokemon/029.png','can_evolve'=>true],
            ['nom'=>'Nidorina','is_evolution'=>true,'is_starter'=>false,'type_courbe'=>'P','id_type_1'=>'poison','id_type_2'=>NULL,'photo'=>'images/pokemon/030.png','can_evolve'=>true],
            ['nom'=>'Nidoqueen','is_evolution'=>true,'is_starter'=>false,'type_courbe'=>'P','id_type_1'=>'poison','id_type_2'=>'sol','photo'=>'images/pokemon/031.png','can_evolve'=>false],
            ['nom'=>'NidoranF','is_evolution'=>false,'is_starter'=>false,'type_courbe'=>'P','id_type_1'=>'poison','id_type_2'=>NULL,'photo'=>'images/pokemon/032.png','can_evolve'=>true],
            ['nom'=>'Nidorino','is_evolution'=>true,'is_starter'=>false,'type_courbe'=>'P','id_type_1'=>'poison','id_type_2'=>NULL,'photo'=>'images/pokemon/033.png','can_evolve'=>true],
            ['nom'=>'Nidoking','is_evolution'=>true,'is_starter'=>false,'type_courbe'=>'P','id_type_1'=>'poison','id_type_2'=>'sol','photo'=>'images/pokemon/034.png','can_evolve'=>false],
            ['nom'=>'Mélofée','is_evolution'=>false,'is_starter'=>false,'type_courbe'=>'R','id_type_1'=>'fée','id_type_2'=>NULL,'photo'=>'images/pokemon/035.png','can_evolve'=>true],
            ['nom'=>'Mélodelfe','is_evolution'=>true,'is_starter'=>false,'type_courbe'=>'R','id_type_1'=>'fée','id_type_2'=>NULL,'photo'=>'images/pokemon/036.png','can_evolve'=>false],
            ['nom'=>'Goupix','is_evolution'=>false,'is_starter'=>false,'type_courbe'=>'M','id_type_1'=>'feu','id_type_2'=>NULL,'photo'=>'images/pokemon/037.png','can_evolve'=>true],
            ['nom'=>'Feunard','is_evolution'=>true,'is_starter'=>false,'type_courbe'=>'M','id_type_1'=>'feu','id_type_2'=>NULL,'photo'=>'images/pokemon/038.png','can_evolve'=>false],
            ['nom'=>'Rondoudou','is_evolution'=>false,'is_starter'=>false,'type_courbe'=>'R','id_type_1'=>'normal','id_type_2'=>'fée','photo'=>'images/pokemon/039.png','can_evolve'=>true],
            ['nom'=>'Grodoudou','is_evolution'=>true,'is_starter'=>false,'type_courbe'=>'R','id_type_1'=>'normal','id_type_2'=>'fée','photo'=>'images/pokemon/040.png','can_evolve'=>false],
            ['nom'=>'Nosferapti','is_evolution'=>false,'is_starter'=>false,'type_courbe'=>'M','id_type_1'=>'poison','id_type_2'=>'vol','photo'=>'images/pokemon/041.png','can_evolve'=>true],
            ['nom'=>'Nosferalto','is_evolution'=>true,'is_starter'=>false,'type_courbe'=>'M','id_type_1'=>'poison','id_type_2'=>'vol','photo'=>'images/pokemon/042.png','can_evolve'=>false],
            ['nom'=>'Mystherbe','is_evolution'=>false,'is_starter'=>false,'type_courbe'=>'P','id_type_1'=>'plante','id_type_2'=>'poison','photo'=>'images/pokemon/043.png','can_evolve'=>true],
            ['nom'=>'Ortide','is_evolution'=>true,'is_starter'=>false,'type_courbe'=>'P','id_type_1'=>'plante','id_type_2'=>'poison','photo'=>'images/pokemon/044.png','can_evolve'=>true],
            ['nom'=>'Rafflesia','is_evolution'=>true,'is_starter'=>false,'type_courbe'=>'P','id_type_1'=>'plante','id_type_2'=>'poison','photo'=>'images/pokemon/045.png','can_evolve'=>false],
            ['nom'=>'Paras','is_evolution'=>false,'is_starter'=>false,'type_courbe'=>'M','id_type_1'=>'insecte','id_type_2'=>'plante','photo'=>'images/pokemon/046.png','can_evolve'=>true],
            ['nom'=>'Parasect','is_evolution'=>true,'is_starter'=>false,'type_courbe'=>'M','id_type_1'=>'insecte','id_type_2'=>'plante','photo'=>'images/pokemon/047.png','can_evolve'=>false],
            ['nom'=>'Mimitoss','is_evolution'=>false,'is_starter'=>false,'type_courbe'=>'M','id_type_1'=>'insecte','id_type_2'=>'poison','photo'=>'images/pokemon/048.png','can_evolve'=>true],
            ['nom'=>'Aéromite','is_evolution'=>true,'is_starter'=>false,'type_courbe'=>'M','id_type_1'=>'insecte','id_type_2'=>'poison','photo'=>'images/pokemon/049.png','can_evolve'=>false],
            ['nom'=>'Taupiqueur','is_evolution'=>false,'is_starter'=>false,'type_courbe'=>'M','id_type_1'=>'sol','id_type_2'=>NULL,'photo'=>'images/pokemon/050.png','can_evolve'=>true],
            ['nom'=>'Triopikeur','is_evolution'=>true,'is_starter'=>false,'type_courbe'=>'M','id_type_1'=>'sol','id_type_2'=>NULL,'photo'=>'images/pokemon/051.png','can_evolve'=>false],
            ['nom'=>'Miaouss','is_evolution'=>false,'is_starter'=>false,'type_courbe'=>'M','id_type_1'=>'normal','id_type_2'=>NULL,'photo'=>'images/pokemon/052.png','can_evolve'=>true],
            ['nom'=>'Persian','is_evolution'=>true,'is_starter'=>false,'type_courbe'=>'M','id_type_1'=>'normal','id_type_2'=>NULL,'photo'=>'images/pokemon/053.png','can_evolve'=>false],
            ['nom'=>'Psykokwak','is_evolution'=>false,'is_starter'=>false,'type_courbe'=>'M','id_type_1'=>'eau','id_type_2'=>NULL,'photo'=>'images/pokemon/054.png','can_evolve'=>true],
            ['nom'=>'Akwakwak','is_evolution'=>true,'is_starter'=>false,'type_courbe'=>'M','id_type_1'=>'eau','id_type_2'=>NULL,'photo'=>'images/pokemon/055.png','can_evolve'=>false],
            ['nom'=>'Férosinge','is_evolution'=>false,'is_starter'=>false,'type_courbe'=>'M','id_type_1'=>'combat','id_type_2'=>NULL,'photo'=>'images/pokemon/056.png','can_evolve'=>true],
            ['nom'=>'Colossinge','is_evolution'=>true,'is_starter'=>false,'type_courbe'=>'M','id_type_1'=>'combat','id_type_2'=>NULL,'photo'=>'images/pokemon/057.png','can_evolve'=>false],
            ['nom'=>'Caninos','is_evolution'=>false,'is_starter'=>false,'type_courbe'=>'L','id_type_1'=>'feu','id_type_2'=>NULL,'photo'=>'images/pokemon/058.png','can_evolve'=>true],
            ['nom'=>'Arcanin','is_evolution'=>true,'is_starter'=>false,'type_courbe'=>'L','id_type_1'=>'feu','id_type_2'=>NULL,'photo'=>'images/pokemon/059.png','can_evolve'=>false],
            ['nom'=>'Ptitard','is_evolution'=>false,'is_starter'=>false,'type_courbe'=>'P','id_type_1'=>'eau','id_type_2'=>NULL,'photo'=>'images/pokemon/060.png','can_evolve'=>true],
            ['nom'=>'Tétarte','is_evolution'=>true,'is_starter'=>false,'type_courbe'=>'P','id_type_1'=>'eau','id_type_2'=>NULL,'photo'=>'images/pokemon/061.png','can_evolve'=>true],
            ['nom'=>'Tartard','is_evolution'=>true,'is_starter'=>false,'type_courbe'=>'P','id_type_1'=>'eau','id_type_2'=>'combat','photo'=>'images/pokemon/062.png','can_evolve'=>false],
            ['nom'=>'Abra','is_evolution'=>false,'is_starter'=>false,'type_courbe'=>'P','id_type_1'=>'psy','id_type_2'=>NULL,'photo'=>'images/pokemon/063.png','can_evolve'=>true],
            ['nom'=>'Kadabra','is_evolution'=>true,'is_starter'=>false,'type_courbe'=>'P','id_type_1'=>'psy','id_type_2'=>NULL,'photo'=>'images/pokemon/064.png','can_evolve'=>true],
            ['nom'=>'Alakazam','is_evolution'=>true,'is_starter'=>false,'type_courbe'=>'P','id_type_1'=>'psy','id_type_2'=>NULL,'photo'=>'images/pokemon/065.png','can_evolve'=>false],
            ['nom'=>'Machoc','is_evolution'=>false,'is_starter'=>false,'type_courbe'=>'P','id_type_1'=>'combat','id_type_2'=>NULL,'photo'=>'images/pokemon/066.png','can_evolve'=>true],
            ['nom'=>'Machopeur','is_evolution'=>true,'is_starter'=>false,'type_courbe'=>'P','id_type_1'=>'combat','id_type_2'=>NULL,'photo'=>'images/pokemon/067.png','can_evolve'=>true],
            ['nom'=>'Mackogneur','is_evolution'=>true,'is_starter'=>false,'type_courbe'=>'P','id_type_1'=>'combat','id_type_2'=>NULL,'photo'=>'images/pokemon/068.png','can_evolve'=>false],
            ['nom'=>'Chétiflor','is_evolution'=>false,'is_starter'=>false,'type_courbe'=>'P','id_type_1'=>'plante','id_type_2'=>'poison','photo'=>'images/pokemon/069.png','can_evolve'=>true],
            ['nom'=>'Boustiflor','is_evolution'=>true,'is_starter'=>false,'type_courbe'=>'P','id_type_1'=>'plante','id_type_2'=>'poison','photo'=>'images/pokemon/070.png','can_evolve'=>true],
            ['nom'=>'Empiflor','is_evolution'=>true,'is_starter'=>false,'type_courbe'=>'P','id_type_1'=>'plante','id_type_2'=>'poison','photo'=>'images/pokemon/071.png','can_evolve'=>false],
            ['nom'=>'Tentacool','is_evolution'=>false,'is_starter'=>false,'type_courbe'=>'L','id_type_1'=>'eau','id_type_2'=>'poison','photo'=>'images/pokemon/072.png','can_evolve'=>true],
            ['nom'=>'Tentacruel','is_evolution'=>true,'is_starter'=>false,'type_courbe'=>'L','id_type_1'=>'eau','id_type_2'=>'poison','photo'=>'images/pokemon/073.png','can_evolve'=>false],
            ['nom'=>'Racaillou','is_evolution'=>false,'is_starter'=>false,'type_courbe'=>'P','id_type_1'=>'roche','id_type_2'=>'sol','photo'=>'images/pokemon/074.png','can_evolve'=>true],
            ['nom'=>'Gravalanch','is_evolution'=>true,'is_starter'=>false,'type_courbe'=>'P','id_type_1'=>'roche','id_type_2'=>'sol','photo'=>'images/pokemon/075.png','can_evolve'=>true],
            ['nom'=>'Grolem','is_evolution'=>true,'is_starter'=>false,'type_courbe'=>'P','id_type_1'=>'roche','id_type_2'=>'sol','photo'=>'images/pokemon/076.png','can_evolve'=>false],
            ['nom'=>'Ponyta','is_evolution'=>false,'is_starter'=>false,'type_courbe'=>'M','id_type_1'=>'feu','id_type_2'=>NULL,'photo'=>'images/pokemon/077.png','can_evolve'=>true],
            ['nom'=>'Galopa','is_evolution'=>true,'is_starter'=>false,'type_courbe'=>'M','id_type_1'=>'feu','id_type_2'=>NULL,'photo'=>'images/pokemon/078.png','can_evolve'=>false],
            ['nom'=>'Ramoloss','is_evolution'=>false,'is_starter'=>false,'type_courbe'=>'M','id_type_1'=>'eau','id_type_2'=>'psy','photo'=>'images/pokemon/079.png','can_evolve'=>true],
            ['nom'=>'Flagadoss','is_evolution'=>true,'is_starter'=>false,'type_courbe'=>'M','id_type_1'=>'eau','id_type_2'=>'psy','photo'=>'images/pokemon/080.png','can_evolve'=>false],
            ['nom'=>'Magnéti','is_evolution'=>false,'is_starter'=>false,'type_courbe'=>'M','id_type_1'=>'electrik','id_type_2'=>'acier','photo'=>'images/pokemon/081.png','can_evolve'=>true],
            ['nom'=>'Magnéton','is_evolution'=>true,'is_starter'=>false,'type_courbe'=>'M','id_type_1'=>'electrik','id_type_2'=>'acier','photo'=>'images/pokemon/082.png','can_evolve'=>false],
            ['nom'=>'Canarticho','is_evolution'=>false,'is_starter'=>false,'type_courbe'=>'M','id_type_1'=>'normal','id_type_2'=>'vol','photo'=>'images/pokemon/083.png','can_evolve'=>false],
            ['nom'=>'Doduo','is_evolution'=>false,'is_starter'=>false,'type_courbe'=>'M','id_type_1'=>'normal','id_type_2'=>'vol','photo'=>'images/pokemon/084.png','can_evolve'=>true],
            ['nom'=>'Dodrio','is_evolution'=>true,'is_starter'=>false,'type_courbe'=>'M','id_type_1'=>'normal','id_type_2'=>'vol','photo'=>'images/pokemon/085.png','can_evolve'=>false],
            ['nom'=>'Otaria','is_evolution'=>false,'is_starter'=>false,'type_courbe'=>'M','id_type_1'=>'eau','id_type_2'=>NULL,'photo'=>'images/pokemon/086.png','can_evolve'=>true],
            ['nom'=>'Lamantine','is_evolution'=>true,'is_starter'=>false,'type_courbe'=>'M','id_type_1'=>'eau','id_type_2'=>'spectre','photo'=>'images/pokemon/087.png','can_evolve'=>false],
            ['nom'=>'Tadmorv','is_evolution'=>false,'is_starter'=>false,'type_courbe'=>'M','id_type_1'=>'poison','id_type_2'=>NULL,'photo'=>'images/pokemon/088.png','can_evolve'=>true],
            ['nom'=>'Grotadmorv','is_evolution'=>true,'is_starter'=>false,'type_courbe'=>'M','id_type_1'=>'poison','id_type_2'=>NULL,'photo'=>'images/pokemon/089.png','can_evolve'=>false],
            ['nom'=>'Kokiyas','is_evolution'=>false,'is_starter'=>false,'type_courbe'=>'L','id_type_1'=>'eau','id_type_2'=>NULL,'photo'=>'images/pokemon/090.png','can_evolve'=>true],
            ['nom'=>'Crustabri','is_evolution'=>true,'is_starter'=>false,'type_courbe'=>'L','id_type_1'=>'eau','id_type_2'=>'glace','photo'=>'images/pokemon/091.png','can_evolve'=>false],
            ['nom'=>'Fantominus','is_evolution'=>false,'is_starter'=>false,'type_courbe'=>'P','id_type_1'=>'spectre','id_type_2'=>'poison','photo'=>'images/pokemon/092.png','can_evolve'=>true],
            ['nom'=>'Spectrum','is_evolution'=>true,'is_starter'=>false,'type_courbe'=>'P','id_type_1'=>'spectre','id_type_2'=>'poison','photo'=>'images/pokemon/093.png','can_evolve'=>true],
            ['nom'=>'Ectoplasma','is_evolution'=>true,'is_starter'=>false,'type_courbe'=>'P','id_type_1'=>'spectre','id_type_2'=>'poison','photo'=>'images/pokemon/094.png','can_evolve'=>false],
            ['nom'=>'Onix','is_evolution'=>false,'is_starter'=>false,'type_courbe'=>'M','id_type_1'=>'roche','id_type_2'=>'sol','photo'=>'images/pokemon/095.png','can_evolve'=>false],
            ['nom'=>'Soporifik','is_evolution'=>false,'is_starter'=>false,'type_courbe'=>'M','id_type_1'=>'psy','id_type_2'=>NULL,'photo'=>'images/pokemon/096.png','can_evolve'=>true],
            ['nom'=>'Hypnomade','is_evolution'=>true,'is_starter'=>false,'type_courbe'=>'M','id_type_1'=>'psy','id_type_2'=>NULL,'photo'=>'images/pokemon/097.png','can_evolve'=>false],
            ['nom'=>'Krabby','is_evolution'=>false,'is_starter'=>false,'type_courbe'=>'M','id_type_1'=>'eau','id_type_2'=>NULL,'photo'=>'images/pokemon/098.png','can_evolve'=>true],
            ['nom'=>'Krabboss','is_evolution'=>true,'is_starter'=>false,'type_courbe'=>'M','id_type_1'=>'eau','id_type_2'=>NULL,'photo'=>'images/pokemon/099.png','can_evolve'=>false],
            ['nom'=>'Voltorbe','is_evolution'=>false,'is_starter'=>false,'type_courbe'=>'M','id_type_1'=>'electrik','id_type_2'=>NULL,'photo'=>'images/pokemon/100.png','can_evolve'=>true],
            ['nom'=>'Electrode','is_evolution'=>true,'is_starter'=>false,'type_courbe'=>'M','id_type_1'=>'electrik','id_type_2'=>NULL,'photo'=>'images/pokemon/101.png','can_evolve'=>false],
            ['nom'=>'Noeunoeuf','is_evolution'=>false,'is_starter'=>false,'type_courbe'=>'L','id_type_1'=>'plante','id_type_2'=>'psy','photo'=>'images/pokemon/102.png','can_evolve'=>true],
            ['nom'=>'Noadkoko','is_evolution'=>true,'is_starter'=>false,'type_courbe'=>'L','id_type_1'=>'plante','id_type_2'=>'psy','photo'=>'images/pokemon/103.png','can_evolve'=>false],
            ['nom'=>'Osselait','is_evolution'=>false,'is_starter'=>false,'type_courbe'=>'M','id_type_1'=>'sol','id_type_2'=>NULL,'photo'=>'images/pokemon/104.png','can_evolve'=>true],
            ['nom'=>'Ossatueur','is_evolution'=>true,'is_starter'=>false,'type_courbe'=>'M','id_type_1'=>'sol','id_type_2'=>NULL,'photo'=>'images/pokemon/105.png','can_evolve'=>false],
            ['nom'=>'Kicklee','is_evolution'=>false,'is_starter'=>false,'type_courbe'=>'M','id_type_1'=>'combat','id_type_2'=>NULL,'photo'=>'images/pokemon/106.png','can_evolve'=>false],
            ['nom'=>'Tygnon','is_evolution'=>false,'is_starter'=>false,'type_courbe'=>'M','id_type_1'=>'combat','id_type_2'=>NULL,'photo'=>'images/pokemon/107.png','can_evolve'=>false],
            ['nom'=>'Excelangue','is_evolution'=>false,'is_starter'=>false,'type_courbe'=>'M','id_type_1'=>'normal','id_type_2'=>NULL,'photo'=>'images/pokemon/108.png','can_evolve'=>false],
            ['nom'=>'Smogo','is_evolution'=>false,'is_starter'=>false,'type_courbe'=>'M','id_type_1'=>'poison','id_type_2'=>NULL,'photo'=>'images/pokemon/109.png','can_evolve'=>true],
            ['nom'=>'Smogogo','is_evolution'=>true,'is_starter'=>false,'type_courbe'=>'M','id_type_1'=>'poison','id_type_2'=>NULL,'photo'=>'images/pokemon/110.png','can_evolve'=>false],
            ['nom'=>'Rhinocorne','is_evolution'=>false,'is_starter'=>false,'type_courbe'=>'L','id_type_1'=>'sol','id_type_2'=>'roche','photo'=>'images/pokemon/111.png','can_evolve'=>true],
            ['nom'=>'Rhinoféros','is_evolution'=>true,'is_starter'=>false,'type_courbe'=>'L','id_type_1'=>'sol','id_type_2'=>'roche','photo'=>'images/pokemon/112.png','can_evolve'=>false],
            ['nom'=>'Leveinard','is_evolution'=>false,'is_starter'=>false,'type_courbe'=>'R','id_type_1'=>'normal','id_type_2'=>NULL,'photo'=>'images/pokemon/113.png','can_evolve'=>false],
            ['nom'=>'Saquedeneu','is_evolution'=>false,'is_starter'=>false,'type_courbe'=>'M','id_type_1'=>'plante','id_type_2'=>NULL,'photo'=>'images/pokemon/114.png','can_evolve'=>false],
            ['nom'=>'Kangourex','is_evolution'=>false,'is_starter'=>false,'type_courbe'=>'M','id_type_1'=>'normal','id_type_2'=>NULL,'photo'=>'images/pokemon/115.png','can_evolve'=>false],
            ['nom'=>'Hypotrempe','is_evolution'=>false,'is_starter'=>false,'type_courbe'=>'M','id_type_1'=>'eau','id_type_2'=>NULL,'photo'=>'images/pokemon/116.png','can_evolve'=>true],
            ['nom'=>'Hypocéan','is_evolution'=>true,'is_starter'=>false,'type_courbe'=>'M','id_type_1'=>'eau','id_type_2'=>NULL,'photo'=>'images/pokemon/117.png','can_evolve'=>false],
            ['nom'=>'Poissirène','is_evolution'=>false,'is_starter'=>false,'type_courbe'=>'M','id_type_1'=>'eau','id_type_2'=>NULL,'photo'=>'images/pokemon/118.png','can_evolve'=>true],
            ['nom'=>'Poissoroy','is_evolution'=>true,'is_starter'=>false,'type_courbe'=>'M','id_type_1'=>'eau','id_type_2'=>NULL,'photo'=>'images/pokemon/119.png','can_evolve'=>false],
            ['nom'=>'Stari','is_evolution'=>false,'is_starter'=>false,'type_courbe'=>'L','id_type_1'=>'eau','id_type_2'=>NULL,'photo'=>'images/pokemon/120.png','can_evolve'=>true],
            ['nom'=>'Staross','is_evolution'=>true,'is_starter'=>false,'type_courbe'=>'L','id_type_1'=>'eau','id_type_2'=>'psy','photo'=>'images/pokemon/121.png','can_evolve'=>false],
            ['nom'=>'M.Mime','is_evolution'=>false,'is_starter'=>false,'type_courbe'=>'M','id_type_1'=>'psy','id_type_2'=>'fée','photo'=>'images/pokemon/122.png','can_evolve'=>false],
            ['nom'=>'Insécateur','is_evolution'=>false,'is_starter'=>false,'type_courbe'=>'M','id_type_1'=>'insecte','id_type_2'=>'vol','photo'=>'images/pokemon/123.png','can_evolve'=>false],
            ['nom'=>'Lippoutou','is_evolution'=>false,'is_starter'=>false,'type_courbe'=>'M','id_type_1'=>'glace','id_type_2'=>'psy','photo'=>'images/pokemon/124.png','can_evolve'=>false],
            ['nom'=>'Elektek','is_evolution'=>false,'is_starter'=>false,'type_courbe'=>'M','id_type_1'=>'electrik','id_type_2'=>NULL,'photo'=>'images/pokemon/125.png','can_evolve'=>false],
            ['nom'=>'Magmar','is_evolution'=>false,'is_starter'=>false,'type_courbe'=>'M','id_type_1'=>'feu','id_type_2'=>NULL,'photo'=>'images/pokemon/126.png','can_evolve'=>false],
            ['nom'=>'Scarabrute','is_evolution'=>false,'is_starter'=>false,'type_courbe'=>'L','id_type_1'=>'insecte','id_type_2'=>NULL,'photo'=>'images/pokemon/127.png','can_evolve'=>false],
            ['nom'=>'Tauros','is_evolution'=>false,'is_starter'=>false,'type_courbe'=>'L','id_type_1'=>'normal','id_type_2'=>NULL,'photo'=>'images/pokemon/128.png','can_evolve'=>false],
            ['nom'=>'Magicarpe','is_evolution'=>false,'is_starter'=>false,'type_courbe'=>'L','id_type_1'=>'eau','id_type_2'=>NULL,'photo'=>'images/pokemon/129.png','can_evolve'=>true],
            ['nom'=>'Léviator','is_evolution'=>true,'is_starter'=>false,'type_courbe'=>'L','id_type_1'=>'eau','id_type_2'=>'vol','photo'=>'images/pokemon/130.png','can_evolve'=>false],
            ['nom'=>'Lokhlass','is_evolution'=>false,'is_starter'=>false,'type_courbe'=>'L','id_type_1'=>'eau','id_type_2'=>'glace','photo'=>'images/pokemon/131.png','can_evolve'=>false],
            ['nom'=>'Métamorph','is_evolution'=>false,'is_starter'=>false,'type_courbe'=>'M','id_type_1'=>'normal','id_type_2'=>NULL,'photo'=>'images/pokemon/132.png','can_evolve'=>false],
            ['nom'=>'Evoli','is_evolution'=>false,'is_starter'=>false,'type_courbe'=>'M','id_type_1'=>'normal','id_type_2'=>NULL,'photo'=>'images/pokemon/133.png','can_evolve'=>true],
            ['nom'=>'Aquali','is_evolution'=>true,'is_starter'=>false,'type_courbe'=>'M','id_type_1'=>'eau','id_type_2'=>NULL,'photo'=>'images/pokemon/134.png','can_evolve'=>false],
            ['nom'=>'Voltali','is_evolution'=>true,'is_starter'=>false,'type_courbe'=>'M','id_type_1'=>'electrik','id_type_2'=>NULL,'photo'=>'images/pokemon/135.png','can_evolve'=>false],
            ['nom'=>'Pyroli','is_evolution'=>true,'is_starter'=>false,'type_courbe'=>'M','id_type_1'=>'feu','id_type_2'=>NULL,'photo'=>'images/pokemon/136.png','can_evolve'=>false],
            ['nom'=>'Porygon','is_evolution'=>false,'is_starter'=>false,'type_courbe'=>'M','id_type_1'=>'normal','id_type_2'=>NULL,'photo'=>'images/pokemon/137.png','can_evolve'=>false],
            ['nom'=>'Amonita','is_evolution'=>false,'is_starter'=>false,'type_courbe'=>'M','id_type_1'=>'roche','id_type_2'=>'eau','photo'=>'images/pokemon/138.png','can_evolve'=>true],
            ['nom'=>'Amonistar','is_evolution'=>true,'is_starter'=>false,'type_courbe'=>'M','id_type_1'=>'roche','id_type_2'=>'eau','photo'=>'images/pokemon/139.png','can_evolve'=>false],
            ['nom'=>'Kabuto','is_evolution'=>false,'is_starter'=>false,'type_courbe'=>'M','id_type_1'=>'roche','id_type_2'=>'eau','photo'=>'images/pokemon/140.png','can_evolve'=>true],
            ['nom'=>'Kabutops','is_evolution'=>true,'is_starter'=>false,'type_courbe'=>'M','id_type_1'=>'roche','id_type_2'=>'eau','photo'=>'images/pokemon/141.png','can_evolve'=>false],
            ['nom'=>'Ptéra','is_evolution'=>false,'is_starter'=>false,'type_courbe'=>'L','id_type_1'=>'roche','id_type_2'=>'vol','photo'=>'images/pokemon/142.png','can_evolve'=>false],
            ['nom'=>'Ronflex','is_evolution'=>false,'is_starter'=>false,'type_courbe'=>'L','id_type_1'=>'normal','id_type_2'=>NULL,'photo'=>'images/pokemon/143.png','can_evolve'=>false],
            ['nom'=>'Artikodin','is_evolution'=>false,'is_starter'=>false,'type_courbe'=>'L','id_type_1'=>'glace','id_type_2'=>'vol','photo'=>'images/pokemon/144.png','can_evolve'=>false],
            ['nom'=>'Electhor','is_evolution'=>false,'is_starter'=>false,'type_courbe'=>'L','id_type_1'=>'electrik','id_type_2'=>'vol','photo'=>'images/pokemon/145.png','can_evolve'=>false],
            ['nom'=>'Sulfura','is_evolution'=>false,'is_starter'=>false,'type_courbe'=>'L','id_type_1'=>'feu','id_type_2'=>'vol','photo'=>'images/pokemon/146.png','can_evolve'=>false],
            ['nom'=>'Minidraco','is_evolution'=>false,'is_starter'=>false,'type_courbe'=>'L','id_type_1'=>'dragon','id_type_2'=>NULL,'photo'=>'images/pokemon/147.png','can_evolve'=>true],
            ['nom'=>'Draco','is_evolution'=>true,'is_starter'=>false,'type_courbe'=>'L','id_type_1'=>'dragon','id_type_2'=>NULL,'photo'=>'images/pokemon/148.png','can_evolve'=>true],
            ['nom'=>'Dracolosse','is_evolution'=>true,'is_starter'=>false,'type_courbe'=>'L','id_type_1'=>'dragon','id_type_2'=>'vol','photo'=>'images/pokemon/149.png','can_evolve'=>false],
            ['nom'=>'Mewtwo','is_evolution'=>false,'is_starter'=>false,'type_courbe'=>'L','id_type_1'=>'psy','id_type_2'=>NULL,'photo'=>'images/pokemon/150.png','can_evolve'=>false],
            ['nom'=>'Mew','is_evolution'=>false,'is_starter'=>false,'type_courbe'=>'P','id_type_1'=>'psy','id_type_2'=>NULL,'photo'=>'images/pokemon/151.png','can_evolve'=>false]
        ];
        $i = 1;
        foreach($array_pokemon as $pokemon){
            $new_pokemon = new Pokemon();
            $new_pokemon->setNom($pokemon['nom']);
            $new_pokemon->setIsEvolution($pokemon['is_evolution']);
            $new_pokemon->setIsStarter($pokemon['is_starter']);
            $new_pokemon->setTypeCourbeNiveau($pokemon['type_courbe']);
            $type1 = $this->getReference($pokemon['id_type_1']);
            $new_pokemon->setIdType1($type1);
            if($pokemon['id_type_2']!=NULL){
                $type2 = $this->getReference($pokemon['id_type_2']);
                $new_pokemon->setIdType2($type2);
            }
            $new_pokemon->setPhoto($pokemon['photo']);
            $new_pokemon->setCanEvolve($pokemon['can_evolve']);
            $this->addReference('pokemon'.$i,$new_pokemon);
            $i = $i+1;
            $manager->persist($new_pokemon);
        }

        $manager->flush();
    }
}
