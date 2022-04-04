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

    public function add()
    {
        $article = new Article();
        $form = $this->createForm(ArticleType::class, $article);

        return $this->render('blog/add.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
