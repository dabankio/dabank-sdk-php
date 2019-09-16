<?php

namespace dabank\sdk\request;

class Transfer extends AbstractRequest {

  protected $resourcePath = '/transfer';

  private $symbol;
  private $to;
  private $amount;
  private $uniqueID;

  public function setSymbol($symbol) {
    $this->symbol = $symbol;
    $this->apiParams['symbol'] = $symbol;
  }

  public function setTo($to) {
    $this->to = $to;
    $this->apiParams['to'] = $to;
  }

  public function setAmount($amount) {
    $this->amount = $amount;
    $this->apiParams['coins'] = '$amount';
  }

  public function setUniqueID($uniqueID) {
    $this->uniqueID = $uniqueID;
    $this->apiParams['uniqueID'] = $uniqueID;
  }
}
