<?php

namespace Bigbang\Tests\Client;

use Bigbang\Client;
use Bigbang\Tests\TestFixtures;
use PHPUnit\Framework\TestCase;

class ClientTest extends TestCase
{

    public function testCreateClient()
    {
        $client = $this::clientProvider();
    }

    public function clientProvider()
    {
        $gateway = 'http://dabank.gnway.cc:28080/api/v3/';
        $apiVersion = '';
        $secretKey = 'sdk-test';
        $privKey = TestFixtures::$privateKey;
        $pubKey = TestFixtures::$publicKey;

        return new Client(
            $gateway,
            $apiVersion,
            $secretKey,
            $privKey,
            $pubKey
        );
    }
}
