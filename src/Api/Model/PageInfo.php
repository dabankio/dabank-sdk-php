<?php

namespace Bigbang\Api\Model;

class PageInfo{
  private $pageSize;
  private $pageNo;

  public function __construct($pageSize, $pageNo) {
    $this->pageSize = $pageSize;
    $this->pageNo = $pageNo;
  }

  public function getPageSize() {
    return $this->pageSize;
  }

  public function getPageNo() {
    return $this->pageNo;
  }

  static function of($pageSize = 10, $pageNo = 1) {
    return new PageInfo($pageSize, $pageNo);
  }
}
