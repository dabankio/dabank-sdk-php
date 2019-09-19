<?php

$client = require __DIR__ . '/init.php';

try {
    $res = $client->api('app')->accounts();
    print_r($res);
} catch (\Exception $e) {
    http_response_code(500);
    print_r($e);
}
