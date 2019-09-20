# 交易历史查询API

## 交易明细查询

### 查询已成功处理的交易

```php
$opts = new ListTransferOptions();
$opts->setEndAt(time());
$res = $client->api('transfer')->listSuccessTransfers('BTC', PageInfo::of(10, 1), $opts);
```

### 查询待处理的交易

```php
$res = $client->api('transfer')->listPendingTransfers('BTC', PageInfo::of(10, 1));
```

### 可附加的查询条件

见`Bigbang\Api\Model\ListTransferOptions`.

### 查询结果

见`Bigbang\Api\Model\ListTransferResult`.

## 统计交易总额

```php
try {
    $res = $client->api('transfer')->sum('BTC', 'OUT');
    print_r($res);
} catch (\Exception $e) {
    //http_response_code(500);
    print_r($e);
}
```