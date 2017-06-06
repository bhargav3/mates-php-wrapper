<?php

require __DIR__ . '/vendor/autoload.php';

use MATES\DMMBridgeAPI;

$api_key = 'a246efff-869c-4080-9327-d54b9e73fa2f';

$filters = [
    "start" => "0",
    "rows" => "1"
];

$api = new DMMBridgeAPI($api_key);

echo json_encode($api->boats($filters)->getJSON());