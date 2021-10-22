<?php

namespace App\Helper;

use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;

class JsonResponseHelper
{
    private SerializerInterface $serialiser;

    public function __construct(SerializerInterface $serializer)
    {
        $this->serialiser = $serializer;
    }

    /**
     * @param mixed    $entity
     * @param string[] $serializationGroups
     */
    public function createResponse($entity, array $serializationGroups, $status = 200): JsonResponse
    {
        return new JsonResponse(
            $this->serialiser->serialize($entity, 'json', ['groups' => $serializationGroups]), $status);
    }
}