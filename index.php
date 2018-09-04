<?php

error_reporting(E_ALL);

// Allow the script to hang around waiting for connections
set_time_limit(0);

// Turn on implicit output flushing to we see wha
// we're receiving as it comes in
ob_implicit_flush();

$store = (object)[];

class State {
  function set($key, $value) {
    //$store[key.toString('hex')] = value.toString('hex')
    //writeFile($sdk->statefile, toJSONS($store))
  }

  function get($key) {
    //$v = $store[$key.toString('hex')]
    //$found = ($v !== undefined)
    //$value = Buffer.from($v, 'hex')

    /*
    return {
      found: $found,
      value: $value
    }
     */
  }
}

$state = new State;

class Sdk {
  public $statefile = '/tmp/state.json';

  function setInitialState() {
    if (!file_exists($this->statefile)) {
      return;
    }

    $json = file_get_contents($this->statefile);
    if ($json != '') {
      $json = json_decode($json, true);

      foreach ($json as $key => $value) {
        $store[$key] = $value;
      }
    }

    //echo '<pre>'; print_r($store);
  }

  /*
  listen() {
    // TODO: on listen data, run
    this.processPayload(data);
  },

  processPayload($payload) {
    const args = JSON.parse(payload);
    this.invoke(args[0], args.slice(1));
  },

  invoke($methodName, $params) {
    $method = $registeredMethods[$methodName];
    if (!$method) {
      return;
    }

    $method(...params);
  }
  */
}


class Client {
    function __construct() {
      $sdk = new Sdk;
      $sdk->setInitialState();
      // TODO: run async
      // sdk.listen();
    }

    function serve() {
      $host = '0.0.0.0';
      $port = getenv('PORT');

      if ($port == '') {
        $port = 3330;
      }

      $socket = socket_create(AF_INET, SOCK_STREAM, 0) or die("Could not create socket\n");
      $result = socket_bind($socket, $host, $port) or die("Could not bind to socket\n");
      $result = socket_listen($socket, 3) or die("Could not set up socket listener\n");
      while(true) {
        $spawn = socket_accept($socket) or die("Could not accept incoming connection\n");
        $input = socket_read($spawn, 1024) or die("Could not read input\n");
        echo $input;
        //$output = $input . "\n";
        //socket_write($spawn, $output, strlen ($output)) or die("Could not write output\n");
        socket_close($spawn);
      }

    }
}

$client = new Client;

$client->serve();

?>
