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
    string $pubKey,
    Requester $requester = null
  ) {
    $this->baseUrl = $baseUrl;
    $this->apiVersion = $apiVersion;
    $this->secretKey = $secretKey;
    $this->privKey = $privKey;
    $this->pubKey = $pubKey;

    $this->signer = new crypto\rsa\RSASigner($this->privKey);
    $this->requester = $requester === null ? new CurlRequester($baseUrl) : $requester;
  }

  public function api($name) {
    switch($name) {
      case 'transfer':
        $api = new api\Transfer($this);
        break;
      case 'address':
        $api = new api\Address($this);
        break;
      case 'debug':
        $api = new api\Debug($this);
        break;
      default:
    }
    return $api;
  }

  public function __call($name, $arguments) {
    return $this->api($name);
  }


  public function getTimestamp() {
    return time();
  }

  public function getSecretKey() {
    return $this->secretKey;
  }

  public function getRequester() {
    return $this->requester;
  }

  public function sign(array $message) {
    return $this->signer->sign($message);
  }
}
