<?php
namespace dabank\sdk\api;
use dabank\sdk\api\model\TransferResult;

class Transfer extends AbstractApi {

  public function send($symbol, $from, $to, $amount, $uniqueID) {
    return $this->post('/transfer', [
      'symbol' => $symbol,
      'from' => $from,
      'to' => $to,
      'coins' => $amount,
      'unique_id' => $uniqueID
    ]);
  }
}
