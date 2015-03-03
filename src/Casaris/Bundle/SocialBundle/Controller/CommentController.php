<?php

namespace Casaris\Bundle\SocialBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Casaris\Bundle\SocialBundle\Entity\Comment;
use Symfony\Component\HttpFoundation\Request;

class CommentController extends Controller {
    
    /**
     * @Route("/comment", name="_new_comment")
     * @Template("CoreBundle:Blank:blank.html.twig")
     */
    public function newCommentAction(Request $request) {
        $content = $request->get('comment');
        $activity_id = $request->get('activity');
        $user = $this->get('security.context')->getToken()->getUser();
        $activity = $this->getDoctrine()->getRepository('SocialBundle:Activity')->find($activity_id);
        
        $comment = new Comment();
        $comment->setContent($content);
        $comment->setUser($user);
        $comment->setDatetime(new \Datetime("now"));
        $comment->setActivity($activity);
        $this->getDoctrine()->getRepository('SocialBundle:Comment')->insert($comment);
        
        return $this->redirect($this->generateUrl('_index'));
    }
    
}
