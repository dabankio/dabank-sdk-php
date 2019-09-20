<?php


namespace Bigbang\Exception;

class ServiceException extends BigbangException
{
    protected $httpStatusCode;
    protected $errCode;
    protected $errMsg;

    public function __construct($httpStatusCode, $errCode, $errMsg)
    {
        $this->httpStatusCode = $httpStatusCode;
        $this->errCode = $errCode;
        $this->errMsg = $errMsg;
        $publicErrMsg = empty($errMsg) ? $httpStatusCode : $errMsg;
        parent::__construct($publicErrMsg, $errCode);
    }

    /**
     * @return mixed
     */
    public function getHttpStatusCode()
    {
        return $this->httpStatusCode;
    }

    /**
     * @param mixed $httpStatusCode
     */
    public function setHttpStatusCode($httpStatusCode)
    {
        $this->httpStatusCode = $httpStatusCode;
    }

    /**
     * @return mixed
     */
    public function getErrCode()
    {
        return $this->errCode;
    }

    /**
     * @param mixed $errCode
     */
    public function setErrCode($errCode)
    {
        $this->errCode = $errCode;
    }

    /**
     * @return mixed
     */
    public function getErrMsg()
    {
        return $this->errMsg;
    }

    /**
     * @param mixed $errMsg
     */
    public function setErrMsg($errMsg)
    {
        $this->errMsg = $errMsg;
    }
}