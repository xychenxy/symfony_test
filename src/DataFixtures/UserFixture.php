<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixture extends Fixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {

        for($i=0; $i<10; $i++){
            $user = new User();
            $user->setFirstName(sprintf('user%d', $i));
            $user->setEmail(sprintf('test%d@gmail.com', $i));
            $user->setPassword($this->passwordEncoder->encodePassword($user,'111'));
            $manager->persist($user);
        }

        for($i=0; $i<3; $i++){
            $user = new User();
            $user->setFirstName(sprintf('admin%d', $i));
            $user->setEmail(sprintf('admin%d@gmail.com', $i));
            $user->setPassword($this->passwordEncoder->encodePassword($user,'111'));
            $user->setRoles(['ROLE_ADMIN']);
            $manager->persist($user);
        }

        $manager->flush();
    }
}
