<?php

namespace App\Controller;

use App\Entity\Category;
use App\Form\CategoryType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController {


    #[Route('/category/new')]
    public function new (Request $request ,ManagerRegistry $doctrine): Response
    {
        $category = new Category();

        $form= $this->createForm(CategoryType::class, $category);

        
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $category = $form->getData();
            $doctrineManager= $doctrine->getManager();
            $doctrineManager->persist( $category);
            $doctrineManager->flush();
            // ... perform some action, such as saving the task to the database
            
           
        }

        return $this->renderForm('hello/hello.html.twig', [
            'form' => $form,
        ]);
    }

    #[Route('/category/{category}' , name:  'category')]
    public function index(string $category) :Response 
    {
            return $this->render('category/index.html.twig',[
            'category'=>$category
        ]);
    }
    
    

}