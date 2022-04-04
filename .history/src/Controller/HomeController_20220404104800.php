<?php

namespace App\Controller;

use App\Entity\Post;
use App\Form\PostType;
use App\Repository\PostRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{

    #[Route('/', name: 'app_home')]
    public function index(PostRepository $postRepository, PaginatorInterface $paginator, Request $request): Response
    {
        $posts = $postRepository->findBy([],['createdAt' => 'desc']);

        $posts = $paginator->paginate(
            $posts, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            3/*limit per page*/
        );

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'posts' => $posts
        ]);
    }

    // #[Route("/create", name: 'app_create', methods: ['GET', 'POST'])]
    // public function create(EntityManagerInterface $em, Request $request, Post $post, PostRepository $postRepository) : Response
    // {
    //     $post = new Post();
    //     $form = $this->createForm(PostType::class, $post);
    //     $form->handleRequest($request);

    //     if($form->isSubmitted() && $form->isValid()){
    
    //         $postRepository->add($post);
    //         return $this->redirectToRoute('app_home');
    //     }
    //     return $this->render('post/edit.html.twig', [
    //         'post' => $post,
    //         'form' => $form->createView()
    //     ]);
    // }

    #[Route("/create", name: 'app_create', methods: ['GET', 'POST'])]
    public function add()
    {
        $post = new Post();
        $form = $this->createForm(ArticleType::class, $post);

        return $this->render('blog/add.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
