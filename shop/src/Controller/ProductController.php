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

     //affiche tout les produits    
    #[Route('/product', name: 'product')]
    public function show(ManagerRegistry $doctrine)
    {
        
        $products = $doctrine->getRepository(Product::class)->findAll();

        return $this->render('product/index.html.twig',['products'=>$products]);

    }

   
    // route vers formulaires ajoute de produit 
    #[Route('/product/add', name: 'add_product')]
  
    public function new (Request $request ,ManagerRegistry $doctrine ): Response
    {
        $product = new Product();

        $form= $this->createForm(ProductType::class,  $product );

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $image = $form['image']->getData();

                // verifie et ajoute des caracteres a la fin des nom image 
                $extension = $image->guessExtension();
                if ($extension == 'jpeg'  || $extension == 'jpg' || $extension == 'png' || $extension == 'svg') {
                    $filename = $image->getClientOriginalName().rand(1, 99999) . '.' . $extension;
                    $image->move("assets",$filename);
                }
               
           
            $product = $form->getData();
            $product->setImage($filename);
            $doctrineManager= $doctrine->getManager();
            $doctrineManager->persist($product);

            $doctrineManager->flush();  
           
        }


        return $this->renderForm('product/add.html.twig', [
            'form' => $form,
        ]);

        
    }
    
    //route utiliser pour le search bar 
    #[Route('/product/{name}', name: 'product_by_name')]
    public function name(ManagerRegistry $doctrine, string $name): Response

    {
       
        $products = $doctrine->getRepository(Product::class)->findProduct( $name.'%' );
        
        return $this->render('product/index.html.twig', [
            'products' => $products,
        ]);
    }
}
