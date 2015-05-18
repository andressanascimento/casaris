<?php

namespace Casaris\Bundle\CoreBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Casaris\Bundle\SocialBundle\Entity\Company;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LoadCompanyData extends LoadDataFromYml implements OrderedFixtureInterface {

    public function load(ObjectManager $manager) {
        $companies = $this->getModelFixtures();

        // Now iterate thought all fixtures
        foreach ($companies['Company'] as $reference => $columns) {
            $company = new Company();
            $factory = $this->container->get('security.encoder_factory');
            $encoder = $factory->getEncoder($company);

            $company->setName($columns['name']);
            $company->setEmail($columns['email']);
            $company->setCity($this->getReference($columns['city']));
            $company->setPassword($encoder->encodePassword($columns['password'], $company->getSalt()));
            $company->addCategory($this->getReference($columns['category']));
            $manager->persist($company);
            $manager->flush();

            // Add a reference to be able to use this object in others entities loaders
            $this->addReference($reference, $company);
        }
    }

    public function getOrder() {
        return 5;
    }

    public function setContainer(ContainerInterface $container = null) {
        $this->container = $container;
    }

    /**
     * The main fixtures file for this loader.
     */
    public function getModelFile() {
        return 'company';
    }

}
