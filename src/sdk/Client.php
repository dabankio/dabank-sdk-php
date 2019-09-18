<?php

namespace dabank\sdk;

class Client {

  private $gateway;
  private $apiVersion;
  private $appSecretKey;
  // 私钥
  private $appPrivKey;
  // 公钥
  private $dabankPubKey;

  private $signer;

  private $verifier;

  public function __construct(
    string $gateway,
    string $apiVersion,
    string $appSecretKey,
    string $appPrivKey,
    string $dabankPubKey,
    Requester $requester = null
  ) {
    $this->gateway = $gateway;
    $this->apiVersion = $apiVersion;
    $this->appSecretKey = $appSecretKey;
    $this->privKey = $appPrivKey;
    $this->dabankPubKey = $dabankPubKey;

    $this->signer = new crypto\rsa\RSASigner($this->privKey);
    $this->requester = $requester === null ? new CurlRequester($gateway) : $requester;
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
      case 'app':
        $api = new api\App($this);
        break;
      case 'utils':
        $api = new api\Utils($this);
        break;
      default:
        throw new \Exception('invalid api name');
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
    return $this->appSecretKey;
  }

  public function getRequester() {
    return $this->requester;
  }

  public function sign(array $message) {
    return $this->signer->sign($message);
  }
}
