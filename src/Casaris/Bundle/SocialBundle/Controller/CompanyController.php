<?php

namespace Casaris\Bundle\SocialBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;


class CompanyController extends Controller {

    /**
     * @Route("/company/{id}", name="_company")
     * @Template()
     */
    public function indexAction($id) {
        
        $this->get('recomendation_common')->prepareData();
        $company = $this->getDoctrine()->getRepository('SocialBundle:Company')->find($id);
        
        $recomendation = $this->get('collaborative_filter')->getData();
        $recomendations = array();
        foreach($recomendation as $r) {
            $recomendations[] = $this->getDoctrine()->getRepository('SocialBundle:Company')->find($r['id']);
        }
        
        if ($company == null) {
            return $this->render(
                            'error.html.twig', array('error' => 'Essa empresa não existe!')
            );
        }

        return array('company' => $company, 'recomendations' => $recomendations);
    }

}
