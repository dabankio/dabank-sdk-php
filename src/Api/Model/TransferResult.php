<?php

namespace Bigbang\Api\Model;

class TransferResult extends ApiResult {

  private $status;
  private $transferId;

  public function __construct($data) {
    parent::__construct($data);
    $this->status = $this->getData()['status'];
    $this->transferId = $this->getData()['transfer_id'];
  }

  public function getTransferId() {
    return $this->transferId;
  }
}
