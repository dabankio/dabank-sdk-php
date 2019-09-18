<?php

$client = require __DIR__ . '/init.php';

$resp = $client->api('transfer')->send(
  'BTC',
  '2NDymPgvGhvut7moBdrAUWobvgAkaQkN1yp',
  '2MuYbwALdZtaLvoWuPAg787BPKdXu5F99ZQ',
  0.001,
  uniqid()
);

if (!$resp->isSuccess()) {
  echo $resp->errInfo() . "\n";
  return;
}

echo 'transfer status = ' . $res->getData()['status'] . "\n" . 'transfer id = ' . $res->getData()['transferID'] . "\n";

