<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    #[Route('/user', name: 'user')]
    public function index(): Response
    {
        return $this->render('user/index.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }

    #[Route('/user/post/{id}', name: 'they_post')]
    public function all(string $id ,ManagerRegistry $doctrine): Response
    {
        $category = $doctrine->getRepository(User::class)->find($id);
         $posts=$category->getPosts();
        return $this->render('home/index.html.twig', [
            'articles' =>$posts,
        ]);
    }
}
