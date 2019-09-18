<?php

namespace Bigbang\Api\Model;

class ApiResult {
  private $httpStatusCode;
  private $errCode;
  private $errMsg;
  private $data;
  private $requestId;

  public function __construct($raw) {
    $this->httpStatusCode = $raw['httpStatusCode'];
    $this->errCode = $raw['err_code'];
    $this->errMsg = $raw['err_info'];
    $this->data = $raw['data'];
    $this->requestId = $raw['request_id'];
  }

  public function isSuccess() {
    return $this->httpStatusCode === 200 && empty($this->errCode);
  }

  public function getData() {
    return $this->data;
  }

  public function getErrCode() {
    return $this->errCode;
  }

  public function getErrMsg() {
    return $this->errMsg;
  }

  public function getRequestId() {
    return $this->requestId;
  }

  public function errInfo() {
    return "httpStatusCode: $this->httpStatusCode; errCode: $this->errCode; errMsg: $this->errMsg;";
  }
}
