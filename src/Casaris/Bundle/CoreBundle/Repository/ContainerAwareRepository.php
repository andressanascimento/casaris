<?php

namespace Casaris\Bundle\CoreBundle\Repository;

use Doctrine\ORM\EntityRepository;

abstract class ContainerAwareRepository extends EntityRepository
{
    protected $container;

    public function setContainer(ContainerInterface $container)
    {
        $this->container = $container;
    }
}
