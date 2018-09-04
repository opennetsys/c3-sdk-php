<?php

require_once('./util.php');

function encodeString($string) {
  return strtolower(addPrefix(string2Hex($string)));
}

function decodeString($hexString) {
  $string = stripPrefix($hexString);
  return hex2ByteArray($string);
}

function encodeToString ($buf) {
  return strtolower(addPrefix(byteArray2Hex($buf)));
}

function encodeBytes($src) {
  return hex2ByteArray(byteArray2Hex($src));
}

function decodeBytes($src) {
  return hex2ByteArray(byteArray2String($src));
}

function encodeBigInt($bn) {
  return strtolower(addPrefix($bn->toBase(16)));
}

function decodeBigInt($hexString) {
  return BN(stripPrefix($hexString), 'hex');
}

function stripPrefix($hexString) {
  return preg_replace("/^0x/", '', $hexString);
}

function addPrefix($string) {
  return '0x'.stripPrefix($string);
}

?>
