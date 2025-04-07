<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

use App\Entity\Asignaturas;
use App\Entity\Profesores;
use Doctrine\Persistence\ManagerRegistry;


class AsignaturasController extends AbstractController
{
    #[Route('/crea-asignaturas', name: "crea_asignaturas")]

    
    public function crearAsignaturas(ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();

        $registro = array(
            "asignatura1" => [
                "id" => 1,
                "titulo" => "Matemáticas",
                "creditos" => 6,
                "aula" => 1,
            ],

            "asignatura2" => [
                "id" => 2,
                "titulo" => "Lengua",
                "creditos" => 5,
                "aula" => 2,
            ],
            "asignatura3" => [
                "id" => 3,
                "titulo" => "Historia",
                "creditos" => 4,
                "aula" => 3,
            ]
        );
        
        foreach ($registro as $asignaturas => $asignatura) {
            $asignatura = new Asignaturas();
            $asignatura->setId($asignatura['id']);
            $asignatura->setTitulo($asignatura['titulo']);
            $asignatura->setCreditos($asignatura['creditos']);
            $aula = $entityManager->getRepository(Profesores::class)
            ->findOneBy(['id' => $registro['aula']]);
            $asignatura->setAula($aula);


            $entityManager->persist($asignatura);
        }

        $entityManager->flush();

        return new Response('Guardado Asignatura con éxito.');
    }
}
