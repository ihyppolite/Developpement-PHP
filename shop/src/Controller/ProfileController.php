<?php

namespace App\Controller;

use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProfileController extends AbstractController
{
    #[Route('/profile', name: 'profile')]
    public function index(): Response
    {
         $user=$this->getUser();
         $fullname = $user->getFirstname().  $user->getLastname();
        return $this->render('profile/index.html.twig', [
            'fullname' => $fullname,
        ]);
    }

    // #[Route('/profile/update', name: 'update_profile')]
    // public function updateprofile(ManagerRegistry $doctrine ): Response
    // {
    //     $user=$this->getUser();
    //     $Email = $user->getEmail();
        
    //     $adress=$user->getAdress();
    //     $phone=$user->getPhone();

    //     return $this->render('profile/update.html.twig', [
    //         'mail' => $Email,
    //         'adress' =>$adress,
    //         'phone'=> $phone,

    //     ]);
    // }
}
