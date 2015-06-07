<?php

namespace Casaris\Bundle\SocialBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class SearchController extends Controller
{
    /**
     * @Route("/search/{term}/{page}", name="_search")
     * @Template()
     */
    public function indexAction($term, $page = 1)
    {
        $companies = $this->getDoctrine()->getRepository('SocialBundle:Company')->findByTerm($term, $page);
        var_dump($companies);
        return array();
    }
}
