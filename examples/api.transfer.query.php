<?php

use Bigbang\Api\Model\ListTransfersRequest;
use Bigbang\Api\Model\PageInfo;

$client = require __DIR__ . '/init.php';

//////// list pending transfers
try {
    $res = $client->api('transfer')->listPendingTransfers('BTC', PageInfo::of(10, 1));
    print_r($res);
} catch (\Exception $e) {
    //http_response_code(500);
    print_r($e);
}

/////////////// list successful transfers
try {
    $res = $client->api('transfer')->listSuccessTransfers('BTC', PageInfo::of(10, 1));
    print_r($res);
} catch (\Exception $e) {
    //http_response_code(500);
    print_r($e);
}

//////////////// summarize

try {
    $res = $client->api('transfer')->sum('BTC', 'OUT');
    print_r($res);
} catch (\Exception $e) {
    //http_response_code(500);
    print_r($e);
}
