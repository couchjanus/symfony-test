<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpKernel\Profiler\Profiler;

class DevController  extends AbstractController
{

    public function index(?Profiler $profiler): Response
    {
        // $profiler won't be set if your environment doesn't have the profiler (like prod, by default)
        if (null !== $profiler) {
            // if it exists, disable the profiler for this particular controller action
            $profiler->disable();
        }
        // ... $profiler is the 'profiler' service

        $response = $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/HelloController.php',
        ]);

        $response->headers->set('Symfony-Debug-Toolbar-Replace', 1);


//        return $this->json([
//            'message' => 'Welcome to your new controller!',
//            'path' => 'src/Controller/HelloController.php',
//        ]);
        return $response;
    }
}