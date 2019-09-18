<?php

namespace Bigbang\Api;

class Address extends AbstractApi {

  public function newAddress($symbol, $userId) {
    return $this->post("/address", [
      "symbol" => $symbol,
      "user_id" => $userId,
    ]);
  }

  public function checkAddress($symbol, $address) {
    return $this->post("/checkAddress", [
      "symbol" => $symbol,
      "address" => $address,
    ]);
  }
}
