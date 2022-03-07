<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HelloController extends AbstractController

{
    /**
     * @Route("/hello")
     */
    public function hello(): Response
    {
        return $this->render('hello/hello.html.twig', []);
            
    }

    
}