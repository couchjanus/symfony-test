<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HelloController extends AbstractController
{
    #[Route('/hello', name: 'hello')]
    public function index(): Response
    {
        $max = 200;
        $number = random_int(0, $max);

        return new Response(
            '<html><body>Your Lucky number: '.$number.'</body></html>'
        );
//        return $this->render('hello/index.html.twig', [
//            'controller_name' => 'HelloController',
//        ]);
    }
}
