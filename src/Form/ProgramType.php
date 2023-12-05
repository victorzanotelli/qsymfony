<?php

namespace App\Form;

use App\Entity\Program;
use App\Repository\ProgramRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity;

#[ORM\Entity(repositoryClass: ProgramRepository::class)]
class ProgramType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class)
            ->add('synopsis', TextType::class)
            ->add('poster', TextType::class)
            ->add('category', EntityType::class, ['class' => Entity\Category::class, 'choice_label' => 'name'])
            ->add('country',TextType::class)
            ->add('year')
        ;
    }
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Program::class,
        ]);
    }
}
