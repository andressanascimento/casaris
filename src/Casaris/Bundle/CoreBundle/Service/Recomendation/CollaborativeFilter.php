<?php

namespace Casaris\Bundle\CoreBundle\Service\Recomendation;

use Symfony\Component\Security\Core\SecurityContext;
use Doctrine\ORM\EntityManager;
use Doctrine\DBAL\Connection;


class CollaborativeFilter {

    private $context;
    private $em;
    private $connection;

    public function __construct(SecurityContext $context, EntityManager $em, Connection $connection) {
        $this->context = $context;
        $this->em = $em;
        $this->connection = $connection;
    }

    public function getUser() {
        return $this->context->getToken()->getUser();
    }

    public function getData() {
        
        $user = $this->getUser()->getId();

        $sql = 'SELECT distinct r.supplier, (select count(*) from recommended_supplier rs where rs.supplier = r.supplier) 
                as qtd_recommend FROM recomendation r
                WHERE r.user in  
                ( SELECT c.user_id FROM cluster c WHERE c.cluster = (SELECT cluster from cluster g WHERE g.user_id = :user1) and c.user_id <> :user2)
                order by qtd_recommend DESC limit 5';
        $query = $this->connection->prepare($sql);
        $query->bindParam(':user1', $user);
        $query->bindParam(':user2', $user);
        $query->execute();
        return $query->fetchAll();
    }

}
