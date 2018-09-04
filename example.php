<?php

require_once('./index.php');
require_once('./util.php');

class App {
  public $client;

  function __construct() {
    $this->client = new Client;
  }

  function setItem($key, $value) {
    $this->client->state()->set(string2ByteArray($key), string2ByteArray($value));
  }

  function getItem($key) {
    $result = $this->client->state()->get(string2ByteArray($key));
    return byteArray2String($result['value']);
  }
}

$app = new App;
$app->client->registerMethod('setItem', ['string', 'string'], array($app, 'setItem'));
$app->client->registerMethod('getItem', ['string'], array($app, 'getItem'));
$app->client->serve();

?>
