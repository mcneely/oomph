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

    public function getRoutes() {
       $response = $this->client->get('routes');
       $response = $response->getBody();
       $json = json_decode($response);

       $routes = [];
       foreach ($json->data as $route) {
           $routes[$route->attributes->description][] = $route;
       }

       return $routes;
    }
}