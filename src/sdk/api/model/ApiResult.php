<?php

namespace dabank\sdk\api\model;

class ApiResult {
  private $errCode;
  private $errMsg;
  private $data;
  private $requestId;

  public function __construct($raw) {
    $this->errCode = $raw['err_code'];
    $this->errMsg = $raw['err_info'];
    $this->data = $raw['data'];
    $this->requestId = $raw['request_id'];
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
}
