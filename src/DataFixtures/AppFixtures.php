<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    private UserPasswordEncoderInterface $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $admin = new User();
        $admin
            ->setEmail('admin@admin.com')
            ->setFullName('Administrator')
            ->setImageUrl('https://picsum.photos/250/250')
            ->setPassword($this->encoder->encodePassword($admin, 'admin'))
            ->setRole('ROLE_ADMIN');
        $manager->persist($admin);

        for ($i = 0; $i < 15; $i++)
        {
            $user = new User();
            $user
                ->setPassword($this->encoder->encodePassword($user, 'user' . $i))
                ->setFullName('User ' . $i)
                ->setEmail("user$i@user.com")
                ->setImageUrl('https://picsum.photos/250/250')
                ->setRole('ROLE_USER');
            $manager->persist($user);
        }

        $manager->flush();
    }
}
