<?php

$client = require __DIR__ . '/init.php';

$resp = $client->api('app')->accounts();
if (!$resp->isSuccess()) {
  echo $resp->errInfo() . "\n";
  return;
}

print_r($resp->getData());

