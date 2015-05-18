<?php

namespace Casaris\Bundle\CoreBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Casaris\Bundle\SocialBundle\Entity\Recomendation;

class LoadRecomendationData extends LoadDataFromYml implements OrderedFixtureInterface {

    public function load(ObjectManager $manager) {
        $recomendation = $this->getModelFixtures();

        // Now iterate thought all fixtures
        foreach ($recomendation['Recomendation'] as $columns) {
            $rs = new Recomendation();

            $rs->setUser($this->getReference($columns['user']));
            $rs->setSupplier($this->getReference($columns['supplier']));
            $rs->setDatetime(new \Datetime("now"));

            $manager->persist($rs);
            $manager->flush();
        }
    }

    public function getOrder() {
        return 6;
    }

    /**
     * The main fixtures file for this loader.
     */
    public function getModelFile() {
        return 'recomendation';
    }

}
