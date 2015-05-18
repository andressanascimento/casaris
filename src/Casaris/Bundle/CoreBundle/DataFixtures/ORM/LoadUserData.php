<?php

namespace Casaris\Bundle\CoreBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Casaris\Bundle\SocialBundle\Entity\Client;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LoadUserData extends LoadDataFromYml implements OrderedFixtureInterface {

    private $container;

    /**
     * Main load function.
     *
     * @param Doctrine\Common\Persistence\ObjectManager $manager
     */
    function load(ObjectManager $manager) {
        $user = $this->getModelFixtures();

        // Now iterate thought all fixtures
        foreach ($user['Client'] as $reference => $columns) {
            $client = new Client();
            $factory = $this->container->get('security.encoder_factory');
            $encoder = $factory->getEncoder($client);

            $client->setName($columns['name']);
            $client->setEmail($columns['email']);
            $client->setPassword($encoder->encodePassword($columns['password'], $client->getSalt()));
            $manager->persist($client);
            $manager->flush();

            // Add a reference to be able to use this object in others entities loaders
            $this->addReference($reference, $client);
        }
    }

    public function getOrder() {
        return 1;
    }

    public function setContainer(ContainerInterface $container = null) {
        $this->container = $container;
    }

    /**
     * The main fixtures file for this loader.
     */
    public function getModelFile() {
        return 'client';
    }

}
