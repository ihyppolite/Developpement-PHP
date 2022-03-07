<?php

namespace App\Controller;

use App\Entity\Comment;
use App\Entity\Post;
use App\Entity\User;
use App\Form\CommentType;
use App\Form\PostType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class PostController extends AbstractController
{


    // #[Route('/post/day/{day}', name: 'this_day')]
    // public function byday(string $day ,ManagerRegistry $doctrine): Response
    // {
    //     $article = $doctrine->getRepository(Post::class)->findAllByDay($day);

        
        
       
        
    //     return $this->render('home/index.html.twig', [
    //         'articles' => $article,
    //     ]);
    // }





    #[Route('/post/add', name: 'post_add')]

    public function new(Request $request ,ManagerRegistry $doctrine): Response
    {

        
        // creates a task object and initializes some data for this example
        $post = new Post();
        
        $form = $this->createForm(PostType::class, $post);

       

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $post = $form->getData();
            $post ->setDate();
            
            $doctrineManager= $doctrine->getManager();
            $doctrineManager->persist( $post);
            $doctrineManager->flush();
        }

        return $this->renderForm('post/index.html.twig', [
            'form' => $form,
        ]);
    }

  
        

    #[Route('/post/{id}', name: 'show')]
    public function index(string $id ,ManagerRegistry $doctrine,Request $request): Response
    {
        $article = $doctrine->getRepository(Post::class)->find($id);

     
         
        $comment = new Comment();
        
        $toto=$article->getComments();

       
        
    
        $form = $this->createForm(CommentType::class, $comment);
        
        return $this->renderForm('post/article.html.twig', [
            'form' => $form,
            'article' => $article,
            'toto'=> $toto,
        ]);

       
        
       
    }

    
}

