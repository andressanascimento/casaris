<?php

namespace Casaris\Bundle\CoreBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Casaris\Bundle\SocialBundle\Entity\Category;


class LoadCategoryData extends LoadDataFromYml implements OrderedFixtureInterface {

    public function load(ObjectManager $manager) {
        $categories = $this->getModelFixtures();

        // Now iterate thought all fixtures
        foreach ($categories['Category'] as $reference => $columns) {
            $category = new Category();
            $category->setName($columns['name']);

            $manager->persist($category);
            $manager->flush();

            // Add a reference to be able to use this object in others entities loaders
            $this->addReference($reference, $category);
        }
    }

    public function getOrder() {
        return 2;
    }
    
      /**
     * The main fixtures file for this loader.
     */
    public function getModelFile() {
        return 'category';
    }

}
