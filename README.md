# c3-sdk-php

> The [C3](https://github.com/c3systems/c3-go) SDK for PHP

This SDK can be used for WordPress.

## Usage

Here's a hello world example

```php
require_once('./index.php');
require_once('./util.php');

$client = new Client;

class App {
  function setItem($key, $value) {
    global $client;
    $client->state()->set(string2ByteArray($key), string2ByteArray($value));
  }

  function getItem($key) {
    global $client;
    $result = $client->state()->get(string2ByteArray($key));
    return byteArray2String($result['value']);
  }
}

$app = new App;
$client->registerMethod('setItem', ['string', 'string'], array($app, 'setItem'));
$client->registerMethod('getItem', ['string'], array($app, 'getItem'));
$client->serve();
```

## Test

```bash
make test
```

## License

[GNU AGPL 3.0](LICENSE)
