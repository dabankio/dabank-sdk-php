<?php

namespace Bigbang\Api;

use Bigbang\Api\Model\CheckAddressResult;

class Address extends AbstractApi
{

    public function newAddress($symbol, $userId)
    {
        $resp = $this->post("/address", [
            "symbol" => $symbol,
            "user_id" => $userId,
        ]);
        return $resp;
    }

    public function checkAddress($symbol, $address)
    {
        $resp = $this->post("/checkAddress", [
            "symbol" => $symbol,
            "address" => $address,
        ]);
        return CheckAddressResult::create($resp);
    }
}
