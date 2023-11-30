<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
//use Symfony\Component\BrowserKit\Response;
use Symfony\Component\HttpFoundation\Response;
use App\Repository\ProgramRepository;


#[Route('/category', name: 'category_')]
class CategoryController extends AbstractController
{
    #[Route('/', name:'index')]
    public function index(CategoryRepository $categoryRepository): Response
    {
        $categories = $categoryRepository->findAll();
        return $this->render('/category/index.html.twig', ['categories' => $categories]);
    }


    #[Route('/{categoryName}', methods: ['GET'], requirements: ['name'=>'\d+'], name: 'show')]
    public function show(string $categoryName, CategoryRepository $categoryRepository, ProgramRepository $programRepository): Response
    {
        $category=$categoryRepository->findOneBy(['name'=>$categoryName]);
        $programs=$programRepository->findBy(
            ['category'=>$category],
            ['id'=> 'DESC'],
            limit: 3
        );
        if (!$category) {
            throw $this->createNotFoundException(
                'No category with id : '.$categoryName.' found in program\'s table.'
            );
        }
        return $this->render('/category/show.html.twig',
            ['programs' => $programs,
            'category'=>$category]
        );
    }

}
