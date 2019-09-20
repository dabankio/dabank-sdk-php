<?php

namespace Bigbang\Tests\Api;

use Bigbang\Api\Address;
use Bigbang\Api\Model\CheckAddressResult;

class AddressTest extends TestCase
{

    /**
     * @test
     */
    public function shouldGetNewAddress()
    {
        $expectedValue = "8084fe3a-fd29-5c7f-95c0-d70c30040e34";
        $returnValue = [
          'address' => $expectedValue
        ];

        $api = $this->getApiMock();
        $api->expects($this->once())
            ->method('post')
            ->with('/address')
            ->will($this->returnValue($returnValue));

        $this->assertEquals($expectedValue, $api->newAddress('BTC', 'some user'));
    }

    /**
     * @test
     */
    public function shouldVerifyAddress()
    {
        $returnValue = [
            "verify" => true,
            "err_msg" => ''
        ];
        $expectedValue = CheckAddressResult::create($returnValue);

        $api = $this->getApiMock();
        $api->expects($this->once())
            ->method('post')
            ->with('/checkAddress')
            ->will($this->returnValue($returnValue));
        $got = $api->checkAddress('BTC', 'some address');
        $this->assertEquals($expectedValue->getVerifyResult(), $got->getVerifyResult());
        $this->assertEquals($expectedValue->getErrMsg(), $got->getErrMsg());
    }

    protected function getApiClass()
    {
        return Address::class;
    }
}
