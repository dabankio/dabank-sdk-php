<?php

$client = require __DIR__ . '/init.php';

///////// hello
try {
    $res = $client->api('utils')->convertBCHAddress('xxxxxx');
    print_r($res);
} catch (\Exception $e) {
    http_response_code(500);
    print_r($e);
    return;
}
