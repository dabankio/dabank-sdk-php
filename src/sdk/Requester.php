<?php

namespace dabank\sdk;

class Requester {

  private $callBack;
  private $gateWay;

  public function __construct(
    callable $callBack,
    $gateWay
  ) {
    $this->callBack = $callBack;
    $this->gateWay = rtrim($gateWay, '/') . '/';
  }

  public function getUrl($path) {
    return $this->gateWay . ltrim($path, '/');
  }

  public function execute($path, $params) {
    return call_user_func($this->callBack, $this->getUrl($path), $params);
  }
}
