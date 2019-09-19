<?php

namespace Bigbang;

class Requester
{

    private $callBack;
    private $gateWay;

    public function __construct(
        callable $callBack,
        $gateWay
    )
    {
        $this->callBack = $callBack;
        $this->gateWay = rtrim($gateWay, '/') . '/';
    }

    public function execute($path, $params)
    {
        return call_user_func($this->callBack, $this->getUrl($path), $params);
    }

    public function getUrl($path)
    {
        return $this->gateWay . ltrim($path, '/');
    }
}
