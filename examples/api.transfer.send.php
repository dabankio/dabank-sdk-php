<?php

$client = require __DIR__ . '/init.php';

$resp = $client->api('transfer')->send(
  'BTC',
  '2MyQ9BWaxh3bBBNEkeJxJ2Z4qWXwrafyTT3',
  '2MvGiGqEswQDytscPPhLztAHJaVpqRxgFuM',
  0.002,
  uniqid()
);

if (!$resp->isSuccess()) {
  echo $resp->errInfo() . "\n";
  return;
}

print_r($resp->getData());

