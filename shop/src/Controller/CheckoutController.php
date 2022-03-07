<?php

namespace App\Controller;

use App\Entity\Order;
use Doctrine\Persistence\ManagerRegistry;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Stripe;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class CheckoutController extends AbstractController
{
    #[Route('/checkout', name: 'checkout')]
    public function index(SessionInterface $session,ManagerRegistry $doctrine)
    {
        //recuperation du numero de commande pour les info de payment 
       $order = $doctrine->getRepository(Order::class)->find($session->get('orderid'));
         
          

        \Stripe\Stripe::setApiKey('sk_test_51KMsKtGA3rklLrcI9tQZlfbanEAucL4e0e49WU8aTnAbtFMi0pNbYtOPzKSG44k9YPjgiXVM1asoQl0nEcxRgvHO00a860lTt2  ');
        $session = \Stripe\Checkout\Session::create([
            'line_items' => [[
              'price_data' => [
                'currency' => 'eur',
                'product_data' => [
                  'name' => 'Total',
                ],
                'unit_amount' => $order->getTotalprice() * 100,
              ],
              'quantity' => 1,
            ],
            ],
            'mode' => 'payment',
            'success_url' => 'http://127.0.0.1:8000/checkout_success',// redirection en cas de succes
            'cancel_url' => 'http://127.0.0.1:8000/checkout_error'// redirection en cas error
          ]);


header("HTTP/1.1 303 See Other");

header("Location: " . $session->url);
exit();

        return $this->render('product/index.html.twig', [
            'controller_name' => 'CheckoutController',
        ]);
    }

    
    #[Route('/checkout_success', name: 'checkout_success')]
    public function succes(MailerInterface $mailer, SessionInterface $session):Response
    {
      
      // envoie de mail apres valdiation de la commande 
      $email = (new Email())
      ->from('Commande@Nshop.com')
      ->to($this->getUser()->getEmail())
      ->subject('Nshop')
      ->text('Confirmation de votre commande ')
      ->html('<p>Votre commande a bien ete rpise en compte </p>');

        $mailer->send($email);

        $session->set('cart',[]);
       return $this->render('checkout/sucess.html.twig', [
        'controller_name' => 'CheckoutController',
    ]);
    }

    
    #[Route('/checkout_error', name: 'checkout_error')]
    public function error():Response
    {
       return $this->render('checkout/error.html.twig', [
        'controller_name' => 'CheckoutController',
    ]);
    }
}
