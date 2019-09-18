<?php

namespace dabank\sdk\tests\Api;
use dabank\sdk\api\model\ApiResult;

class AddressTest extends TestCase {

  /**
   * @test
   */
  public function shouldGetNewAddress() {
    $rawStr = <<<EOF
{
"err_code": "",
"err_info": "",
"data": {
"address": "1PSLARAWzGA2uayPJztAeSohSvHDqYgxvr"
},
"request_id": 2294861
}
EOF;
    $rawData = json_decode($rawStr, true);
    $expectedValue = new ApiResult($rawData);

    $api = $this->getApiMock();
    $api->expects($this->once())
      ->method('post')
      ->with('/address')
      ->will($this->returnValue($expectedValue));

    $this->assertEquals($expectedValue, $api->newAddress('BTC', 'some user'));
  }

  protected function getApiClass() {
    return \dabank\sdk\api\Address::class;
  }

  /**
   * @test
   */
  public function shouldVerifyAddress() {
    $rawStr = <<<EOF
{
"err_code": "",
"err_info": "",
"data": {
  "verify": true
},
"request_id": 2294861
}
EOF;
    $rawData = json_decode($rawStr, true);
    $expectedValue = new ApiResult($rawData);

    $api = $this->getApiMock();
    $api->expects($this->once())
      ->method('post')
      ->with('/checkAddress')
      ->will($this->returnValue($expectedValue));
    $this->assertEquals($expectedValue, $api->checkAddress('BTC', 'some address'));
  }
}
