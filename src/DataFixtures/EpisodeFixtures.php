<?php

namespace App\DataFixtures;

use App\Entity\Episode;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class EpisodeFixtures extends Fixture implements DependentFixtureInterface
{
    /* public const EPISODE =[
        ['season'=>'season_1','title'=>'1','number'=> 1,'synopsis'=>'fleme'],
        ['season'=>'season_1','title'=>'2','number'=> 2,'synopsis'=>'fleme'],
        ['season'=>'season_1','title'=>'3','number'=> 3,'synopsis'=>'fleme'],
        ['season'=>'season_2','title'=>'1','number'=> 1,'synopsis'=>'fleme'],
        ['season'=>'season_2','title'=>'2','number'=> 2,'synopsis'=>'fleme'],
        ['season'=>'season_2','title'=>'3','number'=> 3,'synopsis'=>'fleme'],
        ['season'=>'season_3','title'=>'1','number'=> 1,'synopsis'=>'fleme'],



    ];*/
    public function load(ObjectManager $manager): void
    {
            $episode = new Episode();
            $episode->setTitle('Welcome to the Playground');
            $episode->setNumber(1);
            $episode->setSeason($this->getReference('season1_Arcane'));

            $manager->persist($episode);

        $manager->flush();
    }
    public function getDependencies()
    {
        // Tu retournes ici toutes les classes de fixtures dont ProgramFixtures dépend
        return [
            CategoryFixtures::class,
        ];
    }
}
