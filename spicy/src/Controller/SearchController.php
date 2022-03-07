<?php

namespace App\Controller;

use App\Entity\Product;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SearchController extends AbstractController
{
    #[Route('/search/{value}', name: 'search')]
    public function index(ManagerRegistry $doctrine, $value): Response
    {
        $value= $value.'%';

        $toto=$doctrine->getRepository(Product::class)->findProduct($value);

        
       


        return $this->render('search/index.html.twig', [
            'products' => $toto,
        ]);
    }
}
