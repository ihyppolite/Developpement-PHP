<?php

namespace App\Controller;



use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;



class CheckoutController extends AbstractController
{
    #[Route('/checkout', name: 'checkout')]
    public function index(): Response
    {

        \Stripe\Stripe::setApiKey('sk_test_51KMsgyJE3cxov14o0KHN6aKlsnAGBhott5Z6VWzDw3zqtxYmvv3QNUP1piPVbAkF0dJkXF37fmAv8AVYLOw3Djgn00jmGpgipG');
        $session = \Stripe\Checkout\Session::create([
            'line_items' => [[
              'price_data' => [
                'currency' => 'eur',
                'product_data' => [
                  'name' => 'T-shirt',
                ],
                'unit_amount' => 2000,
              ],
              'quantity' => 1,
            ],
            [
                'price_data' => [
                  'currency' => 'eur',
                  'product_data' => [
                    'name' => 'Confiture',
                  ],
                  'unit_amount' => 3000,
                ],
                'quantity' => 2,
              ]],
            'mode' => 'payment',
            'success_url' => 'https://localhost:8000/checkout_success',
            'cancel_url' => 'https://localhost:8000/checkout_error'
          ]);


header("HTTP/1.1 303 See Other");

header("Location: " . $session->url);
exit();

        return $this->render('checkout/index.html.twig', [
            'controller_name' => 'CheckoutController',
        ]);
    }
}
