<?php

namespace App\DataFixtures;

use Faker;
use App\Entity\Post;
use DateTimeImmutable;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class PostFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $date = new \DateTime("2014-06-20 11:45 Europe/London");
        $immutable = DateTimeImmutable::createFromMutable($date);


        $faker = Faker\Factory::create('fr_FR');
        for ($pst = 0; $pst <= 10; $pst++) {

            $post = new Post();
            $post->setTitle($faker->text(50));
            $post->setCreatedAt(DateTimeImmutable::createFromMutable($faker->dateTimeBetween('-1 years', 'now')));
            $post->setDepartement(($faker->word()));
            $post->setZipCode(str_replace(' ', '', $faker->postcode()));
            $post->setContent($faker->text(200));
            $post->setType('cdd','cdi','interim', 'stage', rand(1, 5));
            $post->setSalaire($faker->numberBetween(1000, 5000));
            $post->setDuree($faker->numberBetween(1, 10));

            $manager->persist($post);
        }
        $manager->flush();
    }
}
