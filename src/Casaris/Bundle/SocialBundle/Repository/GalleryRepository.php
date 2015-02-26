<?php
namespace Casaris\Bundle\SocialBundle\Repository;

use Casaris\Bundle\CoreBundle\Repository\GenericDAO;
use Casaris\Bundle\SocialBundle\Entity\Activity;

class GalleryRepository extends GenericDAO {
    
    public function insert($gallery) {
        
        $gallery = parent::insert($gallery);
        $activity_type = $this->getEntityManager()->getRepository('SocialBundle:ActivityType');
        $type = $activity_type->find(1);
        
        $activity = new Activity();
        $activity->setSource($gallery->getId());
        $activity->setUser($gallery->getClient());
        $activity->getDatetime(new \Datetime("now"));
        $activity->setActivity($type);
        
        $em = $this->getEntityManager();
        $em->persist($activity);
        $em->flush();
    }
    
}
