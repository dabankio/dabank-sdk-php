<?php

namespace dabank\sdk\crypto\rsa;

use dabank\sdk\crypto\Verifier;
use dabank\sdk\crypto\Helper;

class RSAVerifier implements Verifier {

    private $pubKey;

    public function __construct($publicKey) {
        $this->pubKey = $publicKey;
        $this->keyNameOfSig = 'sign';
    }

    function verify(array $message, string $sig) {
        $msg  = Helper::clearTextMessage($message, [$this->keyNameOfSig]);
        $publicId = openssl_pkey_get_public($this->pubKey);
        return openssl_verify($msg, base64_decode($sig), $publicId, OPENSSL_ALGO_SHA256);
    }
}
