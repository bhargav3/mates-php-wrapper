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

    protected $query;

    /**
     * @param $method
     * @param $parameters
     * @return $this
     * @method mixed boats() boats($filters) Makes call to boats endpoint
     */
    public function __call($method, $parameters)
    {
        $this->method = $method;
        $this->query = urldecode(http_build_query($parameters[0]));
        $this->endpoint = 'https://services.boatwizard.com/bridge/events/' . $this->api_key . '/';
        $client = new Client(['base_uri' => $this->endpoint,
            'defaults' => [
                'headers' => [
                    'Content-Type' => 'text/xml'
                ]
            ]
        ]);
        $data = $client->request('GET', $this->method . '?' . $this->query);
        $this->data = $data->getBody();
        return $this;
    }

    public function getEndpointURI()
    {
        return $this->endpoint . $this->method . '?' . $this->query;
    }
}