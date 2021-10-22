<?php
namespace App\Tests;

use ApiPlatform\Core\Bridge\Symfony\Bundle\Test\ApiTestCase;
use App\Entity\User;
use Hautelook\AliceBundle\PhpUnit\ReloadDatabaseTrait;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AuthenticationTest extends ApiTestCase
{
    use ReloadDatabaseTrait;

    
    public function testLogin(): void
    {
        $client = self::createClient();

        $user = new User();
        $user->setEmail('test@example.com');
        $user->setRoles(['ROLE_USER']);

        
        $user->setPassword(
            self::$container->get('security.password_hasher')->hashPassword($user, 'password')
        );

        

        $manager = self::$container->get('doctrine')->getManager();
        $manager->persist($user);
        $manager->flush();

        // retrieve a token
        $response = $client->request('POST', '/api/login_check', [
            'headers' => ['Content-Type' => 'application/json'],
            'json' => [
                'username' => 'test@example.com',
                'password' => 'password',
            ],
        ]);

        $json = $response->toArray();
        $this->assertResponseIsSuccessful();
        $this->assertArrayHasKey('token', $json);

        // test not authorized
        $client->request('GET', '/greetings');
        $this->assertResponseStatusCodeSame(200);

        // test authorized
        $client->request('GET', '/greetings', ['auth_bearer' => $json['token']]);
        $this->assertResponseIsSuccessful();
    }
}