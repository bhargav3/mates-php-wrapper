<?php

namespace MATES;

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

}