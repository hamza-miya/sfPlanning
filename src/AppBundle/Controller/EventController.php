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

class EventController extends Controller
{
    /**
     * @Route("/event/edit", name="editEvent")
     * @Method("POST")
     */
    public function editAction(Request $request){
        $startDate = $request->get('updateTime');
        $idEvent = $request->get('id');

        $em = $this->getDoctrine()->getManager();
        $event = $em->getRepository('AppBundle:Event')->findOneBy(array(
            'id' => $idEvent,
        ));

        $event->setStartDate($startDate);
        $em->flush();

    }

}