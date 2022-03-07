<?php

namespace App\Controller;

use App\Entity\Order;
use App\Entity\Product;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class CartController extends AbstractController
{
   

    #[Route('/cart/{id}', name: 'add_cart')]
    public function add(Request $request,SessionInterface $session,ManagerRegistry $doctrine, string $id): Response
    {
        $error="ce produit nexiste pas  ";

        $verif=$doctrine->getRepository(Product::class)->find($id);

        if ($verif) {  

            $num=$request->query->get('quantity');
            
            $products =$session->get('cart',[]);

            if (array_key_exists($id, $products)) {

                $products[$id]= $products[$id]+$num;
            

            }
            else{

                $products[$id]=$num;
            

            }
            $session->set("cart",$products);
            
            // if($products==null){
            // $tableau=array();
            // $tableau[]=$id;
            // $session->set("cart",$tableau);
            // }
            // else{
            //     $products[]=$id;
            //     $cart=$session->set('cart',$products);
            // }

            return $this->redirectToRoute('cart');
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
        $total=0;
        foreach($sessionCart as $id =>$quantity ){
            $product= $doctrine->getRepository(Product::class)->find($id);
            $product->quantity =$quantity ;
            $product->total =$product->getPrice() * $quantity;
            $cart[] = $product;
            $total+= $product->total;
            
            

        }
          
        $session->set("final",$total);

          
        return $this->render('cart/index.html.twig', [
            'cart'=>$cart , 
        ]);
    }

    
}
