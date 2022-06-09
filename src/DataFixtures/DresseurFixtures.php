<?php

namespace App\DataFixtures;

use App\Entity\Dresseur;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Faker;

class DresseurFixtures extends Fixture
{
    public function __construct(private UserPasswordHasherInterface $passwordEncoder){

    }
    public function load(ObjectManager $manager): void
    {
        $admin = new Dresseur();
        $admin->setEmail('admin@demo.fr');
        $admin->setNom('Admin');
        $admin->setPassword($this->passwordEncoder->hashPassword($admin, 'azerty'));
        $admin->setRoles(['ROLE_ADMIN']);
        $admin->setArgent(300000);
        $this->addReference('dresseur1',$admin);
        $manager->persist($admin);

        $faker = Faker\Factory::create('fr_FR');
        for($i = 2; $i <= 15; $i++){
            $dresseur = new Dresseur();
            $dresseur->setEmail($faker->email);
            $dresseur->setNom($faker->name);
            $dresseur->setPassword($this->passwordEncoder->hashPassword($dresseur, 'secret'));
            $this->addReference('dresseur'.$i,$dresseur);
            $manager->persist($dresseur);
        }
        $manager->flush();
    }
}
