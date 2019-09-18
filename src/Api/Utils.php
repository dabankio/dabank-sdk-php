<?php
namespace Bigbang\Api;

class Utils extends AbstractApi {

  public function ConvertBCHAddress($address) {
    return $this->post('/bchAddressConvert', ['address' => $address]);
  }

}
