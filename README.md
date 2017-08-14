# mates-api
MATES API Parsing PHP Library


## Installation using composer

`composer require iyba/mates-api`


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
 
 $boats = $dmm->boats($filters);

 ```

## Get Complete MATES Response Object

### Format: XML

```php
$boats->getXML();
```

### Format: JSON

```php
$boats->getJSON();
```

### Format: PHP Object

```php
$boats->getObjects();
```


### Get Vessel PHP Objects

```php
$boats->getVesselObjects();
```