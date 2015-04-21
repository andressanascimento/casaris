<?php

namespace Casaris\Bundle\CoreBundle\Service\Recomendation;

use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\HttpFoundation\RequestStack;
use Casaris\Bundle\SocialBundle\Entity\Recomendation;
use Doctrine\ORM\EntityManager;

class Common {
    
    private $context;
    private $request;
    private $em;

    public function __construct(SecurityContext $context, RequestStack $request_stack, EntityManager $em)
    {
        $this->context = $context;
        $this->request = $request_stack->getCurrentRequest();
        $this->em = $em;
    }
    
    public function getUser()
    {
        return $this->context->getToken()->getUser();
    }
    
    public function getCompany() {
        $id = $this->request->get('id');
        $company = $this->em->find('SocialBundle:Company', $id);
        return $company;
    }
    
    public function prepareData() {
        $user = $this->getUser();
        $company = $this->getCompany();
        
        $recomendation = new Recomendation();
        $recomendation->setDatetime(new \DateTime("now"));
        $recomendation->setUser($user);
        $recomendation->setSupplier($company);
        
        $this->em->persist($recomendation);
        $this->em->flush();
    }
    
}
