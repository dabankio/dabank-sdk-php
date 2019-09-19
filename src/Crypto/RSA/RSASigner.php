<?php

namespace Bigbang\Crypto\RSA;

use Bigbang\Crypto\Helper;
use Bigbang\Crypto\Signer;

class RSASigner implements Signer
{

    private $privKey;
    private $keyNameOfSig;

    public function __construct(string $privKey)
    {
        $this->privKey = $privKey;
        $this->keyNameOfSig = 'sign';
    }

    public function Sign(array $message)
    {
        $msg = Helper::clearTextMessage($message, [$this->keyNameOfSig]);
        $privateId = openssl_pkey_get_private($this->privKey);
        openssl_sign($msg, $signature, $privateId, OPENSSL_ALGO_SHA256);
        openssl_free_key($privateId);

        return base64_encode($signature);
    }
}
