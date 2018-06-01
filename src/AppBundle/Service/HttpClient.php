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
}