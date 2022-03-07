<?php

namespace App\Controller;

use App\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;

class ProductController extends AbstractController
{
    #[Route('/product/{name}', name: 'product_by_name')]
    public function name(ManagerRegistry $doctrine, $name): Response

    {
        $products = $doctrine->getRepository(Product::class)->findBy(['name' => $name ]);

        return $this->render('product/index.html.twig', [
            'products' => $products,
        ]);
    }


    #[Route('/product', name: 'product')]
    public function index(ManagerRegistry $doctrine): Response

    {
        $products = $doctrine->getRepository(Product::class)->findAll();

        return $this->render('product/index.html.twig', [
            'products' => $products,
        ]);
    }
}
