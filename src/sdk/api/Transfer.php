<?php
namespace dabank\sdk\api;
use dabank\sdk\api\model\TransferResult;
use dabank\sdk\api\model\ListTransfersRequest;
use dabank\sdk\api\model\PageInfo;
use dabank\sdk\api\model\SumTransferOptions;

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

  public function listPendingTransfers($symbol, $transferType, PageInfo $page, ListTransferOptions $opts = null) {
    return $this->post(
      '/transfers/pending',
      $this->makeListTransferParams($symbol, $transferType, $page, $opts)
    );
  }

  public function listSuccessTransfers($symbol, $transferType, PageInfo $page, ListTransferOptions $opts = null) {
    return $this->post(
      '/transfers/success',
      $this->makeListTransferParams($symbol, $transferType, $page, $opts)
    );
  }

  protected function makeListTransferParams($symbol, $transferType, PageInfo $page, ListTransferOptions $opts = null) {
    $params = [
      'symbol' => $symbol,
      'transfer_type' => $transferType,
      'limit' => $page->getPageSize(),
      'p' => $page->getPageNo(),
    ];
    if ($opts != null) {
      $params['start_at'] = $opts->getStartAt();
      $params['end_at'] = $opts->getEndAt();
      $params['address'] = $opts->getAddress();
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
