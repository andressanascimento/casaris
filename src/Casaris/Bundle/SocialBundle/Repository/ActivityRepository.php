<?php

namespace Casaris\Bundle\SocialBundle\Repository;

use Casaris\Bundle\CoreBundle\Repository\GenericDAO;
use Casaris\Bundle\SocialBundle\Entity\Activity;

class ActivityRepository extends GenericDAO
{
    public function getActivity(Activity $activity) {

        $name = ucfirst($activity->getActivity()->getName());
        $repository = 'SocialBundle:'.$name;
        
        $activity_type = $this->getEntityManager()->getRepository($repository);
        return $activity_type->find($activity->getSource());
        
    }
    
    public function getComments(Activity $activity){
        
        $em = $this->getEntityManager();
        $query = $em->createQuery('SELECT c FROM SocialBundle:Comment c WHERE c.activity = :activity');
        $query->setParameter('activity', $activity->getId());
        return $query->getResult();
        
    }
}