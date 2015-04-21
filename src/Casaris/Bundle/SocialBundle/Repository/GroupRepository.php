<?php

namespace Casaris\Bundle\SocialBundle\Repository;

use Casaris\Bundle\CoreBundle\Repository\GenericDAO;
use Casaris\Bundle\SocialBundle\Entity\User;

class GroupRepository extends GenericDAO {
    
    public function getGroup(User $user) {

        $em = $this->getEntityManager();
        $query = $em->createQuery('SELECT g FROM SocialBundle:Group g WHERE g.user = :user');
        $query->setParameter('user', $user->getId());
        return $query->getResult();
    }

}
