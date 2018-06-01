<?php

namespace AppBundle\Controller;

use AppBundle\Service\MbtaHandler;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     * @param \AppBundle\Service\MbtaHandler            $handler
     * @template()
     * @return array
     */
    public function indexAction(MbtaHandler $handler)
    {
         $routes = $handler->getRoutes();

        return [
            'routes' => $routes,
        ];
    }
    /**
     * @Route("/route/{routeId}", name="route")
     * @param \AppBundle\Service\MbtaHandler $handler
     * @param                                $routeId
     * @return array
     * @template()
     */
    public function routeAction(MbtaHandler $handler, $routeId)
    {
        $schedule = $handler->getSchedule($routeId);

        return [
            'schedule' => $schedule,
        ];
    }

}
