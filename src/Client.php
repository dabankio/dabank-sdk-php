<?php

namespace Bigbang;

class Client
{

    private $gateway;
    private $apiVersion;
    private $appId;
    // 应用端私钥
    private $appPrivKey;
    // dabank公钥
    private $dabankPubKey;

    private $signer;

    private $verifier;

    public function __construct(
        string $gateway,
        string $apiVersion,
        string $appId,
        string $appPrivKey,
        string $dabankPubKey,
        $debug = false,
        Requester $requester = null
    )
    {
        $this->gateway = $gateway;
        $this->apiVersion = $apiVersion;
        $this->appId = $appId;
        $this->privKey = $appPrivKey;
        $this->dabankPubKey = $dabankPubKey;
        $this->debug = $debug;

        $this->signer = new Crypto\RSA\RSASigner($this->privKey);
        $this->verifier = new Crypto\RSA\RSAVerifier($this->dabankPubKey);
        $this->requester = $requester === null ? new CurlRequester($gateway, $debug) : $requester;
    }

    public function __call($name, $arguments)
    {
        return $this->api($name);
    }

    public function api($name)
    {
        switch ($name) {
            case 'transfer':
                $api = new Api\Transfer($this);
                break;
            case 'address':
                $api = new Api\Address($this);
                break;
            case 'debug':
                $api = new Api\Debug($this);
                break;
            case 'app':
                $api = new Api\App($this);
                break;
            case 'utils':
                $api = new Api\Utils($this);
                break;
            default:
                throw new \Exception('invalid api name');
        }
        return $api;
    }

    public function getTimestamp()
    {
        return time();
    }

    public function getAppId()
    {
        return $this->appId;
    }

    public function getRequester()
    {
        return $this->requester;
    }

    public function sign(array $message)
    {
        return $this->signer->sign($message);
    }

    public function verify(array $message, $sig)
    {
        return $this->verifier->verify($message, $sig);
    }
}
