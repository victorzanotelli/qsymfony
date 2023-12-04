<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CategoryRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
//use Symfony\Component\BrowserKit\Response;
use Symfony\Component\HttpFoundation\Response;
use App\Repository\ProgramRepository;
use App\Form\CategoryType;
use App\Entity\Category;
use Doctrine\ORM\EntityManagerInterface;


#[Route('/category', name: 'category_')]
class CategoryController extends AbstractController
{
    #[Route('/', name:'index')]
    public function index(CategoryRepository $categoryRepository): Response
    {
        $categories = $categoryRepository->findAll();
        return $this->render('/category/index.html.twig', ['categories' => $categories]);
    }
    #[Route('/new', name: 'new')]
    public function new(Request $request, EntityManagerInterface $entityManager) : Response
    {
        $category = new Category();
        $form = $this->createForm(CategoryType::class, $category);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $entityManager->persist($category);
            $entityManager->flush();
            return $this->redirectToRoute('category_index');

        }

        return $this->render('category/new.html.twig', [
            'form' => $form,
        ]);
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
