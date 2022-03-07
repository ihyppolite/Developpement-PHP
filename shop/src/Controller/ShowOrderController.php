<?php

namespace App\Controller;

use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\MakerBundle\DependencyInjection\CompilerPass\SetDoctrineManagerRegistryClassPass;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ShowOrderController extends AbstractController
{
    #[Route('/show/order', name: 'show_order')]
    public function index( ): Response  

    {
        $orders =$this->getUser()->getOrders();
        
        return $this->render('show_order/index.html.twig', [
            'orders' => $orders,
        ]);
    }
}
