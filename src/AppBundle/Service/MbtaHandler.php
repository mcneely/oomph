<?php
/**
 * Created by IntelliJ IDEA.
 * User: mcneely
 * Date: 6/1/18
 * Time: 10:28 AM
 */

namespace AppBundle\Service;


class MbtaHandler
{
    /** @var \GuzzleHttp\Client $client */
    protected $client;

    /**
     * MbtaHandler constructor.
     *
     * @param \GuzzleHttp\Client $client
     */
    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }

    public function getRoutes()
    {
        $json = $this->client->getJsonResponse('routes');
        $routes = [];
        foreach ($json->data as $route) {
            $routes[$route->attributes->description][] = $route;
        }

        return $routes;
    }

    public function getSchedule($routeId)
    {
        $json = $this->client->getJsonResponse('schedules', [
            'query' => [
            'filter' => [
                'route' => $routeId,
                'stop_sequence' => 'first, last'
            ],
            'sort' => 'arrival_time'
            ]
        ]);

        return $json->data;
    }


}