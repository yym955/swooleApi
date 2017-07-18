<?php
namespace Huoniao\SwooleApi;

/**
 * 所有Swoole应用类的基类
 * Class Ojbect
 *
 * @package Swoole
 * @property Request             $request
 * @property Response            $response 
 */
class Swoole
{
    private $request;
    private $response;
    function __set($key,$obj)
    {
         $this->$key = $obj;
    } 
}