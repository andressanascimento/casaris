<?php

namespace Casaris\Bundle\SocialBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Casaris\Bundle\SocialBundle\Form\PostType;
use Casaris\Bundle\SocialBundle\Entity\Post;
use Symfony\Component\HttpFoundation\Request;

class IndexController extends Controller {

    /**
     * @Route("/", name="_index")
     * @Template()
     */
    public function indexAction() {
        $post = new Post();
        $form = $this->createForm(new PostType(), $post, array(
            'action' => $this->generateUrl('_new_comment'),
            'method' => 'post'));

        return array('form_comment' => $form->createView());
    }

    /**
     * @Route("/newComment", name="_new_comment")
     * @Template("CoreBundle:Blank:blank.html.twig")
     */
    public function newCommentAction(Request $request) {
        $em = $this->getDoctrine()->getManager();
        $post = new Post();
        $form = $this->createForm(new PostType(), $post, array(
            'action' => $this->generateUrl('_new_comment'),
            'method' => 'post'));
        $form->handleRequest($request);
        
        if ($request->getMethod() == 'POST') {

            if ($form->isValid()) {
                $post->setIdUser($this->get('security.context')->getToken()->getUser()->getId());
                $post->setDate(new \DateTime("now"));
                
                $this->getDoctrine()->getRepository('SocialBundle:Post')->insert($post);
                
                return $this->redirect($this->generateUrl('_index'));
            }
        }
    }
}
