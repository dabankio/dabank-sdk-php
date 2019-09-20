<?php

namespace Bigbang\Api;

use Bigbang\Api\Model\ListTransferResult;
use Bigbang\Api\Model\ListTransfersRequest;
use Bigbang\Api\Model\PageInfo;
use Bigbang\Api\Model\SendTransferResult;
use Bigbang\Api\Model\SumTransferOptions;
use Bigbang\Common\Utils;

class Transfer extends AbstractApi
{

    /**
     * 发起一笔交易.
     * @param string $symbol
     * @param string $from
     * @param string $to
     * @param float $amount
     * @param string $uniqueID
     * @return SendTransferResult
     */
    public function send($symbol, $from, $to, $amount, $uniqueID)
    {
        $resp = $this->post('/transfer', [
            'symbol' => $symbol,
            'from' => $from,
            'to' => $to,
            'coins' => $amount,
            'unique_id' => $uniqueID
        ]);
        return SendTransferResult::create($resp);
    }

    /**
     * 分页查询待处理的交易
     * @param $symbol 币种
     * @param PageInfo $page 分页参数
     * @param ListTransferOptions|null $opts 附加查询条件
     * @return ListTransferResult
     */
    public function listPendingTransfers($symbol, PageInfo $page, ListTransferOptions $opts = null)
    {
        $resp = $this->post(
            '/transfers/pending',
            $this->makeListTransferParams($symbol, $page, $opts)
        );
        return ListTransferResult::create($resp);
    }

    /**
     * 分页查询已处理成功的交易
     * @param $symbol 币种
     * @param PageInfo $page 分页参数
     * @param ListTransferOptions|null $opts 附加查询条件
     * @return ListTransferResult
     */
    public function listSuccessTransfers($symbol, PageInfo $page, ListTransferOptions $opts = null)
    {
        $resp = $this->post(
            '/transfers/success',
            $this->makeListTransferParams($symbol, $page, $opts)
        );
        return ListTransferResult::create($resp);
    }

    protected function makeListTransferParams($symbol, PageInfo $page, ListTransferOptions $opts = null)
    {
        $params = [
            'symbol' => $symbol,
            'limit' => $page->getPageSize(),
            'p' => $page->getPageNo(),
        ];
        if ($opts != null) {
            $params['start_at'] = $opts->getStartAt();
            $params['end_at'] = $opts->getEndAt();
            $params['address'] = $opts->getAddress();
        }
        if (empty($params['transfer_type'])) {
            $params['transfer_type'] = 'ALL';
        }
        return $params;
    }

    /**
     * 查询应用的交易总额
     * @param $symbol 币种
     * @param $transferType 交易类型. IN: 入账; OUT: 转出.
     * @param SumTransferOptions|null $options
     * @return array|mixed
     */
    public function sum($symbol, $transferType, SumTransferOptions $options = null)
    {
        $params = [
            'symbol' => $symbol,
            'transfer_type' => $transferType
        ];
        if ($options != null) {
            $params['start_at'] = $options->getStartAt();
            $params['end_at'] = $options->getEndAt();
        }
        $resp = $this->post('/transfers/sum', $params);
        return Utils::tryGetValue($resp, 'sum', 0);
    }
}
