<?php
namespace Bigbang\Api;
use Bigbang\Api\Model\TransferResult;
use Bigbang\Api\Model\ListTransfersRequest;
use Bigbang\Api\Model\PageInfo;
use Bigbang\Api\Model\SumTransferOptions;

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

  public function listPendingTransfers($symbol, PageInfo $page, ListTransferOptions $opts = null) {
    return $this->post(
      '/transfers/pending',
      $this->makeListTransferParams($symbol, $page, $opts)
    );
  }

  public function listSuccessTransfers($symbol, PageInfo $page, ListTransferOptions $opts = null) {
    return $this->post(
      '/transfers/success',
      $this->makeListTransferParams($symbol, $page, $opts)
    );
  }

  protected function makeListTransferParams($symbol, PageInfo $page, ListTransferOptions $opts = null) {
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
    if (!isset($params['transfer_type'])) {
      $params['transfer_type'] = 'ALL';
    }
    return $params;
  }

  public function sum($symbol, $transferType, SumTransferOptions $options = null) {
    $params = [
      'symbol' => $symbol,
      'transfer_type' => $transferType,
    ];
    if ($options != null) {
      $params['start_at'] = $options.getStartAt();
      $params['end_at'] = $options.getEndAt();
    }
    return $this->post('/transfers/sum', $params);
  }
}
