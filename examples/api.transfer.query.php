<?php

use Bigbang\api\model\ListTransfersRequest;
use Bigbang\api\model\PageInfo;

$client = require __DIR__ . '/init.php';

//////// list pending transfers
$resp = $client->api('transfer')->listPendingTransfers('BTC', 'OUT', PageInfo::of(10, 1));

if (!$resp->isSuccess()) {
  echo $resp->errInfo();
  return;
}

print_r($resp->getData());

/////////////// list successful transfers
$req = new ListTransfersRequest();
$req->setTransferType('OUT');
$req->setSymbol('BTC');

$resp = $client->api('transfer')->listSuccessTransfers('BTC', 'OUT', PageInfo::of(10, 1));

if (!$resp->isSuccess()) {
  echo $resp->errInfo();
  return;
}

print_r($resp->getData());

//////////////// summarize

$resp = $client->api('transfer')->sum('BTC', 'OUT');

if (!$resp->isSuccess()) {
  echo $resp->errInfo();
  return;
}

print_r($resp->getData());
