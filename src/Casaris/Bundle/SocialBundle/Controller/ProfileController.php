<?php

namespace Casaris\Bundle\SocialBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Casaris\Bundle\SocialBundle\Form\ClientType;
use Symfony\Component\HttpFoundation\Request;
use Casaris\Bundle\SocialBundle\Form\DocumentType;
use Casaris\Bundle\SocialBundle\Entity\Document;

class ProfileController extends Controller {

    /**
     * @Route("/profile", name="_profile")
     * @Template()
     */
    public function indexAction() {
        $user = $this->get('security.context')->getToken()->getUser();

        $form = $this->createForm(new ClientType(), $user, array(
            'action' => $this->generateUrl('_profile_update'),
            'method' => 'post'));
        
        $form_document = $this->createForm(new DocumentType(), new Document(), array(
            'action' => $this->generateUrl('_profile_update_photo'),
            'method' => 'post'));

        return array('form' => $form->createView(),'form_document'=> $form_document->createView());
    }

    /**
     * @Route("/profile/update", name="_profile_update")
     * @Template("CoreBundle:Blank:blank.html.twig")
     */
    public function profileUpdateAction(Request $request) {
        $user = $this->get('security.context')->getToken()->getUser();
        $form = $this->createForm(new ClientType(), $user, array());
        $form->handleRequest($request);

        if ($request->getMethod() == 'POST') {

            if ($form->isValid()) {

                $this->getDoctrine()->getRepository('SocialBundle:User')->insert($user);

                return $this->redirect($this->generateUrl('_index'));
            }
        }
    }

    /**
     * @Route("/profile/change/photo", name="_profile_update_photo")
     * @Template("CoreBundle:Blank:blank.html.twig")
     */
    public function changePhoto(Request $request) {
        $document = new Document();
        $user = $this->get('security.context')->getToken()->getUser();
        $form = $this->createForm(new DocumentType(), $document, array());
        
        if ($request->getMethod() == 'POST') {
            
            if ($form->isValid()) {
                echo 'oi';
                $document = $this->getDoctrine()->getRepository('SocialBundle:Document')->insert($document);
                $user->setPhoto($document);
                $this->getDoctrine()->getRepository('SocialBundle:User')->update($user);
                
                return json_encode(array('src'=> '/uploads/images/'.$document->getPath()));
            }
        }
        
    }

}
