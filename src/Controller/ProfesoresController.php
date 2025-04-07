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
    #[Route('/ver-profesores/{nif}', name: 'ver_profesor')]
    public function verProfesores(ManagerRegistry $doctrine, $nif): Response
    {
        $entityManager = $doctrine->getManager();
        $profesores = $entityManager->getRepository(Profesores::class)->findAll();

        return $this->render('profesores/ver_profesores.html.twig', [
            'profesores' => $profesores,
            'nif' => $nif
        ]);
    }
    public function index(): Response
    {
        return $this->render('profesores/index.html.twig', [
            'controller_name' => 'ProfesoresController',
        ]);
    }
}
