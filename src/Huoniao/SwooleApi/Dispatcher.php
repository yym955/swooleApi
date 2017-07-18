<?php
namespace Huoniao\SwooleApi;
/**
 *  解析调度器
 */
class Dispatcher 
{
    
     static public function execute($request,$response){
     	  $depr = "/";
     	  $paths  =   explode($depr,trim($request->server['path_info'],$depr));
     	 if(count($paths)==3){
			$_g = $paths[0];
			$_c = $paths[1];
			$_a = $paths[2];
			$class = "\\App\\".$_g."\\Controller\\".$_c."Controller";
			if(class_exists($class)){ 
				$c = new $class($request,$response);  
				if(is_callable(array($c,$_a))){  
					$rs = $c->$_a();
				    return $rs;
				}else{
		     	 	$response->status(404);
		     	 	return $_a."not find";
				}
			}else{
	     	 	$response->status(404);
	     	 	return "";
			}
     	 }else{
     	 	$response->status(404);
     	 	return "";
     	 }
     }
 
}
