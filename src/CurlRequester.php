<?php

namespace Bigbang;

use Bigbang\Exception\CurlException;

class CurlRequester extends Requester
{
    private $debug;

    public function __construct($gateWay, $debug = false, $options = [])
    {
        $this->options = $options + [
                CURLOPT_FAILONERROR => false,
                CURLOPT_SSL_VERIFYPEER => false,
            ];
        $this->debug = $debug;
        parent::__construct([$this, 'post'], $gateWay);
    }

    public function post($url, $params)
    {
        $ch = curl_init();
        curl_setopt_array($ch, $this->options);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        foreach ($params as &$value) {
            if (is_string($value) && strlen($value) > 0 && $value[0] === '@' && class_exists('CURLFile')) {
                $file = substr($value, 1);
                if (is_file($file)) {
                    $value = new \CURLFile($file);
                }
            }
        }
        $data_string = json_encode($params);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        if ($this->debug) {
            echo "url = $url; params = $data_string" . "\n";
        }
        $response = curl_exec($ch);
        if ($response === false) {
            curl_close($ch);
            throw new CurlException(curl_error($ch), curl_errno($ch));
        }
        $httpStatusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        if ($this->debug) {
            echo "response = var_dump($response)" . "\n";
        }
        return [$httpStatusCode, $response];
    }
}
