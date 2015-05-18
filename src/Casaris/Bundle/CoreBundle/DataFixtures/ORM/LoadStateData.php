<?php

namespace Casaris\Bundle\CoreBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Casaris\Bundle\SocialBundle\Entity\State;

class LoadStateData  extends LoadDataFromYml implements OrderedFixtureInterface {

    public function load(ObjectManager $manager) {
        $states = $this->getModelFixtures();

        // Now iterate thought all fixtures
        foreach ($states['States'] as $reference => $columns) {
            $state = new State();
            $state->setName($columns['name']);
            $state->setUf($reference);
            $manager->persist($state);
            $manager->flush();

            // Add a reference to be able to use this object in others entities loaders
            $this->addReference($reference, $state);
        }
    }

    public function getOrder() {
        return 3;
    }

    /**
     * The main fixtures file for this loader.
     */
    public function getModelFile() {
        return 'state';
    }

}
