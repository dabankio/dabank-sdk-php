<?php

namespace Bigbang\Api;

use Bigbang\Api\Model\GetAccountsResult;
use Bigbang\Api\Model\StatsResult;

class App extends AbstractApi
{

    /**
     * 查询应用的账户信息. 返回每一个地址的余额信息.
     * @return GetAccountsResult
     */
    public function accounts()
    {
        $resp = $this->post("appAccount", []);
        return GetAccountsResult::create($resp);
    }

    /**
     * 应用对账. 返回交易统计及余额信息.
     * @param int $startAt
     * @param int $endAt
     * @return StatsResult
     */
    public function stats($startAt, $endAt) {
        $resp = $this->post("/reconciliation", [
            'start_time' => $startAt,
            'end_time' => $endAt
        ]);
        return StatsResult::create($resp);
    }
}
