<?php
namespace dabank\sdk\api;

class Transfer extends AbstractApi {

  public function send($symbol, $to, $amount, $uniqueID) {
    return $this->post('', [
      'symbol' => $symbol,
      'to' => $to,
      'coins' => '$amount',
      'uniqueID' => $uniqueID
    ]);
  }
}
