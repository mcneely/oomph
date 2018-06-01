<?php
/**
 * Created by IntelliJ IDEA.
 * User: mcneely
 * Date: 6/1/18
 * Time: 10:37 AM
 */

namespace AppBundle\Service;


use GuzzleHttp\Client;

class HttpClient extends Client
{
    /**
     * HttpClient constructor.
     *
     * @param $baseUrl
     */
    public function __construct($baseUrl)
    {
        parent::__construct(
            [
                'base_uri' => $baseUrl,
            ]
        );
    }

    /**
     * @param       $uri
     * @param array $options
     * @return mixed
     */
    public function getJsonResponse($uri, $options = [])
    {
        $response = $this->get($uri, $options);
        $response = $response->getBody();

        return json_decode($response);
    }
}