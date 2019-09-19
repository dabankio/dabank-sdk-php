<?php

namespace Bigbang\Tests\Api;

use Bigbang\Client;
use Bigbang\Requester;
use Bigbang\Tests\TestFixtures;

abstract class TestCase extends \PHPUnit\Framework\TestCase
{

    public function noop()
    {

    }

    protected function getApiMock()
    {
        $requester = $this->getMockBuilder(Requester::class)
            ->setMethods(['execute'])
            ->setConstructorArgs([[$this, 'noop'], ''])
            ->getMock();

        $requester->expects($this->any())->method('execute');

        $baseUrl = 'http://dabank.gnway.cc:28080/api/v3/';
        $apiVersion = '';
        $secretKey = 'sdk-test';
        $privKey = TestFixtures::$privateKey;
        $pubKey = TestFixtures::$publicKey;

        $client = new Client(
            $baseUrl,
            $apiVersion,
            $secretKey,
            $privKey,
            $pubKey,
            true,
            $requester
        );

        return $this->getMockBuilder($this->getApiClass())
            ->setMethods(['post'])
            ->setConstructorArgs([$client])
            ->getMock();
    }

    abstract protected function getApiClass();
}
