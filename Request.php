<?php

require 'vendor/autoload.php';

use GuzzleHttp\Client;

/**
 * @description Request to send sms using Guzzle
 *
 * @author Karim Mostafa <Karim.Mostafa@e7gezly.com>
 *
 * @copyright (c) 2015, E7gezly
 */
Class Request
{

    /**
     * store BaseURL API to Call
     *
     * @var string
     */
    private $base_uri;

    /**
     * store ClientRequest object from class client Guzzle
     *
     * @var string
     */
    private $client_request;

    /**
     * @description return base url when take obj from class Bsms
     * @author Karim Mostafa <karim.Mostafa@e7gezly.com>
     *
     * @param string $url
     * @access public
     *
     */
    public function __construct($uri = null)
    {

        if ($uri !== null) {
            $this->base_uri = $uri;
            $this->client_request = new GuzzleHttp\Client(['base_uri' => $this->base_uri]);
        }

    }


    /**
     * @description send request from to service SMS
     * @author Karim Mostafa <karim.Mostafa@e7gezly.com>
     *
     * @param string $method [POST, 'GET', 'PUT' or 'DELETE']
     * @param array $params
     * @param string $headers
     * @return array
     * @access public
     *
     */
    public function SendRequest($params, $method = 'POST', $headers = null)
    {
        try {
            $response = $this->client_request->request($method, $this->base_uri,
                [
                    'headers' => [
                        'Authorization'     => 'Basic '.base64_encode($params['user_name'].':'.$params['password'].':'.$params['account_id']),
                        'Content-Type' => 'application/json'
                    ],
                    'json' => [
                        'account_id' => $params['account_id'],
                        'text' => $params['text'],
                        'msisdn' => $params['recipient'],
                        'sender' => $params['sender']
                    ]
                ])->getBody()->getContents();

            return $response;

        } catch (Exception $e) {
            return $e->getMessage();

        }
    }
}

?>
