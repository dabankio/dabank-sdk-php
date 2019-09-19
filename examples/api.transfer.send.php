<?php

$client = require __DIR__ . '/init.php';

try {
    $res = $client->api('transfer')->send(
        'BTC',
        '2MyQ9BWaxh3bBBNEkeJxJ2Z4qWXwrafyTT3',
        '2MvGiGqEswQDytscPPhLztAHJaVpqRxgFuM',
        0.002,
        uniqid()
    );
    print_r($res);
} catch (\Exception $e) {
    http_response_code(500);
    print_r($e);
}
