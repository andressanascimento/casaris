<?php

namespace Casaris\Bundle\SocialBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class SupplierSearchController extends Controller
{
    /**
     * @Route("/supplier", name="_supplier")
     * @Template()
     */
    public function indexAction()
    {
        return array();
    }
}
