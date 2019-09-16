<?php

namespace dabank\sdk\request;

abstract class AbstractRequest {

  protected $resourcePath;

  /**
   * 请求参数
   * @var array
   */
  protected $apiParams = [];

  public function __construct($config = []) {
    foreach($config as $key=>$val) {
      $this->key = $val;
    }
  }

  public function getApiParams() {
    return $this->apiParams;
  }
}
