<?php

namespace dabank\sdk;

use dabank\sdk\exception\HttpException;
use dabank\sdk\exception\CurlException;

class CurlRequester extends Requester {

  public function __construct($gateWay, $options = []) {
    $this->options = $options + [
      CURLOPT_FAILONERROR    => false,
      CURLOPT_SSL_VERIFYPEER => false,
    ];
    parent::__construct([$this, 'post'], $gateWay);
  }

  public function post($url, $params) {
    $ch = curl_init();
    curl_setopt_array($ch, $this->options);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
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
    echo "data_string = $data_string";
    $response = curl_exec($ch);
    if ($response === false) {
        curl_close($ch);
        throw new CurlException(curl_error($ch), curl_errno($ch));
    }
    $httpStatusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    return [$httpStatusCode, $response];
  }
}
