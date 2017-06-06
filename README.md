# mates-api
MATES API Parsing PHP Library


## Initializing API
 
 
 ```php
 
 $dmm = new DMMBridgeAPI($api_key);
 
 $filters = [
    'status' => '',
    'soldSince'=>'2011-11-01T00:00:00Z',
    'modifiedSince' => '2011-11-01T00:00:00Z',
    'start' => 0,
    'rows' => 10,
    'owner' => '1234,1235,1236'
 ];
 
 $dmm->boats($filters);

 ```
