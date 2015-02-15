<?php

namespace Casaris\Bundle\SocialBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class FriendController extends Controller {
    /**
     * @Route("/friends")
     * @Template()
     */
    public function indexAction()
    {
        return array();
    }
}
