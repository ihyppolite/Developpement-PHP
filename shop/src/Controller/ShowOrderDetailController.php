<?php

namespace App\Controller;

use App\Entity\Order;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ShowOrderDetailController extends AbstractController
{
    #[Route('/show/order/detail/{id}', name: 'show_order_detail')]
    public function index( ManagerRegistry $doctrine ,$id): Response
    {
        $order = $doctrine->getRepository(Order::class)->find($id);
        $orderdetails =$order->getLineorder();
        return $this->render('show_order_detail/index.html.twig', [
            'orderdetails' =>  $orderdetails,
        ]);
    }
}
