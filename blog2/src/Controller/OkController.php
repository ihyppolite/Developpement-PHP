<?php

namespace App\Controller;

use App\Entity\Comment;
use App\Entity\Post;
use App\Form\CommentType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OkController extends AbstractController
{
    #[Route('/ok/{id}/{content}', name: 'ok')]
    public function index(int $id, string $content,ManagerRegistry $doctrine )
    {
         $comment = new Comment();

         $user=$this->getUser();

         $post = $doctrine->getRepository(Post::class)->find($id);

       

            $comment->setContent($content);
            $comment ->setDate();
            $comment ->setPost($post);
         $comment ->setAutor($user);
            $doctrineManager= $doctrine->getManager();
          $doctrineManager->persist( $comment);
            $doctrineManager->flush();

 

           return $this->render('ok/index.html.twig', [
            'comment' => $comment,
        ]);
            
        



       
    }
}
