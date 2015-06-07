<?php

namespace Casaris\Bundle\SocialBundle\Repository;

use Casaris\Bundle\CoreBundle\Repository\GenericDAO;
use Doctrine\ORM\Tools\Pagination\Paginator;

class CompanyRepository extends GenericDAO
{
    public function getCompaniesMostRecommended() {

        $em = $this->getEntityManager();
        $query = $em->createQuery('SELECT c FROM SocialBundle:Company c');
        $query->setMaxResults(20);
        return $query->getResult();
    }
    
    public function findByTerm($term, $page) {
        $f = $page*10;
        $i = $f-10;
        $em = $this->getEntityManager();
        $query = $em->createQuery("SELECT c.id, c.name, c.email, cat.id, cat.name FROM SocialBundle:Company c JOIN c.category cat WHERE c.name LIKE :term");
        $query->setFirstResult($i);
        $query->setParameter('term', '%'.$term.'%');
        $query->setMaxResults($f);
        return $query->getResult();
    }
}
