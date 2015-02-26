<?php

namespace Casaris\Bundle\SocialBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Casaris\Bundle\SocialBundle\Entity\Client;
use Casaris\Bundle\SocialBundle\Entity\Company;
use Casaris\Bundle\SocialBundle\Form\LoginClientType;
use Casaris\Bundle\SocialBundle\Form\LoginCompanyType;

class LoginController extends Controller {

    /**
     * @Route("/login", name="_login_route")
     * @Template()
     */
    public function loginAction(Request $request) {
        if ($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
            $error = $request->attributes->get(SecurityContext::AUTHENTICATION_ERROR);
        } else {
            $error = $request->getSession()->get(SecurityContext::AUTHENTICATION_ERROR);
        }

        return array(
            'last_username' => $request->getSession()->get(SecurityContext::LAST_USERNAME),
            'error' => $error,
        );
    }

    /**
     * @Route("/login_check", name="_login_check")
     * @Template()
     */
    public function loginCheck(Request $request) {
        // The security layer will intercept this request
    }

    /**
     * @Route("/logout", name="_logout")
     */
    public function logoutAction() {
        // The security layer will intercept this request
    }

    /**
     * @Route("/register", name="_register")
     * @Template()
     */
    public function registerAction() {

        $form_client = $this->createForm(new LoginClientType(), new Client(), array(
            'action' => $this->generateUrl('_register_client'),
            'method' => 'post'));

        $form_company = $this->createForm(new LoginCompanyType(), new Company(), array(
            'action' => $this->generateUrl('_register_company'),
            'method' => 'post'));

        return array(
            'form_client' => $form_client->createView(),
            'form_company' => $form_company->createView(),
        );
    }

    /**
     * @Route("/register/client", name="_register_client")
     * @Template()
     */
    public function registerClientAction(Request $request) {
        $client = new Client();
        $form = $this->createForm(new LoginClientType(), $client);
        $form->handleRequest($request);
        
        if ($request->getMethod() == 'POST') {

            if ($form->isValid()) {

                $factory = $this->get('security.encoder_factory');
                $encoder = $factory->getEncoder($client);
                $password = $encoder->encodePassword($client->getPassword(), $client->getSalt());

                $client->setPassword($password);
                $this->getDoctrine()->getRepository('SocialBundle:Client')->insert($client);

                return $this->redirect($this->generateUrl('_login_route'));
            }
        }
    }
    
    /**
     * @Route("/register/company", name="_register_company")
     * @Template()
     */
    public function registerCompanyAction(Request $request) {
        $company = new Company();
        $form = $this->createForm(new LoginCompanyType(), $company);
        $form->handleRequest($request);
        
        if ($request->getMethod() == 'POST') {

            if ($form->isValid()) {

                $factory = $this->get('security.encoder_factory');
                $encoder = $factory->getEncoder($company);
                $password = $encoder->encodePassword($company->getPassword(), $company->getSalt());

                $company->setPassword($password);
                $this->getDoctrine()->getRepository('SocialBundle:Company')->insert($company);

                return $this->redirect($this->generateUrl('_login_route'));
            }
        }
    }
}
