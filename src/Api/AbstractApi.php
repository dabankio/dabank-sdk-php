<?php

namespace Bigbang\Api;

use Bigbang\Api\Model\ApiResult;
use Bigbang\Exception\HttpException;

class AbstractApi
{

    private $client;

    public function __construct($client)
    {
        $this->client = $client;
    }

    protected function post($path, array $params = [], array $requestHeaders = [])
    {
        $body = $this->createJsonBody($params);
        return $this->postRaw($path, $body, $requestHeaders);
    }

    public function createJsonBody(array $params = [])
    {
        $defaultParams = [
            'key' => $this->client->getAppId(),
            'request_time' => $this->client->getTimestamp(),
        ];
        $realParams = array_merge($params, $defaultParams);
        $realParams['sign'] = $this->client->sign($realParams);

        return array_map(function ($value) {
            if (is_scalar($value)) {
                return strval($value);
            } else {
                return $value;
            }
        }, $realParams);
    }

    protected function postRaw($path, $body, array $requestHeaders = [])
    {
        $statusAndResp = $this->client->getRequester()->execute($path, $body, $requestHeaders);
        $parsed = json_decode($statusAndResp[1], true);
        if (is_array($parsed)) {
            $parsed['httpStatusCode'] = $statusAndResp[0];
            $apiRes = new ApiResult($parsed);
            if (!$apiRes->isSuccess()) {
                throw new HttpException($apiRes->errInfo());
            }
            return $apiRes->getData();
        }
        return $parsed;
    }
}
