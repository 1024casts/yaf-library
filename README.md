
## 依赖

 - Yaf PHP扩展
 - Composer 

## 为什么要写这个项目

   yaf框架本身是一个比较精简的MVC框架, 本身并没有提供其他类库, 本项目主要提供了一些常用到的类库:
   
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

```
composer require phpcasts/yaf-library -vvv
```

### 添加配置

打开 conf/application.ini, 添加一下配置:

```
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
log.channel = business
log.file.dir = APP_ROOT "/storage/logs"
```

## Usage


    

