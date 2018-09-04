<?php

include './util.php';

$byteArray = unpack('C*', 'hello');
assert(string2ByteArray('hello') == $byteArray);
assert(byteArray2String($byteArray) == 'hello');

assert(byteArray2Hex($byteArray) == '68656c6c6f');
assert(hex2ByteArray('68656c6c6f') == $byteArray);

assert(string2Hex('hello') == '68656c6c6f');
assert(hex2String('68656c6c6f') == 'hello');

?>
