<?php

namespace dabank\sdk\api;

class AbstractApi {

  private $client;

  public function __construct($client) {
    $this->client = $client;
  }

  protected function post($path, array $params = [], array $requestHeaders = []) {
    // 签名
    return $this->client->createJsonBody($params);
  }

  protected function postRaw($path, $body, array $requestHeaders = []) {

  }
}
