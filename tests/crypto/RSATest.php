<?php

namespace dabank\sdk\tests\crypto;

use \PHPUnit\Framework\TestCase;
use \dabank\sdk\tests\TestFixtures;

class RSATest extends TestCase {

  /**
   * @dataProvider signDataProvider
   */
  public function testSign($privKey, $params, $expected) {
    $signer = new \dabank\sdk\crypto\rsa\RSASigner($privKey);
    $this->assertEquals($expected, $signer->sign($params));
  }

  /**
   * @dataProvider verifyDataProvider
   */
  public function testVerify($pubKey, $params, $expected) {
    $verifier = new \dabank\sdk\crypto\rsa\RSAVerifier($pubKey);
    $this->assertEquals($expected, $verifier->verify($params, $params['sign']));
  }

  public function signDataProvider() {
    return [
      [
        TestFixtures::$privateKey,
        [
          'symbol' => 'btc',
          'request_time' => '1708',
          'key' => '6ddb7389-ca53-593c-8a7c-510962eef59c',
          'sign' => 'excluded'
        ],
        'gmnb+6WHxeGegNwzf8hKCLRPknPcH7tA07m69gy24YkefyQ8yZIq6CyRX5/bUEHDaPSvE2TG6a5m+51Nr9P1lnOPTdtkPF7x07i3A2s7rQ+NQ6llPfAqWnR2b3QFsQg6Lo5qo9JH20nIR0teAiJwtWyMJoFTw2AJZgesUNrqQz1SRufM6oAxfwQfY8fWhWcohBXPQpxhplIbWC38ofgT4UufFDJ0qDu6ELE3DAbJuo/J2EAiRCL2D7Cr6PyKCJwZUjJayq0W23euhoA4+ngqJKS7V9Q4Pf0Eh84kMDGmTHSFpCQmoz9CYjCN6/A8nIuAjpTXnQjG4uxN/+8VuAepAA=='
      ]
    ];
  }

  public function verifyDataProvider() {
    return [
      [
        TestFixtures::$publicKey,
        [
          'symbol' => 'btc',
          'request_time' => '1708',
          'key' => '6ddb7389-ca53-593c-8a7c-510962eef59c',
          'sign' => 'gmnb+6WHxeGegNwzf8hKCLRPknPcH7tA07m69gy24YkefyQ8yZIq6CyRX5/bUEHDaPSvE2TG6a5m+51Nr9P1lnOPTdtkPF7x07i3A2s7rQ+NQ6llPfAqWnR2b3QFsQg6Lo5qo9JH20nIR0teAiJwtWyMJoFTw2AJZgesUNrqQz1SRufM6oAxfwQfY8fWhWcohBXPQpxhplIbWC38ofgT4UufFDJ0qDu6ELE3DAbJuo/J2EAiRCL2D7Cr6PyKCJwZUjJayq0W23euhoA4+ngqJKS7V9Q4Pf0Eh84kMDGmTHSFpCQmoz9CYjCN6/A8nIuAjpTXnQjG4uxN/+8VuAepAA=='
        ],
        1
      ]
    ];
  }
}
