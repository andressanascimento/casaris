<?php

namespace Casaris\Bundle\SocialBundle\Repository;

use Casaris\Bundle\CoreBundle\Repository\GenericDAO;

class CompanyRepository extends GenericDAO
{
    public function getCompaniesMostRecommended() {

        $em = $this->getEntityManager();
//        $query = $em->createQuery('SELECT DISTINCT IDENTITY(r.supplier), c.name, cc.uf, cc.name as city, COUNT(r.supplier) as qtde FROM SocialBundle:Recomendation r JOIN r.supplier c JOIN c.city cc group by r.supplier,c.name, c.email ORDER BY qtde');
        $query = $em->createQuery('SELECT c FROM SocialBundle:Company c');
        $query->setMaxResults(20);
        return $query->getResult();
    }
}
