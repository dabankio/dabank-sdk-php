<?php

namespace dabank\sdk\api\model;

class SumTransferOptions {
  private $startAt;
  private $endAt;

  public function __construct($startAt, $endAt) {
    $this->startAt = $startAt;
    $this->endAt = $endAt;
  }

  public function getStartAt() {
    return $this->startAt;
  }

  public function getEndAt() {
    return $this->endAt;
  }
}
