<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Customer;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    private $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager)
    {
        $usersData = [
              0 => [
                  'email' => 'johndoe@my.cat',
                  'role' => ['ROLE_USER'],
                  'password' => 'test'
              ]
        ];
        
        foreach ($usersData as $data) {
            $user = new Customer();
            $user->setEmail($data['email']);
            $user->setPassword($this->passwordHasher->hashPassword(
                $user,
                $data['password']
            ));
            $user->setRoles($data['role']);
            $manager->persist($user);
        }
        
        $manager->flush();
    }
}
