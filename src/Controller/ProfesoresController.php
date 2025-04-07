<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

use App\Entity\Profesores;
use App\Repository\ProfesoresRepository;
use Doctrine\Persistence\ManagerRegistry;

final class ProfesoresController extends AbstractController
{
    #[Route('/profesores', name: 'app_profesores')]
    public function index(): Response
    {
       
        return $this->render('profesores/index.html.twig', [
            'controller_name' => 'ProfesoresController',
            
        ]);
    }
}
