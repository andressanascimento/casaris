<?php

namespace Casaris\Bundle\SocialBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Casaris\Bundle\SocialBundle\Entity\Gallery;
use Casaris\Bundle\SocialBundle\Form\DocumentType;
use Casaris\Bundle\SocialBundle\Entity\Document;
use Symfony\Component\HttpFoundation\Request;

class GalleryController extends Controller {

    /**
     * @Route("/gallery", name="_gallery")
     * @Template()
     */
    public function indexAction() {
        $document = new Document();
        
        $form = $this->createForm(new DocumentType(), $document, array(
            'action' => $this->generateUrl('_addGallery'),
            'method' => 'post')
        );
        
        $user = $this->get('security.context')->getToken()->getUser();
        
        $gallery = $this->getDoctrine()->getRepository('SocialBundle:Gallery')->findBy(array('client'=>$user->getId()));
        
        return array('form_new_image' => $form->createView(), 'gallery' => $gallery );
    }

    /**
     * @Route("/galery/add", name="_addGallery")
     * @Template("CoreBundle:Blank:blank.html.twig")
     */
    public function galleryAddAction(Request $request) {
        $gallery = new Gallery();
        $document = new Document();
        $form = $this->createForm(new DocumentType(), $document);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $user = $this->get('security.context')->getToken()->getUser();
            $document = $this->getDoctrine()->getRepository('SocialBundle:Document')->insert($document);
            $gallery->setDate(new \Datetime("now"));
            $gallery->setDocument($document);
            $gallery->setClient($user);
            $this->getDoctrine()->getRepository('SocialBundle:Gallery')->insert($gallery);
        }

        return $this->redirect($this->generateUrl('_gallery'));
    }
    
     /**
     * @Route("/gallery/delete", name="_delGallery")
     * @Template("CoreBundle:Blank:blank.html.twig")
     */
    public function galleryDelAction(Request $request) {
        $id = $request->get('id');
        $gallery = $this->getDoctrine()->getRepository('SocialBundle:Gallery');
        $item = $gallery->find($id);
        $gallery->delete($item);
    }

}
