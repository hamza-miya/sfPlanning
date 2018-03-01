<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $session = $request->getSession();

        dump($session->get('email'));

        /*$em = $this->getDoctrine()->getManager();
        $employee = $em->getRepository('AppBundle:Employee')->findOneBy(array(
            'email' => $email,
            'password' => $password,
        ));


        return $this->redirectToRoute('planning', array(
            'employee' => $employee
        ));*/

        return $this->render('default/index.html.twig');

    }



}
