<?php

namespace App\Controller;

use App\Entity\Category;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController
{
    #[Route('/category/{id}', name: 'showcat')]
    public function index(string $id ,ManagerRegistry $doctrine): Response
    {
        $category = $doctrine->getRepository(Category::class)->find($id);


        return $this->render('category/index.html.twig', [
            'category' => $category,
        ]);
    }

    #[Route('/category/post/{id}', name: 'this_category')]
    public function all(string $id ,ManagerRegistry $doctrine): Response
    {
        $category = $doctrine->getRepository(Category::class)->find($id);
         $posts=$category->getPosts();
        
        return $this->render('post/thiscat.html.twig', [
            'posts' =>$posts,
        ]);
    }
}
