<?php
////必须设置此目录,PHP程序的根目录
 define("File_ROOT", __DIR__);

require File_ROOT.'/swooleApi/autoload.php';

//注册应用路径
Huoniao\SwooleApi\Loader::addNameSpace('App', File_ROOT.'/App');
spl_autoload_register('\\Huoniao\\SwooleApi\\Loader::autoload');


 
//DI容器设置
$di = \Huoniao\SwooleApi\Di::getInstance();
$di->set("date",function(){
	return time();
}); 

 
$serv = new Swoole\Http\Server("127.0.0.1", 9502);

$serv->on('Request', function($request, $response) use($serv){
    
    $rs = \Huoniao\SwooleApi\Dispatcher::execute($request,$response,$serv);
    $response->end($rs); 
});

$serv->start();
?>
