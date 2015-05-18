<?php

namespace Casaris\Bundle\CoreBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Casaris\Bundle\SocialBundle\Entity\RecommendedSupplier;

class LoadRecommendedSupplierData extends LoadDataFromYml implements OrderedFixtureInterface {

    public function load(ObjectManager $manager) {
        $history = $this->getModelFixtures();

        // Now iterate thought all fixtures
        foreach ($history['History'] as $columns) {
            $rs = new RecommendedSupplier();

            $rs->setUser($this->getReference($columns['user']));
            $rs->setSupplier($this->getReference($columns['supplier']));
            $rs->setDatetime(new \Datetime("now"));

            $manager->persist($rs);
            $manager->flush();

        }
    }

    public function getOrder() {
        return 7;
    }

    /**
     * The main fixtures file for this loader.
     */
    public function getModelFile() {
        return 'history';
    }

}
