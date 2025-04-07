<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

use App\Entity\Profesores;

final class AleatorioController extends AbstractController
{
    #[Route('/aleatorio2', name: 'app_aleatorio2')]
    public function index2(): Response
    {
        $numeroAleatorio = random_int(0,100);

        return $this->render('aleatorio/index.html.twig', [
            'controller_name' => 'AleatorioController',
            'aleatorio' =>$numeroAleatorio,
        ]);
       
        
    }
}
