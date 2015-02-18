<?php

namespace Casaris\Bundle\SocialBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContextInterface;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Casaris\Bundle\SocialBundle\Entity\User;
use Casaris\Bundle\SocialBundle\Form\UserType;

class LoginController extends Controller {

    /**
     * @Route("/login", name="login_route")
     * @Template()
     */
    public function loginAction(Request $request) {
        $session = $request->getSession();
        if ($request->attributes->has(SecurityContextInterface::AUTHENTICATION_ERROR)) {
            $error = $request->attributes->get(SecurityContextInterface::AUTHENTICATION_ERROR);
        } elseif (null !== $session && $session->has(SecurityContextInterface::AUTHENTICATION_ERROR)) {
            $error = $session->get(SecurityContextInterface::AUTHENTICATION_ERROR);
            $session->remove(SecurityContextInterface::AUTHENTICATION_ERROR);
        } else {
            $error = '';
        }
        $lastUsername = (null === $session) ? '' : $session->get(SecurityContextInterface::LAST_USERNAME);
        var_dump($error);
        return array('last_username' => $lastUsername, 'error' => $error);
    }

    /**
     * @Route("/login_check", name="login_check")
     * @Template()
     */
    public function loginCheck(Request $request) {
        $em = $this->getDoctrine();
        $repo = $em->getRepository("SocialBundle:User"); //Entity Repository
        var_dump($request->get('_username')); die();
        $user = $repo->loadUserByUsername($request->get('_username'));
        if (!$user) {
            throw new UsernameNotFoundException("User not found");
        } else {
            
            $token = new UsernamePasswordToken($user, $request->get('_password') , "administrators", $user->getRoles());
            $this->get("security.context")->setToken($token); //now the user is logged in
            //now dispatch the login event
            $request = $this->get("request");
            $event = new InteractiveLoginEvent($request, $token);
            $this->get("event_dispatcher")->dispatch("security.interactive_login", $event);
        }
    }

    /**
     * @Route("/register", name="register")
     * @Template()
     */
    public function registerAction(Request $request) {
        $em = $this->getDoctrine()->getManager();

        $user = new User();
        $form = $this->createForm(new UserType(), $user, array(
            'action' => $this->generateUrl('register'),
            'method' => 'post'));

        $form->handleRequest($request);
        if ($request->getMethod() == 'POST') {

            if ($form->isValid()) {

                $factory = $this->get('security.encoder_factory');
                $encoder = $factory->getEncoder($user);
                $password = $encoder->encodePassword($user->getPassword(), $user->getSalt());
                $user->setPassword($password);
                $em = $this->getDoctrine()->getManager();
                $em->persist($user);
                $em->flush();

                return $this->redirect($this->generateUrl('login_route'));
            }
        }

        return array('form' => $form->createView());
    }

}
