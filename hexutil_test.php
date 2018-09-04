<?php

include './hexutil.php';

assert(encodeString('hello') == '0x68656c6c6f');
assert(encodeString('123') == '0x313233');
assert(decodeString('0x1234') == hex2ByteArray('1234'));
assert(decodeString('0x68656c6c6f') == unpack('C*', 'hello'));
assert(encodeToString(string2ByteArray('hello')), '0x68656c6c6f');
assert(encodeBytes(string2ByteArray('hello')), hex2ByteArray('68656c6c6f'));
assert(decodeBytes(string2ByteArray('68656c6c6f')), string2ByteArray('hello'));

//assert(encodeBigInt(bn(123)), '0x7b');
//assert(encodeBigInt(bn(53452345)), '0x32f9e39');
//assert(encodeBigInt(bn('7237005577332262213973186563042994240829374041602535253248099000494570602496')), '0x10000000000000000000000000000000000000000000002a646e18c953780000');
//assert(decodeBigInt('0x7B').toString('hex'), bn(123).toString('hex'));

assert(stripLeader('0x123') == '123');
assert(stripLeader('123') == '123');
assert(stripLeader('0x') == '');
assert(addLeader('123') == '0x123');
assert(addLeader('0x123') == '0x123');

?>
