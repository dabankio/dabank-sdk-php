<?php

use \PHPUnit\Framework\TestCase;

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
    $privKey = <<<EOT
-----BEGIN RSA PRIVATE KEY-----
MIIEpAIBAAKCAQEA2POOIYD2PHrXGow6ff4o1CRWCONDz9uKMPdpotwWb0SzQ7UF
sXdQpoC8C/Rar80Dwnc1V10wcOEJ7WlkAZCDqdUxRyWnLAQ11dTso0POaUckaZbk
ZB4ZQ56tetB5QaZ2eIdD62HAnPDdADLuFFCNeVWXkmRc6tKuPJ87Cn6LGjBeHAkB
Lww4oRsNSLW8aHUukljWTuHtt9wTMOHlLYX4PWqoQ6up3Gvy0LcVXL6wqJb9agJc
bIJxUuI2LDubo7pEFSKus1nVz8b4qEQkwe98KwRb+4lCJ6tw7sQ4+RfOhQbUFkDY
DhL1k8TDUh71+qzLFEZuDG7KktRziNq0PeE74wIDAQABAoIBAQCRco+qNIxgtbY6
TSL1zwxOVWH8qWiQFM5Lz8NZdRXxWOyaCuWbObOvPQVVOmgGDntjx4nSXV6ZfrWq
Hgr25YzvskdMPJkb8GKrTgmr10yt1g06YPgTiv5DEEGb4eI5OkGYwo6tYqbAUNbJ
SFvG8M44N0Lb2T9WCxLW/6WUfowBbInZNPsa4MklZy+vaWzaMwvzdjFuGvQSgjpr
4bmqc2u5osR7yVWz2avBFA64Kd0VJtopTbp+6oTeAEw+6DqR7+Xm3KDiAhye19po
YHUcC71wPFJr6DshyIDC7AHKSATdWunuuNVfO8pyJzPbiTaAW3c5NU0WeKAocFLK
P7HKqfaZAoGBAO3EH07oiZAXo7i0fbTtDzl7U9SWCPb8NhHP7rGmMULLQ0ZFfaMX
+rf+pXmyZGWahUKVhg1Put5WQ2pTMSkXzAiOLAAs8jMhdx2Ut0KqjtpajPuE4IN8
sCgIA1qSDDIxTOfeIFAKvwrleuuX7KuaSGpUlD8xfQnjWy4/OV6jZW0HAoGBAOmW
yzFV1DZKFVDqm6xDnx1dn+HX6Y0Gh3mM1aPf6TnRggOAPBU+xJwRFW/xIUMAqytk
SOuV9yMpPqPEFfsu9zZO215UsuMfXfdVa4MHVQRaRtONswLKoiW93TvkrBKBF8ZT
XhCOpRaAn0hj+aIY7JTJkyM4lAkCfLrzcQJLMR9FAoGADmvR1lBmX5X/eSmBYmLq
hHsFd6RuAMUFZoktGhtRa5K2juGSID1JGLXaRYpbaoo3wPUev1nxpKCo0B8hoTNv
TamJ46zWN+G0vteRUfrUVUwetva1Q2RhrtvlkC3BjZ3N41ZmsVQliDyo+vcpBLOD
5ucgYsDWq63dju2IxkO02CsCgYA06E7FsecLFOSXG0x/TCGyCQ65nKnto1j0Ew4g
vAqbafTEzjrNpRXrM4Njg35BKtmaTnCly6XadPEXLsa7yft8dYgCabTK9MPXzaU4
XGTJQ5lfOW0eaL8pRUPi2PyQhGTaKu/XWDfUTPXG874LFRIg8Tc+dwYwtDuELLeg
CV/q8QKBgQDksV9NZPB6uVU3/w/P12NA0chni6KP4ako9LskXgYGdy4q39wE8HBy
Hgmln691wiT6Y3DgIpxlpVOURiT7nqWQta63dx6WMvOpG2Ia3lK2m+44AhZFw/Zo
r51r7+39mPEEECE3GagGBawky7S+rl+zIX4ezCzbENbXBfJTX6EBFQ==
-----END RSA PRIVATE KEY-----
EOT;
    return [
      [
        $privKey,
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
    $pubKey = <<<EOT
-----BEGIN PUBLIC KEY-----
MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEA2POOIYD2PHrXGow6ff4o
1CRWCONDz9uKMPdpotwWb0SzQ7UFsXdQpoC8C/Rar80Dwnc1V10wcOEJ7WlkAZCD
qdUxRyWnLAQ11dTso0POaUckaZbkZB4ZQ56tetB5QaZ2eIdD62HAnPDdADLuFFCN
eVWXkmRc6tKuPJ87Cn6LGjBeHAkBLww4oRsNSLW8aHUukljWTuHtt9wTMOHlLYX4
PWqoQ6up3Gvy0LcVXL6wqJb9agJcbIJxUuI2LDubo7pEFSKus1nVz8b4qEQkwe98
KwRb+4lCJ6tw7sQ4+RfOhQbUFkDYDhL1k8TDUh71+qzLFEZuDG7KktRziNq0PeE7
4wIDAQAB
-----END PUBLIC KEY-----
EOT;
    return [
      [
        $pubKey,
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
