<?php

namespace App\Controller;
use Symfony\Component\Mime\Email;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Routing\Annotation\Route;

class MailerController extends AbstractController
{
    #[Route('/mailer', name: 'mailer')]
    public function index(MailerInterface $mailer)
    {
        $email = (new Email())
        ->from('toto@gmail.com')
        ->to('nicolas.desachy@gmail.com')
        //->cc('cc@example.com')
        //->bcc('bcc@example.com')
        //->replyTo('fabien@example.com')
        //->priority(Email::PRIORITY_HIGH)
        ->subject('Time for Symfony Mailer!')
        ->text('Sending emails is fun again!')
        ->html('<p>See Twig integration for better HTML integration! Nathan Hyppolite</p>');

    $mailer->send($email);

    return $this->render('mailer/index.html.twig', [
        'controller_name' => 'MailerController',
    ]);
       
    }
}
