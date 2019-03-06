<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Silverback\ApiComponentBundle\Entity\User\User;
use Silverback\ApiComponentBundle\Repository\User\UserRepository;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private $encoder;
    private $userRepository;

    /**
     * UserFixtures constructor.
     * @param UserPasswordEncoderInterface $encoder
     * @param UserRepository $userRepository
     */
    public function __construct(UserPasswordEncoderInterface $encoder, UserRepository $userRepository)
    {
        $this->encoder = $encoder;
        $this->userRepository = $userRepository;
    }

    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager): void
    {
        $superAdminUsers = ['daniel@silverback.is', 'matthew@silverback.is'];
        foreach ($superAdminUsers as $username) {
            $this->createNewUser($username, $manager, [ 'ROLE_SUPER_ADMIN' ]);
        }

        $adminUsers = [];
        foreach ($adminUsers as $username) {
            $this->createNewUser($username, $manager, [ 'ROLE_ADMIN' ]);
        }
        $manager->flush();
    }

    private function createNewUser($email, ObjectManager $manager, array $roles = [ 'ROLE_USER' ]): void
    {
        if ($user = $this->userRepository->findOneBy(['username' => $email])) {
            $user
                ->setRoles($roles)
                ->setPasswordRequestedAt(null)
            ;

            return;
        }
        $user = new User($email, $roles);
        $plainPassword = bin2hex(random_bytes(10));
        $password = $this->encoder->encodePassword($user, $plainPassword);
        $user->setPassword($password);
        $user->setUsername($email);
        $manager->persist($user);
    }
}
