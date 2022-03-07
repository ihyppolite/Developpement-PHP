<?php

namespace App\Controller;

use App\Entity\Post;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/home', name: 'home')]
    public function index(ManagerRegistry $doctrine): Response
    {


        //$articles = $doctrine->getRepository(Post::class)->findAll();

        $articles = $doctrine->getRepository(Post::class)->dayByDay(3);
          
        return $this->render('home/index.html.twig', [
            'articles' => $articles,
        ]);
    }

    #[Route('/home/{max}', name: 'home_max')]
    public function more(ManagerRegistry $doctrine , int $max): Response
    {

         
        $max=3*$max;

        $articles = $doctrine->getRepository(Post::class)->articleByArticle($max);

        $this->addFlash(
            'notice',
            'Your changes were saved!'
        );
        
          
        return $this->render('home/suite.html.twig', [
            'articles' => $articles,
        ]);
    }

    

    
}
