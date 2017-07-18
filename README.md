
## swooleApi是什么?
一个基于swoole框架下开发 快速开发api



## swooleApi有哪些功能？

* Controller调度
    *  根据常见的 `/模块/功能/方法 ` 的路径模式进行功能模块化
    *  输出json格式的结果
* 待续

## 如何使用
* 常规项目

```php
define("File_ROOT", __DIR__);

require File_ROOT.'/swooleApi/autoload.php';

//注册应用路径
Huoniao\SwooleApi\Loader::addNameSpace('App', File_ROOT.'/App');
spl_autoload_register('\\Huoniao\\SwooleApi\\Loader::autoload');

```

在 Swoole\Http\Server 请求中

```php
$serv->on('Request', function($request, $response){
    
    $rs = \Huoniao\SwooleApi\Dispatcher::execute($request,$response);
    $response->end($rs); 
});

```

完整例子

https://github.com/yym955/swooleApi/blob/master/examples/simple_server.php
