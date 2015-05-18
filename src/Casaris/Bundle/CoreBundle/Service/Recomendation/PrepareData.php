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

        /**
         * SELECT u.id as user, 
         * c.id as category, 
         * (SELECT count(cc.category_id) as qtde 
         * FROM recommended_supplier r 
         * JOIN company_category cc ON cc.company_id = r.supplier 
         * where r.user = u.id and cc.category_id = c.id) qtde 
         * FROM category c, user u 
         * WHERE u.type = 'client'
         */
        
        $sql = "SELECT u.id as user, "
                . "c.id as category_id, "
                . "(SELECT count(cc.category_id) as qtde "
                    . "FROM recommended_supplier r "
                    . "JOIN company_category cc ON cc.company_id = r.supplier "
                    . "WHERE r.user = u.id and cc.category_id = c.id) qtde "
             . "FROM category c, user u "
             . "WHERE u.type = 'client'";
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
