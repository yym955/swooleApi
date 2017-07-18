<?php
namespace Huoniao\SwooleApi;

/**
 * 所有Swoole应用类的基类
 * Class Ojbect
 *
 * @package SwooleApi 
 */
class Di
{
    private $request;
    private $response;
    private static $_instance;
    public function set($key,$fun){
    	 $obj = $fun();
         $this->$key = $obj;
    } 

    public static function getInstance(){
    	if(self::$_instance===null){
    		self::$_instance = new Di();
    	}
    	return self::$_instance;
    }

    public function import($class){

		require_once File_ROOT.'/Lib'.$class;
    }
}