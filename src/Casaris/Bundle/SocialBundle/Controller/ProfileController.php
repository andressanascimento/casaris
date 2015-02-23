<?php

namespace Casaris\Bundle\SocialBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class ProfileController extends Controller
{
    /**
     * @Route("/profile", name="_profile")
     * @Template()
     */
    public function indexAction()
    {
        $user_information = $this->getDoctrine()->getRepository('SocialBundle:User')->getUserInformation($user);
        return array('user_information' => $user_information);
    }
}
