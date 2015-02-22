<?php

namespace Casaris\Bundle\CoreBundle\Repository;

use Doctrine\ORM\EntityRepository;

class GenericDAO extends EntityRepository {
    
    public function insert($object)
    {
        $em = $this->getEntityManager();
        $em->persist($object);
        $em->flush();
        
        return $object;
    }
    
    public function update($object) 
    {
        $em = $this->getEntityManager();
        $em->persist($object);
        $em->flush();      
    }
    
    public function delete($object) {
        $em = $this->getEntityManager();
        $em->remove($object);
        $em->flush();
    }
    
    public function find($id) {
        $em = $this->getEntityManager();
        $object = $em->find($this->getEntityName(), $id);
        return $object;
    }
    
    public function getAll(){
        $em = $this->getEntityManager();
        $objects = $em->createQueryBuilder()->from($this->getClassName(), 'u')->getQuery()->getResult();
        return $objects;
    }
}
