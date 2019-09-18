<?php

namespace Bigbang\Tests\Client;

use Bigbang\Client;
use \PHPUnit\Framework\TestCase;
use \Bigbang\Tests\TestFixtures;

class ClientTest extends TestCase {

    public function testCreateClient() {
        $client = $this::clientProvider();
        $result = $client->api('transfer')->send(
            'BTC',
            '2NF3f8GD6Fhfap7JJ54ouHR9evyuxkkBdD5',
            '2NDhp6aoHastMWAZkQvNEAnp5jMX1YJ5qjh',
            0.001,
            1
        );
        echo var_dump($result);
    }

    public function clientProvider() {
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