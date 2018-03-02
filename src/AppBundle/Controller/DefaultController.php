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
        dump($session->get('identifier'));

        $em = $this->getDoctrine()->getManager();
        $employee = $em->getRepository('AppBundle:Employee')->findOneBy(array(
            'email' => $session->get('identifier'),
        ));

        // replace this example code with whatever you need
        return $this->render('planning/planning.html.twig', array(
            'employee' => $employee,
        ));
    }



}
