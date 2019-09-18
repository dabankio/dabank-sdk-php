<?php

namespace Bigbang\Api\Model;

class ListTransfersRequest {
  private $transferType;
  private $symbol;
  private $startAt;
  private $endAt;
  private $address;
  private $status;

  public function getTransferType() {
    return $this->transferType;
  }

  public function setTransferType($transferType) {
    return $this->transferType = $transferType;
  }

  public function getSymbol() {
    return $this->symbol;
  }

  public function setSymbol($symbol) {
    $this->symbol = $symbol;
  }

  public function getStartAt() {
    return $this->startAt;
  }

  public function setStartAt($startAt) {
    $this->startAt = $startAt;
  }

  public function getEndAt() {
    return $this->endAt;
  }

  public function setEndAt($endAt) {
    $this->endAt = $endAt;
  }

  public function getAddress() {
    return $this->address;
  }

  public function setAddress($address) {
    return $this->address = $address;
  }

  public function getStatus() {
    return $this->status;
  }

  public function setStatus($status) {
    $this->status = $status;
  }
}
