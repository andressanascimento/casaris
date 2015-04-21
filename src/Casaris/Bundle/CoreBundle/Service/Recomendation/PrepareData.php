<?php

namespace Casaris\Bundle\CoreBundle\Service\Recomendation;

use Doctrine\DBAL\Connection;


class PrepareData {

    private $connection;
    private $data;

    public function __construct(Connection $connection) {
        $this->connection = $connection;
    }

    public function clean() {

        $sql = 'SELECT u.user, c.category_id, count(c.category_id) as qtde
                FROM (SELECT distinct r.user, r.supplier FROM recomendation r) u
                JOIN company_category c ON c.company_id = u.supplier
                GROUP BY u.user, c.category_id';
        $query = $this->connection->prepare($sql);
        $query->execute();
        $this->data = $query->fetchAll();
        return $this;
    }
    
    public function integration() {
        
        $final = array();
        
        foreach($this->data as $v) {
            $category = $v['category_id'];
            $final[$v['user']]['cat'.$category] = $v['qtde'];
        }
        
        return $final;
    }

}
