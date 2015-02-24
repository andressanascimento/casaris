<?php

namespace Casaris\Bundle\SocialBundle\Repository;

use Casaris\Bundle\CoreBundle\Repository\GenericDAO;
use Casaris\Bundle\SocialBundle\Entity\Activity;

class PostRepository extends GenericDAO
{
    public function insert($object) {
        
        $post = parent::insert($object);
        $activity_type = $this->getEntityManager()->getRepository('SocialBundle:ActivityType');
        $type = $activity_type->find(2);
        
        $activity = new Activity();
        $activity->setSource($post->getId());
        $activity->setUser($post->getUser());
        $activity->getDatetime(new \Datetime("now"));
        $activity->setActivity($type);
        
        $em = $this->getEntityManager();
        $em->persist($activity);
        $em->flush();
    }
}
