<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/home', name: 'app_home')]
    public function index(): Response
    {
                // Méthode findBy qui permet de récupérer les données avec des critères de filtre et de tri
                $articles = $this->getDoctrine()->getRepository(Articles::class)->findBy([],['created_at' => 'desc']);
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
}
