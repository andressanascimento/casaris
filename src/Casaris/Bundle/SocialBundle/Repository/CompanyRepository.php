<?php

namespace Casaris\Bundle\SocialBundle\Repository;

use Casaris\Bundle\CoreBundle\Repository\GenericDAO;
use Doctrine\ORM\Tools\Pagination\Paginator;

class CompanyRepository extends GenericDAO {

    public function getCompaniesMostRecommended() {

        $em = $this->getEntityManager();
        $query = $em->createQuery('SELECT c FROM SocialBundle:Company c JOIN c.category cat WHERE cat.id = 1');
        $query->setMaxResults(8);
        return $query->getResult();
    }

    public function findByTerm($term, $page) {
        $f = $page * 10;
        $i = $f - 10;
        $em = $this->getEntityManager();
        $query = $em->createQuery("SELECT c.id, c.name, c.email, cat.id, cat.name FROM SocialBundle:Company c JOIN c.category cat WHERE c.name LIKE :term");
        $query->setFirstResult($i);
        $query->setParameter('term', '%' . $term . '%');
        $query->setMaxResults($f);
        return $query->getResult();
    }

    public function search($search) {
//        $f = $search['page'] * 8;
//        $i = $f - 8;

        $q = $this->createQueryBuilder('c')->join('c.category', 'cat');
        if (!empty($search['search']) && !empty($search['category'])) {
            $q->where('c.name = :search');
            $q->andWhere('cat.id in (:category)');
            $q->setParameter('search', $search['search']);
            $q->setParameter('category', implode(",", $search['category']));
        } elseif(!empty($search['search'])) {
            $q->where('c.name = :search');
            $q->setParameter('search', $search['search']);
        } elseif(!empty($search['category'])) {
            $q->andWhere('cat.id in (:category)');
            $q->setParameter('category', implode(",", $search['category']));
        }
//        $q->setFirstResult($i);
//        $q->setMaxResults($f);
//        print_r($q->getQuery()->getSQL()); die();
        
        return $q->getQuery()->getResult();
    }

}
