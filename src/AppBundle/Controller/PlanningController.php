<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class PlanningController extends Controller
{
    /**
     * @Route("/planning", name="planning")
     */
    public function planningAction(Request $request)
    {
        $identifier = $request->get('identifier');

        $em = $this->getDoctrine()->getManager();
        $employee = $em->getRepository('AppBundle:Employee')->findOneBy(array(
            'email' => $identifier,
        ));
        if (isset($employee)){
            $ev = $employee->getEvents();
            dump($ev);
        } else $employee = null;

        return $this->render('planning/planning.html.twig', array(
            'employee' => $employee,
        ));
    }
}
