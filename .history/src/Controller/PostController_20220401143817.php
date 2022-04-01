<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PostController extends AbstractController
{
    #[Route('/post/{id}', name: 'app_post')]
    public function index(PostRepository ): Response
    {
        $posts = $postRepository->findAll([],['createdAt' => 'desc']);
        return $this->render('post/index.html.twig', [
            'controller_name' => 'PostController',
        ]);
    }
}