
## 依赖

- PHP
- Yaf 扩展
- Composer 

## 组件

yaf框架本身是一个比较精简的MVC框架, 本身并没有提供其他类库, 本项目主要提供了一些常用到的组件:
   
- 验证码 Captcha
- 数据库 ORM
- Http 
- Cache 
  - Redis
  - Memcached
- 日志
- 上传组件
- 校验
- 视图
- 事件
- 依赖注入

## 安装

### 安装类库 

方式一(用于单项目):
```shell
composer require phpcasts/yaf-library -vvv
```

方式二(用于多项目共享):

```shell
git clone https://github.com/qloog/yaf-library
```

修改配置文件的: application.library = APP_PATH "/library"
为: application.library = APP_ROOT "/../yaf-library" 

> PS: yaf-library与项目在同一级目录, 达到多项目共享一套 `yaf-library` 的目的,便于维护和管理

### 添加配置

打开 conf/application.ini, 添加一下配置:

```php
; cache
cache.type = redis
cache.redis = default

; Redis
redis.default.host = 127.0.0.1
redis.default.port = 6379

;database
database.driver     = mysql
database.host       = localhost
database.database   = test
database.username   = root
database.password   = 123456
database.port       = 3306
database.charset    = utf8
database.collation  = utf8_unicode_ci
database.prefix     = ""

; Log
log.level = debug
log.channel = default
log.file.dir = APP_ROOT "/storage/logs"
```

### 添加常量定义

一般定义在public/index.php文件中

```php
define('APP_ROOT', dirname(__DIR__));
define('APP_PATH', APP_ROOT . '/application');
```

## Usage

以使用Cache为例:

```php
use PHPCasts\Yaf\Caches\Cache;
...
 
 $cache = Cache::getInstance();
 $cache->set('test', 'test-value');

```

## 实际使用

[yaf-skeleton](https://github.com/qloog/yaf-skeleton)

## Docs

- Yaf Docs: [http://www.php.net/manual/en/book.yaf.php](http://www.php.net/manual/en/book.yaf.php)

## License

MIT
    

