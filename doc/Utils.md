# 辅助工具API

## BCH地址转换

将BCH的新版本格式的地址转换为老版本格式的地址.

```php
try {
    $res = $client->api('utils')->convertBCHAddress('xxxxxx');
    print_r($res);
} catch (\Exception $e) {
    http_response_code(500);
    print_r($e);
    return;
}
```
