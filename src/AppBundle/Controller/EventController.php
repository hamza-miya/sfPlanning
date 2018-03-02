<?php
/**
 * Created by PhpStorm.
 * User: miya
 * Date: 02/03/2018
 * Time: 13:49
 */

namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class EventController extends Controller
{
    /**
     * @Route("/event/edit", name="editEvent")
     * @Method("POST")
     */
    public function editAction(Request $request)
    {
        $day = $request->get('day');
        $month = $request->get('month');
        $year = $request->get('year');
        $hour = $request->get('hour');
        $idEvent = $request->get('id');

        $startDate = new \DateTime();
        $startDate->setDate($year, $month, $day);
        $startDate->setTime($hour, 0, 0);


        $em = $this->getDoctrine()->getManager();
        $event = $em->getRepository('AppBundle:Event')->findOneBy(array(
            'id' => $idEvent,
        ));


        $event->setStartDate($startDate);
        $em->flush();

        return new Response("OK", Response::HTTP_OK);

    }

}