<?php
// src/Controller/ProgramController.php
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class ProgramController extends AbstractController
{
    #[Route('/program/', name: 'program_index')]

    public function index(): Response
    {
        return $this->render('/program/index.html.twig', [
            'website' => 'Wild Series',
        ]);
    }
}