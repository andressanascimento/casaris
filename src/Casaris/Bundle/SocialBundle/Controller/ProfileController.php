<?php

namespace Casaris\Bundle\SocialBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Casaris\Bundle\SocialBundle\Form\ClientType;
use Casaris\Bundle\SocialBundle\Form\CompanyType;
use Casaris\Bundle\SocialBundle\Form\ProductType;
use Symfony\Component\HttpFoundation\Request;
use Casaris\Bundle\SocialBundle\Form\DocumentType;
use Casaris\Bundle\SocialBundle\Entity\Document;
use Casaris\Bundle\SocialBundle\Entity\Product;
use Symfony\Component\HttpFoundation\RedirectResponse;

class ProfileController extends Controller {

    /**
     * @Route("/profile", name="_profile")
     * @Template()
     */
    public function indexAction() {
        $user = $this->get('security.context')->getToken()->getUser();
        $product = new Product();
        $role = $user->getRoles();
        if ($role[0] == 'ROLE_COMPANY') {
            $form = $this->createForm(new CompanyType(), $user, array(
                'action' => $this->generateUrl('_profile_update'),
                'method' => 'post'));
           
            $form_product = $this->createForm(new ProductType(), $product, array(
                'action' => $this->generateUrl('_new_product'),
                'method' => 'post'));
        } else {
            $form = $this->createForm(new ClientType(), $user, array(
                'action' => $this->generateUrl('_profile_update'),
                'method' => 'post'));
        }

        $form_document = $this->createForm(new DocumentType(), new Document(), array(
            'action' => $this->generateUrl('_profile_update_photo'),
            'method' => 'post'));
        
        if ($role[0] == 'ROLE_COMPANY') {
             return array('form' => $form->createView(), 'form_document' => $form_document->createView(),'form_product' => $form_product->createView());
        } else {
             return array('form' => $form->createView(), 'form_document' => $form_document->createView());
        }

    }

    /**
     * @Route("/profile/update", name="_profile_update")
     * @Template("CoreBundle:Blank:blank.html.twig")
     */
    public function profileUpdateAction(Request $request) {
        $user = $this->get('security.context')->getToken()->getUser();
        $role = $user->getRoles();
        if ($role[0] == 'ROLE_COMPANY') {
            $form = $this->createForm(new CompanyType(), $user, array());
        } else {
            $form = $this->createForm(new ClientType(), $user, array());
        }
        
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
        $form = $this->createForm(new DocumentType(), $document);
        $form->handleRequest($request);
        
        if ($request->getMethod() == 'POST') {
            if ($form->isValid()) {
                $document = $this->getDoctrine()->getRepository('SocialBundle:Document')->insert($document);
                $user->setPhoto($document);
                $this->getDoctrine()->getRepository('SocialBundle:User')->update($user);
            }
        }
        return new RedirectResponse($this->generateUrl('_profile'));
    }

    /**
     * @Route("/profile/product/new", name="_new_product")
     * @Template("CoreBundle:Blank:blank.html.twig")
     */
    public function newProduct(Request $request) {
        $product = new Product();
        $user = $this->get('security.context')->getToken()->getUser();
        $form = $this->createForm(new ProductType(), $product);
        $form->handleRequest($request);
        
        if ($request->getMethod() == 'POST') {
            if ($form->isValid()) {
                $product->setIdCompany($user);
                $this->getDoctrine()->getRepository('SocialBundle:Product')->insert($product);
            }
        }
        return new RedirectResponse($this->generateUrl('_profile'));
    }
}
