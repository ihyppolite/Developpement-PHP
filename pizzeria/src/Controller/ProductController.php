<?php

namespace App\Controller;

use App\Entity\Product;
use App\Form\ProductType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    #[Route('/product', name: 'product')]
  
    public function new (Request $request ,ManagerRegistry $doctrine ): Response
    {
        $product = new Product();

        $form= $this->createForm(ProductType::class,  $product );

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $image = $form['image']->getData();

                // compute a random name and try to guess the extension (more secure)
                $extension = $image->guessExtension();
                if ($extension == 'jpeg'  || $extension == 'jpg' || $extension == 'png' || $extension == 'svg') {
                    $filename = $image->getClientOriginalName().rand(1, 99999) . '.' . $extension;
                    $image->move("assets",$filename);
                }
               
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $product = $form->getData();
            $product->setImage($filename);
            $doctrineManager= $doctrine->getManager();
            $doctrineManager->persist($product);

            $doctrineManager->flush();
            // ... perform some action, such as saving the task to the database
            
           
        }


        return $this->renderForm('hello/hello.html.twig', [
            'form' => $form,
        ]);

        
    }
     
    #[Route('/product/new')]
    public function show(ManagerRegistry $doctrine)
    {
        
        $products = $doctrine->getRepository(Product::class)->findAll();

        return $this->render('pizza/product.html.twig',['products'=>$products]);

    }
}
