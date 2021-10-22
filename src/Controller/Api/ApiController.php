<?php

declare(strict_types=1);

namespace App\Controller\Api;

use App\Helper\JsonRequestHelper;
use App\Helper\JsonResponseHelper;
use Doctrine\ORM\EntityManagerInterface;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

abstract class ApiController extends AbstractController
{
//    protected EntityManagerInterface $em;
//    protected JsonRequestHelper $requestHelper;
//    protected JsonResponseHelper $responseHelper;

    public function __construct(protected EntityManagerInterface $em, protected JsonRequestHelper $requestHelper, protected JsonResponseHelper $responseHelper)
    {
//        $this->em = $em;
//        $this->responseHelper = $responseHelper;
//        $this->requestHelper = $requestHelper;
    }

}
