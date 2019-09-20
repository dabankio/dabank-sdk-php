<?php

namespace Bigbang\Api;

class Utils extends AbstractApi
{
    public function convertBCHAddress($address)
    {
        return $this->post('/bchAddrConvert', ['address' => $address]);
    }
}
