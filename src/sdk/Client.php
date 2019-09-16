<?php

namespace dabank\sdk;

class Client {

  private $baseUrl;
  private $apiVersion;
  private $secretKey;
  // 私钥
  private $privKey;
  // 公钥
  private $pubKey;

  private $signer;

  private $verifier;

  public function __construct(
    string $baseUrl,
    string $apiVersion,
    string $secretKey,
    string $privKey,
    string $pubKey
  ) {
    $this->baseUrl = $baseUrl;
    $this->apiVersion = $apiVersion;
    $this->secretKey = $secretKey;
    $this->privKey = $privKey;
    $this->pubKey = $pubKey;

    $this->signer = new crypto\rsa\RSASigner($this->privKey);
  }

  public function api($name) {
    switch($name) {
      case 'transfer':
        $api = new api\Transfer($this);
        break;
      default:

    }
    return $api;
  }

  public function __call($name, $arguments) {
    return $this->api($name);
  }

  public function createJsonBody(array $params = []) {
    $defaultParams = [
      'key' => $this->secretKey,
      'request_time' => $this->getTimestamp(),
    ];
    $realParams = array_merge($params, $defaultParams);
    $realParams['sign'] = $this->signer->sign($realParams);
    return $realParams;
  }

  public function getTimestamp() {
    return time();
  }
}
