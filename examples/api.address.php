<?php

$client = require __DIR__ . '/init.php';

///////// new address
$resp = $client->api('address')->newAddress('BTC', uniqid('sdk_test_'));
if (!$resp->isSuccess()) {
    echo $resp->errInfo() . "\n";
    return;
}

echo 'address = ' . $resp->getData()['address'] . "\n";

////////// check address
$resp = $client->api('address')->checkAddress('BTC', $resp->getData()['address']);
if (!$resp->isSuccess()) {
    echo $resp->errInfo() . "\n";
}

print_r($resp->getData());
