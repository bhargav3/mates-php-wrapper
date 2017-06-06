<?php

namespace MATES;

use GuzzleHttp\Client;


/**
 * API wrapper for DMM - Bridge API
 *
 * Class DMMBridgeAPI
 */
class DMMBridgeAPI extends MATES
{

    public function __call($method, $parameters)
    {
        $this->method = $method;
        $query = urldecode(http_build_query($parameters[0]));
        $endpoint = 'https://services.boatwizard.com/bridge/events/' . $this->api_key . '/';
        $client = new Client(['base_uri' => $endpoint]);
        $data = $client->request('GET', $this->method . '?' . $query);
        $this->data = $data->getBody();
        return $this;
    }
}