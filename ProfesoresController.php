<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Profesores;
use Doctrine\Persistence\ManagerRegistry;

 class ProfesoresController extends AbstractController
{
    #[Route('/crea-profesores', name: 'crea-profesores')]
    public function crearProfesores(ManagerRegistry $doctrine): Response
    {
        $entiyManager = $doctrine->getManager();

        $autor = new Profesores();
        $autor->setNif('12345678A');
        $autor->setNombre('María');
        $autor->setGenero('Femenino');

        $entiyManager->persist($profesores);
        $entiyManager->flush();


      

        return new Response('Guardado Autor con ID -> ' . $autor->getId());
             
    }
}
