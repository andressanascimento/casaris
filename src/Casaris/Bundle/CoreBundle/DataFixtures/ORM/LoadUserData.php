<?php

namespace Casaris\Bundle\CoreBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Casaris\Bundle\SocialBundle\Entity\Client;

class LoadUserData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $userAdmin = new Client();
        $userAdmin->setEmail('admin');
        $userAdmin->setPassword('test');
        $userAdmin->setName('Andressa');

        $manager->persist($userAdmin);
        $manager->flush();
    }
}
