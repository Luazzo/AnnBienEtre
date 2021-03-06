<?php

namespace AppBundle\Controller\FrontEnd;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function homePageAction() {
        $em = $this->getDoctrine()->getManager();

        $providers = $em->getRepository('AppBundle:Provider')->findAll();
        $promotions = $em->getRepository('AppBundle:Promotion')->findAll();
        $courses = $em->getRepository('AppBundle:Course')->findAll();
        $service_categories = $em->getRepository('AppBundle:ServiceCategory')->findAll();

        return $this->render('frontEnd/default/index.html.twig', array( 'providers' => $providers, 'promotions' => $promotions,
            'courses' => $courses, 'service_categories' => $service_categories));
    }

    public function sidebarAction()
    {
        $em=$this->getDoctrine()->getManager();
        $providers = $em->getRepository('AppBundle:Provider')->findAll();
        $courses = $em->getRepository('AppBundle:Course')->findAll();
        $service_categories = $em->getRepository('AppBundle:ServiceCategory')->findAll();

        return $this->render(':Partials:side.html.twig', array( 'providers' => $providers,
            'courses' => $courses, 'service_categories' => $service_categories));

    }


}
