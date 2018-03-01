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
        // replace this example code with whatever you need
        return $this->render('planning/planning.html.twig', []);
    }
}
