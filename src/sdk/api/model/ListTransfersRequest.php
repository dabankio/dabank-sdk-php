<?php

namespace dabank\sdk\api\model;

class ListTransfersRequest {
  private $transferType;
  private $symbol;
  private $startAt;
  private $endAt;
  private $address;
  private $status;
  private $pageSize;
  private $pageNo;
}
