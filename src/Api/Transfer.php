<?php

namespace Bigbang\Api;

use Bigbang\Api\Model\ListTransferResult;
use Bigbang\Api\Model\ListTransfersRequest;
use Bigbang\Api\Model\PageInfo;
use Bigbang\Api\Model\SendTransferResult;
use Bigbang\Api\Model\SumTransferOptions;

class Transfer extends AbstractApi
{

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

    public function listPendingTransfers($symbol, PageInfo $page, ListTransferOptions $opts = null)
    {
        $resp = $this->post(
            '/transfers/pending',
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

    public function listSuccessTransfers($symbol, PageInfo $page, ListTransferOptions $opts = null)
    {
        $resp = $this->post(
            '/transfers/success',
            $this->makeListTransferParams($symbol, $page, $opts)
        );
        return ListTransferResult::create($resp);
    }

    public function sum($symbol, $transferType, SumTransferOptions $options = null)
    {
        $params = [
            'symbol' => $symbol,
            'transfer_type' => $transferType
        ];
        if ($options != null) {
            $params['start_at'] = $options->getStartAt();
            $params['end_at'] = $options->getEndAt();
            $params['transfer_type'] = $options->getTransferType();
        }
        return $this->post('/transfers/sum', $params);
    }
}
