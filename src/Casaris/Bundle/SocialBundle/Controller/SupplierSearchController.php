<?php

namespace Casaris\Bundle\SocialBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

class SupplierSearchController extends Controller {

    /**
     * @Route("/supplier", name="_supplier")
     * @Template()
     */
    public function indexAction(Request $request) {
        $recomendation = $this->get('collaborative_filter')->getData();
        $recomendations = array();
        foreach($recomendation as $r) {
            $recomendations[$r['id']][] = $this->getDoctrine()->getRepository('SocialBundle:Company')->find($r['id']);
            $recomendations[$r['id']][] = $r['qtde_recommended'];
        }
        $filter = array();
        $companies = $this->getDoctrine()->getRepository('SocialBundle:Company')->getCompaniesMostRecommended();
        $categories = $this->getDoctrine()->getRepository('SocialBundle:Category')->findAll();
        if ($request->getMethod() == 'POST') {
            $filter = $request->request->all();
            $companies = $this->getDoctrine()->getRepository('SocialBundle:Company')->search($filter);
        }
        
        return array('recomendation' => $recomendations,'companies'=>$companies,'categories'=>$categories, 'filter'=> $filter);
        
    }

}
