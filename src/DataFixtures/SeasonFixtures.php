<?php

namespace App\DataFixtures;

use App\Entity\Program;
use App\Entity\Season;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;


abstract class SeasonFixtures extends Fixture implements DependentFixtureInterface
{
   /* public const SEASON =[
        ['program'=> 'program_FinalSpace','number'=>1,'year'=>2018,'description'=>'first season'],
        ['program'=> 'program_FinalSpace','number'=>2,'year'=>2019,'description'=>'second season'],
        ['program'=> 'program_FinalSpace','number'=>3,'year'=>2020,'description'=>'third season'],
        ['program'=> 'program_TheOA','number'=>1,'year'=>2016,'description'=>'first season'],
        ['program'=> 'program_TheOA','number'=>2,'year'=>2017,'description'=>'second season'],
        ['program'=> 'program_Dark','number'=>1,'year'=>2017,'description'=>'first season'],
        ['program'=> 'program_Dark','number'=>2,'year'=>2018,'description'=>'second season'],
        ['program'=> 'program_Dark','number'=>3,'year'=>2019,'description'=>'third season'],
        ['program'=> 'program_Themaninthehighcastle','number'=>1,'year'=>2015,'description'=>'first season'],
        ['program'=> 'program_Themaninthehighcastle','number'=>2,'year'=>2016,'description'=>'second season'],
        ['program'=> 'program_Themaninthehighcastle','number'=>3,'year'=>2017,'description'=>'third season'],
        ['program'=> 'program_TheWire','number'=>1,'year'=>2002,'description'=>'first season'],
        ['program'=> 'program_TheWire','number'=>2,'year'=>2003,'description'=>'second season'],
        ['program'=> 'program_TheWire','number'=>3,'year'=>2004,'description'=>'third season'],
        ['program'=> 'program_TheWire','number'=>4,'year'=>2005,'description'=>'fourth season'],
        ['program'=> 'program_TheWire','number'=>5,'year'=>2006,'description'=>'fifth season'],
        ['program'=> 'program_TropicThunder','number'=>1,'year'=>2008,'description'=>'THE F****ING MOVIE'],
    ];*/
    public function load(ObjectManager $manager): void
    {
            $season = new Season();
            $season->setNumber(1);
            $season->setProgram($this->getReference('program_Arcane'));
            $season->setYear(2017);
            $season->setDescription('balbalbalabla');
            $this->addReference('season1_Arcane', $season);

            $manager->persist($season);

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
