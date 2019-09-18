<?php
namespace dabank\sdk\tests\Api;

class AbstractApiTest extends TestCase {

  /**
   * @test
   */
  public function shouldAppendDefaultParamsToRequestParams() {

    $client = $this->getMockBuilder(\dabank\sdk\Client::class)
    ->setMethods(['sign'])
    ->disableOriginalConstructor()->getMock();

    $client->expects($this->any())->method('sign')->willReturn('sig value');

    $api = $this->getAbstractApiObject($client);

    $reqParams = [
        'symbol' => 'btc',
        'to' => '8845f520-acb3-5863-9288-47a1c9dacfa2',
    ];
    $body = $api->createJsonBody($reqParams);
    $this->assertArrayHasKey('request_time', $body);
    $this->assertArrayHasKey('key', $body);
    $this->assertArrayHasKey('sign', $body);
  }

  protected function getAbstractApiObject($client) {
    return $this->getMockBuilder($this->getApiClass())
        ->setMethods(null)
        ->setConstructorArgs([$client])
        ->getMock();
  }

  protected function getApiClass() {
    return \dabank\sdk\api\AbstractApi::class;
  }
}
