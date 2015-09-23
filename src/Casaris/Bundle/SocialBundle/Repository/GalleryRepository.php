<?php
namespace Casaris\Bundle\SocialBundle\Repository;

use Casaris\Bundle\CoreBundle\Repository\GenericDAO;
use Casaris\Bundle\SocialBundle\Entity\Activity;

class GalleryRepository extends GenericDAO {
    
    public function insert($object) {
        
        $gallery = parent::insert($object);
        $activity_type = $this->getEntityManager()->getRepository('SocialBundle:ActivityType');
        $type = $activity_type->findOneBy(array('name'=>'gallery'));
        
        $activity = new Activity();
        $activity->setUser($gallery->getUser());
        $activity->setDatetime(new \Datetime("now"));
        $activity->setActivityType($type);
        $activity->setDocument($gallery->getDocument());
        
        $em = $this->getEntityManager();
        $em->persist($activity);
        $em->flush();
    }
    
}
