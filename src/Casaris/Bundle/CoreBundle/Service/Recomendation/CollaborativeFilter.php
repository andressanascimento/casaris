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

        $sql = "SELECT c.id, u.name, "
                . "(SELECT count(*) FROM recomendation r where r.supplier = c.id) as qtde_recommended "
                . "FROM company c "
                . "JOIN user u ON u.id = c.id "
                . "WHERE c.id in "
                    . "( SELECT distinct supplier FROM recommended_supplier WHERE user in "
                        . "( SELECT c.user_id FROM cluster c WHERE c.cluster = (SELECT cluster from cluster g WHERE g.user_id = :user1) and c.user_id <> :user2 ) "
                    . ") order by qtde_recommended DESC limit 5";
        $query = $this->connection->prepare($sql);
        $query->bindParam(':user1', $user);
        $query->bindParam(':user2', $user);
        $query->execute();
        return $query->fetchAll();
    }

}
