<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

class DevsController
{
    public function __construct()
    {
        echo "It's the Devs Constructor";
    }

    public function index(): Response
    {
        return new Response('Welcome to your Devs controller!');
    }
}


