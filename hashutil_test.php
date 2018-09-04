<?php

require_once('./hashutil.php');

assert(strlen(generateHash()) == 64);
assert(hashByteArray(string2ByteArray('hello world')) == hex2ByteArray('0ac561fac838104e3f2e4ad107b4bee3e938bf15f2b15f009ccccd61a913f017'));

assert(hashToHexString(string2ByteArray('hello world')) == '0x0ac561fac838104e3f2e4ad107b4bee3e938bf15f2b15f009ccccd61a913f017');
assert(isEqual('0x1234', string2ByteArray('foo')) == false);
assert(isEqual('0x0ac561fac838104e3f2e4ad107b4bee3e938bf15f2b15f009ccccd61a913f017', string2ByteArray('hello world')) == true);

?>
