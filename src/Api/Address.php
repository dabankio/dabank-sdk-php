<?php

namespace Bigbang\Api;

use Bigbang\Api\Model\CheckAddressResult;
use Bigbang\Common\Utils;

class Address extends AbstractApi
{

    /**
     * 申请新地址
     * @param $symbol 币种
     * @param $userId 地址所属用户的id
     * @return string 地址
     */
    public function newAddress($symbol, $userId)
    {
        $resp = $this->post("/address", [
            "symbol" => $symbol,
            "user_id" => $userId,
        ]);
        return Utils::tryGetValue($resp, 'address');
    }

    /**
     * 校验指定地址
     * @param $symbol 币种
     * @param $address 要校验的地址
     * @return CheckAddressResult
     */
    public function checkAddress($symbol, $address)
    {
        $resp = $this->post("/checkAddress", [
            "symbol" => $symbol,
            "address" => $address,
        ]);
        return CheckAddressResult::create($resp);
    }
}
