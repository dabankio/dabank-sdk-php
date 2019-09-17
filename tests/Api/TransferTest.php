<?php

namespace dabank\sdk\tests\Api;
use dabank\sdk\api\model\ApiResult;

class TransferTest extends TestCase {

  /**
   * @test
   */
  public function shouldSendTransfer() {
    $expectedValue = new ApiResult(
      [
        "err_code" => "",
        "err_info" => "",
        "data" => [
        "status" => "TRANSFER_PENDING",
        "transfer_id" => 3357652
        ],
        "request_id" => 2294582
      ]
    );

    $api = $this->getApiMock();
    $api->expects($this->once())
      ->method('post')
      ->with('/transfer')
      ->will($this->returnValue($expectedValue));

    $this->assertEquals($expectedValue, $api->send('BTC', 'b46e3ed5-c2b8-5afd-9383-602c95916ddc', '6206f8f8-6ed1-5764-a9ce-08a90a3b1fbd', 0.01, 1));
  }

  protected function getApiClass() {
    return \dabank\sdk\api\Transfer::class;
  }
}
