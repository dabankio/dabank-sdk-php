<?php
namespace dabank\sdk\api;

class Utils extends AbstractApi {

  public function ConvertBCHAddress($address) {
    return $this->post('/bchAddressConvert', ['address' => $address]);
  }

}
