<?php

namespace Bigbang\Api\Model;

use Bigbang\Common\Utils;

class CheckAddressResult
{

    private $verifyResult;
    private $errMsg;

    public static function create(array $parsed)
    {
        $result = new self();
        $result->setVerifyResult(Utils::tryGetValue($parsed, 'verify'));
        $result->setErrMsg(Utils::tryGetValue($parsed, 'err_msg'));

        return $result;
    }

    public function getVerifyResult()
    {
        return $this->verifyResult;
    }

    public function setVerifyResult($verifyResult)
    {
        $this->verifyResult = $verifyResult;
    }

    public function getErrMsg()
    {
        return $this->errMsg;
    }

    public function setErrMsg($errMsg)
    {
        $this->errMsg = $errMsg;
    }
}
