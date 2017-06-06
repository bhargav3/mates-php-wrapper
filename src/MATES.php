<?php

namespace MATES;

use Laravie\Parser\Xml\Reader;
use Laravie\Parser\Xml\Document;

/**
 * MATES API base class
 *
 * (C) 2017 International Yacht Brokers Association
 */
class MATES
{
    /**
     * API key for authentication
     *
     * @var string
     */
    protected $api_key = '';

    /**
     * Additional parameters for authentication
     *
     * @var array
     */
    protected $auth_params = [];

    /**
     * Endpoint URL that we need to call for data which includes API key and additional authentication parameters
     *
     * @var string
     */
    protected $endpoint = '';

    /**
     * MATES XML string
     *
     * @var string
     */
    protected $data;

    /**
     * MATES constructor.
     * @param $api_key
     * @param $method
     * @param $parameters
     */
    function __construct($api_key, $method = 'GET', $parameters = [])
    {
        $this->api_key = $api_key;
        $this->method = $method;
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

    /**
     * @return mixed
     */
    public function getObjects()
    {
        $document = new Document();
        $reader = new Reader($document);
        return $reader->extract($this->data)->getContent();
    }

    public function getVesselObjects()
    {
        return $this->getObjects()->VehicleRemarketing;
    }

}