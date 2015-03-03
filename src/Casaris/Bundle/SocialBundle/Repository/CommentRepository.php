<?php

namespace Casaris\Bundle\SocialBundle\Repository;

use Casaris\Bundle\CoreBundle\Repository\GenericDAO;
use Casaris\Bundle\SocialBundle\Entity\Activity;

class CommentRepository extends GenericDAO
{
    public function insert($object) {
        
        $comment = parent::insert($object);
        $activity_type = $this->getEntityManager()->getRepository('SocialBundle:ActivityType');
        $type = $activity_type->findOneBy(array('name'=>'post'));
        
        $activity = new Activity();
        $activity->setUser($comment->getUser());
        $activity->setDatetime(new \Datetime("now"));
        $activity->setActivityType($type);
        $activity->setContent($comment->getContent());
        
        $em = $this->getEntityManager();
        $em->persist($activity);
        $em->flush();
    }
}
