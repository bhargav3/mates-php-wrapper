<?php

namespace MATES;

use GuzzleHttp\Client;
use Laravie\Parser\Xml\Reader;
use Laravie\Parser\Xml\Document;

/**
 * API wrapper for DMM - Bridge API
 *
 * Class DMMBridgeAPI
 */
class DMMBridgeAPI extends MATES
{

    protected $data;

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

    /**
     * Returns JSON String
     * @return mixed
     */
    public function getJSON()
    {
        $document = new Document();
        $reader = new Reader($document);
        return json_encode($reader->extract($this->data)->getContent());
    }

    /**
     * Returns XML String
     * @return mixed
     */
    public function getXML()
    {
        return $this->data;
    }

    public function getObjects()
    {
        $document = new Document();
        $reader = new Reader($document);
        return $reader->extract($this->data)->getContent();
    }
}