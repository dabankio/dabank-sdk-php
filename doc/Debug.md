# 调试API

## hello(Debug::hello)

最简单的API, 总是返回"Hello World!", 可用于测试与服务器的连通性.

```php
try {
    $res = $client->api('debug')->hello();
    print_r($res);
} catch (\Exception $e) {
    http_response_code(500);
    print_r($e);
    return;
}
```

## time(Debug::time)

返回服务器当前unix时间(秒). 可用于时间误差检查.

```php
try {
    $res = $client->api('debug')->time();
    print_r($res);
} catch (\Exception $e) {
    http_response_code(500);
    print_r($e);
    return;
}
```