<?php

namespace App\Controller;

use App\Entity\Post;
use App\Form\PostType;
use App\Form\PostFormType;
use App\Repository\PostRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PostController extends AbstractController
{
    #[Route('/post/{id}', name: 'app_post')]
    public function index(Post $post): Response
    {
        return $this->render('post/index.html.twig', [
            'controller_name' => 'PostController',
            'post' => $post
        ]);
    }
    #[Route('post/{id}/delete', name: 'app_delete', methods: ['GET', 'POST'])]
    public function delete(Post $post, EntityManagerInterface $em):RedirectResponse
    {
        $em->remove($post);
        $em->flush();

        return $this->redirectToRoute(route : "app_home");
    }

    #[Route("post/{id}/edit", name: 'app_edit', methods: ['GET', 'POST'])]
    public function edit(Post $post, Request $request, EntityManagerInterface $em) : Response
    {
        $form = $this->createForm(PostType::class, $post);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
    
            $em->flush();
            return $this->redirectToRoute('app_home');
        }
        return $this->render('post/edit.html.twig', [
            'form' => $form->createView(),

        ]);
    }
    #[Route("/create", name: 'app_create', methods: ['GET', 'POST'])]
    public function create(EntityManagerInterface $em, Request $request, Post $post, tory $postRepository) : Response
    {
        $post = new Post();

        $form = $this->createForm(PostType::class, $post);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
    
            $em->persist($post);
            $em->flush();
        }
        return $this->render('post/edit.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
