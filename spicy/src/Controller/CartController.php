<?php

namespace App\Controller;

use App\Entity\LineOrder;
use App\Entity\Order;
use App\Entity\Product;
use DateTime;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class CartController extends AbstractController

{
    #[Route('/valide', name: 'valide')]
    public function valide(SessionInterface $session,ManagerRegistry $doctrine)
    {

        $order= new Order();

        $products =$session->get('cart',[]);
        $doctrineManager= $doctrine->getManager();
        $total=0;
        foreach($products as $id =>$quantity ){
            $product=$doctrine->getRepository(Product::class)->find($id);
            $total+=$quantity * $product->getPrice();
            $lineOrder= new LineOrder();
            $lineOrder->setOrders($order);
            $lineOrder->setQuatity($quantity);
            $lineOrder->setSubtotal($quantity * $product->getPrice());
           
            $doctrineManager->persist( $lineOrder);
            

        };

        $order->setDate(new \DateTime('now'));
        $order->setUser($this->getUser());
        $order->setTotalprice($total);
        $doctrineManager->persist( $order);

        $doctrineManager->flush();
        
        return $this->redirectToRoute('checkout\index.html.twig', [
           
        ]);

    }




    #[Route('/cart/{id}/{quantity}', name: 'add_cart')]
    public function add(SessionInterface $session,ManagerRegistry $doctrine, string $id, $quantity): Response
    {
        $error="ce produit nexiste pas  ";

        $verif=$doctrine->getRepository(Product::class)->find($id);

        if ($verif) {  


            $products =$session->get('cart',[]);

             

                $products[$id]=$quantity;
            
            
            $session->set("cart",$products);
            

            return $this->render('cart/more.html.twig', [
                'quantity'=>$products[$id],
            ]);
            }
        else{

            return $this->render('cart/error.html.twig', [
                'error'=>$error,
            ]);
                
            
        }
    }

    #[Route('/cart', name: 'cart')]
    public function index(SessionInterface $session, ManagerRegistry $doctrine): Response

    {

        


        $cart = array();
        $sessionCart = $session->get('cart');
        
        ;
       
        $final=[];
        $i=0;
        foreach($sessionCart as $id =>$quantity ){
            
            $i++;
            $product= $doctrine->getRepository(Product::class)->find($id);
            $product->quantity =$quantity ;
            $product->total =$product->getPrice() * $quantity;
            $final[$i]= $product->total;
            $cart[] = $product;
           
            

        }
          
        $totalprice=array_sum( $final);
    

     
        return $this->render('cart/index.html.twig', [
            'cart'=>$cart ,
            'endprice'=> $totalprice, 
        ]);
    }

}
