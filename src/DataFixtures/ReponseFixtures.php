<?php

namespace App\DataFixtures;

use Faker;
use App\Entity\Reponse;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class ReponseFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');

        for($rep = 0; $rep <= 10; $rep++){

            $reponse = new Reponse();
            $reponse->setContent($faker->text(200));
            
            $manager->persist($reponse);
        }
        $manager->flush();
    }
}
