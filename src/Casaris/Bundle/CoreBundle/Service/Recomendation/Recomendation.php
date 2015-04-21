<?php

namespace Casaris\Bundle\CoreBundle\Service\Recomendation;

use Symfony\Component\Security\Core\SecurityContext;
use Doctrine\ORM\EntityManager;
use Doctrine\DBAL\Connection;
use Casaris\Bundle\SocialBundle\Entity\Group;

class Recomendation {

    private $context;
    private $em;
    private $connection;

    public function __construct(SecurityContext $context, EntityManager $em, Connection $connection) {
        $this->context = $context;
        $this->em = $em;
        $this->connection = $connection;
    }

    public function getUser() {
        return $this->context->getToken()->getUser();
    }

    public function recomendationData() {

        $prepare = new PrepareData($this->connection);
        $data = $prepare->clean()->integration();

        $groups = new KMeansImplementation();

        $prepare_groups = $groups->initialize($data)->retrieveGroups();

        $this->saveGroups($prepare_groups);
    }

    public function saveGroups($data) {

        foreach ($data as $cluster => $v) {

            foreach ($v as $u) {
                $user = $this->em->getRepository('SocialBundle:User')->find($u);
              
                $group = $this->em->getRepository('SocialBundle:Group')->getGroup($user);

                if (empty($group)) {
                    $group = new Group();
                } else {
                    $group = $group[0];
                }
                $group->setUser($user);
                $group->setGroup($cluster);

                $this->em->persist($group);
                $this->em->flush();
            }
            
        }

    }

}
