# 地址API

## 申请新地址(Address::newAddress)

为指定的用户申请一个指定币种的新地址.

```php
try {
    $res = $client->api('address')->newAddress('BTC', uniqid('sdk_test_'));
    $addr = $res;
    echo 'address = ' . $addr . "\n";
} catch (\Exception $e) {
    http_response_code(500);
    print_r($e);
}
```

## 校验地址(Address::checkAddress)

检查指定地址是否为指定的币种的合法地址.

```php
try {
    $res = $client->api('address')->checkAddress('BTC', $addr);
    print_r($res);
} catch (\Exception $e) {
    http_response_code(500);
    print_r($e);
}
```
