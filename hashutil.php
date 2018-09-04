<?php

require_once('./util.php');
require_once('./hexutil.php');

function generateHash() {
  $str = substr(base64_encode(sha1(mt_rand())), 0, 16);
  return hash('sha512/256', $str);
}

function hashByteArray($byteArray) {
  return hex2ByteArray(hash('sha512/256', byteArray2String($byteArray)));
}

function hashToHexString($byteArray) {
  return addPrefix(hash('sha512/256', byteArray2String($byteArray)));
}

function isEqual($hexString, $byteArray) {
  return strtolower($hexString) == hashToHexString($byteArray);
}

?>
