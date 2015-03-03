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
        $user = $this->get('security.context')->getToken()->getUser();
        
        $activities = $this->getDoctrine()->getRepository('SocialBundle:Activity')->getActivities(0,20,$user);

        return array(
            'form_comment' => $form->createView(),
            'activities' => $activities
        );
    }

    /**
     * @Route("/newComment", name="_new_post")
     * @Template("CoreBundle:Blank:blank.html.twig")
     */
    public function newCommentAction(Request $request) {
        $post = new Post();
        $form = $this->createForm(new PostType(), $post, array(
            'action' => $this->generateUrl('_new_post'),
            'method' => 'post'));
        $form->handleRequest($request);

        if ($request->getMethod() == 'POST') {

            if ($form->isValid()) {
                $post->setUser($this->get('security.context')->getToken()->getUser());
                $post->setDate(new \DateTime("now"));

                $this->getDoctrine()->getRepository('SocialBundle:Post')->insert($post);

                return $this->redirect($this->generateUrl('_index'));
            }
        }
    }

    /**
     * @Route("/name", name="_name")
     * @Template("CoreBundle:Blank:blank.html.twig")
     */
    public function name(Request $request) {
        $name = $request->get('value');
        $user = $this->get('security.context')->getToken()->getUser();
        $user->setName($name);
        $this->getDoctrine()->getRepository('SocialBundle:User')->update($user);

        return array();
    }

    /**
     * @Route("/profession", name="_profession")
     * @Template("CoreBundle:Blank:blank.html.twig")
     */
    public function profession(Request $request) {
        $profession = $request->get('value');
        $user = $this->get('security.context')->getToken()->getUser();
        $user->setProfession($profession);
        $this->getDoctrine()->getRepository('SocialBundle:Client')->update($user);
        return array();
    }

    /**
     * @Route("/phrase", name="_phrase")
     * @Template("CoreBundle:Blank:blank.html.twig")
     */
    public function phrase(Request $request) {
        $phrase = $request->get('value');
        $user = $this->get('security.context')->getToken()->getUser();
        $user->setPhrase($phrase);
        $this->getDoctrine()->getRepository('SocialBundle:Client')->update($user);
        return array();
    }

}
