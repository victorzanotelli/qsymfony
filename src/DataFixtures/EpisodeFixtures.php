<?php

namespace App\DataFixtures;

use App\Entity\Episode;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

use Faker\Factory;


class EpisodeFixtures extends Fixture implements DependentFixtureInterface
{

    public function load(ObjectManager $manager)
    {
        for($i = 0; $i < 50; $i++) {
            $faker = Factory::create();
            $episode = new Episode();
            $episode->setTitle($faker->title);
            $episode->setNumber($faker->numberBetween(10, 15));
            $episode->setSeason($this->getReference('season_' . $faker->numberBetween(1,10),));
            $episode->setSynopsis($faker->paragraph);
            $manager->persist($episode);
        }

        $manager->flush();
    }
    public function getDependencies(): array
    {
        return [
            SeasonFixtures::class,
        ];
    }
}
