<?php

namespace Casaris\Bundle\SocialBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class SupplierSearchController extends Controller {

    /**
     * @Route("/supplier", name="_supplier")
     * @Template()
     */
    public function indexAction() {
        $recomendation = $this->get('collaborative_filter')->getData();
        $companies = $this->getDoctrine()->getRepository('SocialBundle:Company')->getCompaniesMostRecommended();
        $categories = $this->getDoctrine()->getRepository('SocialBundle:Category')->findAll();
        return array('recomendation' => $recomendation,'companies'=>$companies,'categories'=>$categories);
    }

}
