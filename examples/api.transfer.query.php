<?php

$client = require __DIR__ . '/init.php';

$res = $client->api('address')->newAddress('BTC', uniqid('sdk_test_'));

if (!$res.isSuccess()) {
  echo $res.errInfo();
  return;
}

echo $res->getData()['address'];

