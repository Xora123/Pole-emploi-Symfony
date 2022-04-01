<?php

namespace App\DataFixtures;

use Faker;
use App\Entity\Post;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class PostFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');



        for ($pst = 0; $pst <= 10; $pst++) {

            $post = new Post();
            $post->setTitle($faker->text(50));
            $post->setDepartement(str_replace(' ', '', ($faker->postcode())));
            $post->setContent($faker->text(200));
            $post->setSalaire($faker->numberBetween(1000, 5000));
            $manager->persist($post);
        }
        $manager->flush();
    }
}
