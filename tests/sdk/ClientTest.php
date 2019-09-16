<?php

use \PHPUnit\Framework\TestCase;

class ClientTest extends TestCase {

    public function testCreateClient() {
        $client = $this::clientProvider();
        $result = $client->api('transfer')->send(
            'btc',
            'dd261616-53bc-5f5c-80e8-e4e3e59e1a0e',
            0.001,
            1
        );

        echo var_dump($result);
    }

    public function testAddDefaultParamsToRequestParams() {
        $client = $this::clientProvider();
        $reqParams = [
            'symbol' => 'btc',
            'to' => '8845f520-acb3-5863-9288-47a1c9dacfa2',
        ];
        $body = $client->createJsonBody($reqParams);
        print_r($body);
        $this->assertArrayHasKey('request_time', $body);
        $this->assertArrayHasKey('key', $body);
        $this->assertArrayHasKey('sign', $body);
    }

    public function clientProvider() {
        $baseUrl = '';
        $apiVersion = '';
        $secretKey = '';
        $privKey = '';
        $pubKey = '';

        return new \dabank\sdk\Client(
            $baseUrl,
            $apiVersion,
            $secretKey,
            $privKey,
            $pubKey
        );
    }
}
