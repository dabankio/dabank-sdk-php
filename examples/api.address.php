<?php

$client = require __DIR__ . '/init.php';

///////// new address
try {
    $res = $client->api('address')->newAddress('BTC', uniqid('sdk_test_'));
    $addr = $res;
    echo 'address = ' . $addr . "\n";
} catch (\Exception $e) {
    http_response_code(500);
    print_r($e);
    return;
}

////////// check address
try {
    $res = $client->api('address')->checkAddress('BTC', $addr);
    print_r($res);
} catch (\Exception $e) {
    http_response_code(500);
    print_r($e);
    return;
}