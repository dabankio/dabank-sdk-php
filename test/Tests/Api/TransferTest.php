<?php

namespace Bigbang\Tests\Api;

use Bigbang\Api\Model\SendTransferResult;
use Bigbang\Api\Transfer;

class TransferTest extends TestCase
{

    /**
     * @test
     */
    public function shouldSendTransfer()
    {
        $returnValue = [
            'status' => 'TRANSFER_PENDING',
            'transfer_id' => 3357652
        ];
        $want = SendTransferResult::create([
            'transfer_id' => 3357652,
            'status' => 'TRANSFER_PENDING'
        ]);

        $api = $this->getApiMock();
        $api->expects($this->once())
            ->method('post')
            ->with('/transfer')
            ->will($this->returnValue($returnValue));

        $got = $api->send('BTC', 'b46e3ed5-c2b8-5afd-9383-602c95916ddc', '6206f8f8-6ed1-5764-a9ce-08a90a3b1fbd', 0.01, 1);
        $this->assertEquals($want->getTransferId(), $got->getTransferId());
        $this->assertEquals($want->getStatus(), $got->getStatus());
    }

    protected function getApiClass()
    {
        return Transfer::class;
    }
}
