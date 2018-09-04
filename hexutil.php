<?php

include './util.php';

function encodeString($string) {
  return strtolower(addLeader(string2Hex($string)));
}

function decodeString($hexString) {
  $string = stripLeader($hexString);
  return hex2ByteArray($string);
}

function encodeToString ($buf) {
  return strtolower(addLeader(byteArray2Hex($buf)));
}

function encodeBytes($src) {
  return hex2ByteArray(byteArray2Hex($src));
}

function decodeBytes($src) {
  return hex2ByteArray(byteArray2String($src));
}

function encodeBigInt($i) {
  //return strtolower(addLeader(i.toString('hex')))
}

function decodeBigInt($hexString) {
  //return new BN(stripLeader(hexStr), 'hex')
}

function stripLeader($hexString) {
  return preg_replace("/^0x/", '', $hexString);
}

function addLeader($string) {
  return '0x'.stripLeader($string);
}

?>
