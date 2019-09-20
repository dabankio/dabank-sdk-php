# 发起交易API

`namespace Bigbang\Api`

## 发起交易(Transfer::send)

发起一笔转账. 你需要处理API调用的异常, 只有在请求处理成功时才会返回有意义的`SendTransferResult`.  

```php
try {
    $res = $client->api('transfer')->send('BTC', '<from address>', '<to address>', '<amount>', '<uniqueId>');
} catch(\Exception $ex) {
    http_response_status(500);
    print_r($ex);
} catch(\ServiceException $ex) {
    
}
```

## 调用结果(Model::SendTransferResult)

需要检查调用结果的状态. 状态为`TRANSFER_PENDING`时, 表明该笔交易将异步地处理, 最终的处理结果将通过应用的回调地址进行通知; 状态为'TRANSFER_SUCCESSFUL'时,
表明该笔交易已处理成功, 不会再另行通知.

为什么异步和同步两种通知方式共存?

大部分交易是排队上链的, 只能使用异步通知的方式; 对于不需要上链的交易, 比如, bigbang平台账户之间的交易, 异步和同步都是可行的, 出于一些设计上的考虑, 我们选择同步通知. 
 



