<?php
namespace dabank\sdk\api;
use dabank\sdk\api\model\TransferResult;
use dabank\sdk\api\model\ListTransfersRequest;

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

  public function listPendingTransfers(ListTransfersRequest $req) {
    return $this->post('/transfers/pending', [
      'symbol' => $req->getSymbol(),
      'transfer_type' => $req->getTransferType(),
      'start_at' => $req->getStartAt(),
      'end_at' => $req->getEndAt(),
      'limit' => $req->getLimit(),
      'p' => $req->getPageNo(),
      'address' => $req->getAddress()
    ]);
  }

  public function listSuccessTransfers(ListTransfersRequest $req) {
    return $this->post('/transfers/success', [
      'symbol' => $req->getSymbol(),
      'transfer_type' => $req->getTransferType(),
      'start_at' => $req->getStartAt(),
      'end_at' => $req->getEndAt(),
      'limit' => $req->getLimit(),
      'p' => $req->getPageNo(),
      'address' => $req->getAddress()
    ]);
  }
}
