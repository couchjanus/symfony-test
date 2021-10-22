<?php

namespace App\Controller\Api;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Entity\Customer;

#[Route('/api')]
class AuthController extends ApiController
{
  #[Route('/register', name: 'customer.register')]
  public function app(Request $request) : JsonResponse
  {
      $jsonData = $this->requestHelper->handleRequest($request->getContent(), 'users', Customer::class);
      $customer = $this->em->getRepository(Customer::class)->createNewCustomer($jsonData);
      return $this->responseHelper->createResponse($customer, ['customers'], 201);
  }

  #[Route('/profile', name: 'user.profile')]
  public function profile(Request $request) : JsonResponse
  {
      $currentUser = $this->getUser();
      return $this->responseHelper->createResponse($currentUser, ['customers'], 200);
  }

}

//    public function profile() : JsonResponse
//    {
//        $currentUser = $this->getUser();
//        $user = $this->serializer->serialize($currentUser, 'json');
//        return new JsonResponse([
//            $user
//        ], 200);


//use App\Repository\CustomerRepository;
//use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
//use Symfony\Component\HttpFoundation\JsonResponse;
//use Symfony\Component\HttpFoundation\Request;
//use Symfony\Component\Routing\Annotation\Route;
//use Symfony\Component\Security\Core\Security;
//use Symfony\Component\Serializer\SerializerInterface;
//
//#[Route('/api')]
//class AuthController extends AbstractController
//{
//    private CustomerRepository $customerRepository;
//    private Security $security;
//    private SerializerInterface $serialize;
//
//    public function __construct(
//        CustomerRepository $customerRepository,
//        Security $security,
//        SerializerInterface $serializer
//    )
//    {
//        $this->security = $security;
//        $this->customerRepository = $customerRepository;
//        $this->serializer = $serializer;
//    }
//
//    #[Route('/register', name: 'user.register')]
//    public function app(Request $request) : JsonResponse
//    {
//        $jsonData = json_decode($request->getContent());
//        $user = $this->customerRepository->create($jsonData);
//
//        return new JsonResponse([
//            'user' => $this->serializer->serialize($user, 'json')
//        ], 201);
//    }
//
//    #[Route('/profile', name: 'profile')]
//    public function profile() : JsonResponse
//    {
//        $currentUser = $this->getUser();
//        $user = $this->serializer->serialize($currentUser, 'json');
//        return new JsonResponse([
//            $user
//        ], 200);
//    }
//
//}
