<?php

namespace Casaris\Bundle\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("/kmeans")
     * @Template()
     */
    public function indexAction()
    {
        $means = $this->get('recomendation')->recomendationData();

        return array();
    }
}
