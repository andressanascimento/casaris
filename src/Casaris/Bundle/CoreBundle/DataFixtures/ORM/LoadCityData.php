<?php

namespace Casaris\Bundle\CoreBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Casaris\Bundle\SocialBundle\Entity\City;

class LoadCityData extends LoadDataFromYml implements OrderedFixtureInterface {

    public function load(ObjectManager $manager) {
        $cities = $this->getModelFixtures();

        // Now iterate thought all fixtures
        foreach ($cities['City'] as $reference => $columns) {
            $city = new City();

            $city->setUf($columns['uf']);
            $city->setState($this->getReference($columns['state']));
            $city->setName($columns['name']);

            $manager->persist($city);
            $manager->flush();
            
            $this->addReference($reference, $city);
        }
    }

    public function getOrder() {
        return 4;
    }

    /**
     * The main fixtures file for this loader.
     */
    public function getModelFile() {
        return 'city';
    }

}
