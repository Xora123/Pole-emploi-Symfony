<?php

namespace App\Controller;

use App\Entity\Post;
use App\Form\PostType;
use App\Form\SearchDate;
use Doctrine\ORM\EntityManager;
use App\Repository\PostRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

Class SearchController extends AbstractController{

  #[Route('/', name: 'app_search')]

public function SearchDate(Request $request , EntityManagerInterface $em){
  $searDate=$this->createForm(SearchDate::class);
  if($searDate->handleRequest($request)->isSubmitted() &&$searDate->isValid()){
    $data=$searDate->getData();
    $order=$data['order'];

   
    $posts=$em->getRepository(Post::class)->findBy([],['createdAt'=>$order]);
    return $this->render('includes/header.html.twig',[
      'posts'=>$posts,
      'forms'=>$searDate->createView()
    ]);
  }
  return $this->render('includes/header.html.twig',[
  'forms' => $searDate->createView()
  ]);
  
}



}