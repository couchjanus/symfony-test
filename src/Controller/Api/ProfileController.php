<?php

namespace App\Controller\Api;

use App\Entity\Customer;
//use App\Repository\CustomerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Serializer\SerializerInterface;


class ProfileController extends AbstractController
{
//    public const PATH = '/api/profile';
    public function __construct(
        private Security $security,
        private SerializerInterface $serializer
    )
    {

    }
    #[Route('/profile', name: 'customer.profile')]
    public function app(): Customer
    {
        /**
         *
         * @var Customer $user
         *
         */
        $user = $this->getUser();
        $user = $this->serializer->serialize($user, 'json');
//
        return new JsonResponse([
            $user
        ], 200);

//        return $user;
    }
}