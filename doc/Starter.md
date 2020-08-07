# 开始使用

## 生成RSA公钥和私钥

### windows

```
# 生成私钥
openssl genrsa -out rsa.private 2048

# 生成公钥
openssl rsa -in rsa.private -out rsa.public -pubout -outform PEM
```

### linux

```
# 生成私钥
openssl genrsa -out rsa.private 2048

# 生成公钥
openssl rsa -in rsa.private -out rsa.public -pubout -outform PEM
```

## 注册bigbang账号

注册bigbang账号(注册方式待补充). 并上传你的RSA公钥, 妥善保管你的RSA私钥和bigbang分配给你的App id及bigbang的公钥.

## Prerequisite

- PHP 5.4+

- curl

- openssl

## 安装

### composer

参考composer使用文档.

### 源码安装

下载源代码, 然后在你的项目代码使用autoloader:
```php
require '/path/to/bigbang-sdk-php/autoloader.php';
BigbangAutoloader::register();
```

## 如何使用Api


首先创建`Bigbang\Client`.

```php
$client = new Client(
    $gateway,
    '1',
    $appId,
    $appPrivKey,
    $bigbangPubKey
);
```

随后, 可以通过`$client->api($apiName)`获得你想使用的Api的包装对象, 然后根据业务需要调用该对象的对应方法. 

目前可用的`$apiName`:

- transfer

  交易相关

- address

  币种地址相关
  
- app
  
  应用的账户信息等
  
- debug
  
  用于调试
  
- utils

  辅助工具
  
  
