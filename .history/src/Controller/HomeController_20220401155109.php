<?php

namespace App\Controller;

use App\Entity\Post;
use App\Repository\PostRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    #[Route('/home', name: 'app_home')]
    public function index(PostRepository $postRepository): Response
    {
        $posts = $postRepository->findBy([],['createdAt' => 'desc']);

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'posts' => $posts
        ]);
    }
    #[Route('/{id}/delete', name: 'app_delete', methods: ['GET', 'POST'])]
    public function delete(Post $post, EntityManagerInterface $em):RedirectResponse
    {
        $em->remove($post);
        $em->flush();

        return $this->redirectToRoute(route : "app_home");
    }

    #[Route("/{id}/edit", name: 'app_edit', methods: ['GET', 'POST'])]
    public function edit(Post $post, Request $request, EntityManagerInterface $em) : Response
    {
        $form = $this->createForm(PostFormType::class, $post);
        $form->handleRequest($request);
        return $this->render('post/edit.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
