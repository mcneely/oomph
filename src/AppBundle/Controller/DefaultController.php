<?php

namespace AppBundle\Controller;

use AppBundle\Service\MbtaHandler;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param \AppBundle\Service\MbtaHandler            $handler
     * @template()
     * @return array
     */
    public function indexAction(Request $request, MbtaHandler $handler)
    {
         $routes = $handler->getRoutes();
        // replace this example code with whatever you need
        return [
            'routes' => $routes,
        ];
    }
}
