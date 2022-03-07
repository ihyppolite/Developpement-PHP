<?php

namespace App\Controller;

use App\Entity\Order;
use App\Entity\Product;
use App\Entity\User;
use App\Form\UserType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    #[Route('/user', name: 'user')]
    public function index(Request $request,SessionInterface $session ,ManagerRegistry $doctrine): Response
    {
        
        $order = new Order();
        
        
        $user = new User();


        

        $total= $session->get('final');
       

        $form= $this->createForm(UserType::class, $user);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $order = new Order();
            $sessionCart = $session->get('cart');
            
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $user = $form->getData();
            $doctrineManager= $doctrine->getManager();
            $doctrineManager->persist( $user);
            $doctrineManager->flush();

            $sessionCart = $session->get('cart');

            foreach($sessionCart as $id =>$quantity ){
                $product= $doctrine->getRepository(Product::class)->find($id);
                $order->addProduct($product);
            }
            $order->setClient($user);
            $order->setTotalprice($total);
            $order->setDelivery(false);
            
            $doctrineManager->persist( $order);
            $doctrineManager->flush();


            return $this->renderForm('user/index.html.twig', [
                
            ]);
            
           
        }

        return $this->renderForm('user/index.html.twig', [
            'form' => $form,
        ]);
       
    }
}
