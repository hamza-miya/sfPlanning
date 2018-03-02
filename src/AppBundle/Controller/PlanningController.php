<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Employee;
use AppBundle\Entity\Event;
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

        /*if (isset($identifier)){
            $repository = $this->getDoctrine()->getRepository(Event::class);

            $query = $repository->createQueryBuilder('p')
                ->where('p.employee > :employee')
                ->andWhere('p.startDate ')
                ->setParameter('employee', $employee)
                ->getQuery();

            $products = $query->getResult();
        }*/

        if (isset($employee)){
            $ev = $employee->getEvents();
            dump($ev);
        } else $employee = null;

        return $this->render('planning/planning.html.twig', array(
            'employee' => $employee,
        ));
    }

    /**
     * @Route("/update", name="updateEvent")
     */
    public function updateAction(Request $request)
    {

    }



}
