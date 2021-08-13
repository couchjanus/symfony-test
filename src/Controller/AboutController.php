<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AboutController extends AbstractController
{
    #[Route('/about', name: 'about')]
    public function index(): Response
    {
        $users = [
            [
                'username'=>"Mary",
                'created_at'=> time(),
                'subscribed' => false
            ]
        ];
        $product = [
            'stock'=>200
        ];

        $temperature = 20;

        return $this->render('about/index.html.twig', [
            'controller_name' => 'AboutController', 'online' => false, 'users' => $users, 'temperature'=>$temperature, 'product'=>$product        ]);
    }
}
