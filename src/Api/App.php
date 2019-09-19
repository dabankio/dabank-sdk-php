<?php

namespace Bigbang\Api;

use Bigbang\Api\Model\GetAccountsResult;

class App extends AbstractApi
{

    public function accounts()
    {
        $resp = $this->post("appAccount", []);
        return GetAccountsResult::create($resp);
    }
}
