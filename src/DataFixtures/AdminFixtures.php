<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Admin;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AdminFixtures extends Fixture
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
                  'email' => 'root@my.cat',
                  'role' => ['ROLE_ADMIN'],
                  'password' => 123654
              ]
        ];
        
        foreach ($usersData as $data) {
            $user = new Admin();
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
