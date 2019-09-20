# 统计API

## 查询应用的账户信息

查询应用的账户信息. 返回每一个地址的余额信息.

```php
try {
    $res = $client->api('app')->accounts();
    print_r($res);
} catch (\Exception $e) {
    http_response_code(500);
    print_r($e);
}
```

返回值详细说明见`Bigbang\APi\Model\GetAccountsResult'.

## 交易统计及余额信息

应用对账. 返回交易统计及余额信息.

```php
try {
    $res = $client->api('app')->stats(1, time());
    print_r($res);
} catch (\Exception $e) {
    http_response_code(500);
    print_r($e);
}
```

返回值详细说明见`Bigbang\APi\Model\StatsResult'.
