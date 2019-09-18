<?php

$client = require __DIR__ . '/init.php';

$res = $client->api('address')->newAddress('BTC', uniqid('sdk_test_'));

if (!$res->isSuccess()) {
  echo $res.errInfo() . "\n";
  return;
}

echo 'address = ' . $res->getData()['address'] . "\n";

