<?php

namespace App\DataFixtures;

use App\Entity\Program;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use phpDocumentor\Reflection\Types\Self_;

class ProgramFixtures extends Fixture implements DependentFixtureInterface
{
   /* public const PROGRAM = [
        ['title' =>'FinalSpace', 'synopsis'=>'Une aventure interstellaire !','poster'=>'https://imgs.search.brave.com/fYypMCdzVVEQvLlgcJj7tyGx1HaszoE_tFy1v1vNrtA/rs:fit:500:0:0/g:ce/aHR0cHM6Ly9tLm1l/ZGlhLWFtYXpvbi5j/b20vaW1hZ2VzL00v/TVY1Qk5XTm1OalZt/TmpBdFlqVTFaaTAw/WTJaaUxXSmtNRE10/T1Rrek1qZGtObUky/WWpsaVhrRXlYa0Zx/Y0dkZVFYVnlNak0x/TWprM016VUAuanBn', 'category' =>'category_Animation', 'country'=> 'USA','year'=>2018],
        ['title' =>'TheOA', 'synopsis'=>'Un voyage extraplanaire intriguant','poster'=>'https://imgs.search.brave.com/CQVr2nA-7HHsmmKrxeaNwJGaAxugg_78WvWmwCdeW9A/rs:fit:500:0:0/g:ce/aHR0cHM6Ly9tLm1l/ZGlhLWFtYXpvbi5j/b20vaW1hZ2VzL00v/TVY1QlpERmhORFE1/WkRjdE1XWmtZaTAw/WTJNd0xUazBPVGt0/TW1RNU5XTmlPRE5r/TUdFMFhrRXlYa0Zx/Y0dkZVFYUnlZVzV6/WTI5a1pTMTNiM0py/Wm14dmR3QEAuX1Yx/X1FMNzVfVVg1MDBf/Q1IwLDAsNTAwLDI4/MV8uanBn', 'category' =>'category_Aventure', 'country'=> 'USA','year'=>2016],
        ['title' =>'Dark', 'synopsis'=>'Ambiance pesante sur un petit village nucléaire','poster'=>'https://imgs.search.brave.com/YnI4P4FzjKAmWLCISbzO1TXYTkrRzXb932ZXPZACCK8/rs:fit:500:0:0/g:ce/aHR0cHM6Ly9yZXNp/emluZy5mbGl4c3Rl/ci5jb20vaWFSMVhZ/UzdqN1Fyb204LVlU/akl4ektQeFdZPS8y/MDZ4MzA1L3YyL2h0/dHBzOi8vcmVzaXpp/bmcuZmxpeHN0ZXIu/Y29tLy1YWkFmSFpN/MzlVd2FHSklGV0tB/RThmUzBhaz0vdjMv/dC9hc3NldHMvcDE0/NjUyMTgyX2Jfdjhf/YWEuanBn', 'category' =>'category_Fantastique', 'country'=> 'Allemagne', 'year'=>2017],
        ['title' =>'Themaninthehighcastle', 'synopsis'=>'1950, Axe a remporté WW2','poster'=>'https://imgs.search.brave.com/wGJrEjfyKavZNF5mRdtSQM8ip9D_DpSS4IL8FR2Fxo8/rs:fit:500:0:0/g:ce/aHR0cHM6Ly91cGxv/YWQud2lraW1lZGlh/Lm9yZy93aWtpcGVk/aWEvY29tbW9ucy9h/L2E2L1RoZV9NYW5f/aW5fdGhlX0hpZ2hf/Q2FzdGxlXygxOTYy/KS5qcGc', 'category' =>'category_Aventure', 'country'=>'USA','year'=>2015],
        ['title' =>'Thewitcher', 'synopsis'=>'Un chasseur de monstre se retrouve pris dans une épopée afin de sauvé une jeune fille','poster'=>'https://imgs.search.brave.com/bPzX-ZWd8XJwJvCBIXCeidTRVuzQcfyOwBRj1Bhn_y4/rs:fit:500:0:0/g:ce/aHR0cHM6Ly9pLnBp/bmltZy5jb20vb3Jp/Z2luYWxzLzE4LzE1/L2MzLzE4MTVjMzNh/ZmE1NjFmNDlkOWVk/YmViNjY4NTk2OGJl/LmpwZw', 'category' =>'category_Action','country'=>'USA','year'=>2019],
        ['title' => 'TheWire', 'synopsis'=>'Un plongeon dans la vie des policiers gangs de Baltimore dans les années 2000', 'poster'=>'https://imgs.search.brave.com/Fm85HBcT3MZBMYfCq8qtSeHzm8Em77TCBDjwJf11W9g/rs:fit:500:0:0/g:ce/aHR0cHM6Ly93d3cu/dGhlbW92aWVkYi5v/cmcvdC9wL3czMDBf/YW5kX2g0NTBfYmVz/dHYyLzRsYmNsRnlT/dnVnSTUxZndzeXhC/VE9tNERxSy5qcGc', 'category' => 'category_Policier','country'=>'USA','year'=>2002],
        ['title'=> 'TropicThunder', 'synopsis'=> 'Un casting de légende dont le meilleur role de Tom Cruise', 'poster' => 'https://imgs.search.brave.com/6xagrvjlxTIZB9NvTJ3Xz4oDRP4_6sKjxvJXL6QLf2E/rs:fit:500:0:0/g:ce/aHR0cHM6Ly93d3cu/dGhlbW92aWVkYi5v/cmcvdC9wL3czMDBf/YW5kX2g0NTBfYmVz/dHYyL3pBdXJCOW1O/eGZZUm9WclZqQUpK/d0dWM3NQZy5qcGc','category'=>'category_Humour','country'=>'USA','year'=> 2008]
    ];*/
    public function load(ObjectManager $manager)
    {
            $program = new Program();
            $program->setTitle('Arcane');
            $program->setCategory($this->getReference('category_Animation'));
            $this->addReference('program_Arcane', $program);
            $program->setYear(2020);
            $program->setCountry('USA');
            $program->setSynopsis('blabalbalbalabal');

            $manager->persist($program);

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