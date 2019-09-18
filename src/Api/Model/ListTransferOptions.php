<?php

namespace Bigbang\Api\Model;

class ListTransferOptions {
  private $startAt;
  private $endAt;
  private $address;
  private $status;

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
}
