<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

class DevController
{
    public function __construct()
    {
        echo "It's the Constructor";
    }

    public function __invoke()
    {
        return new Response('Welcome to your new controller!');
    }

    public function index(): Response
    {
        return new Response('Welcome to your new controller!');
    }
}