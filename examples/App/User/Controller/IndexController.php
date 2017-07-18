<?php
namespace App\User\Controller;
/**
 * Controller的基类，控制器基类
 */
class IndexController extends \Huoniao\SwooleApi\Controller
{
      
 
    /** 
     *
     * @return string
     */
    public function index()
    {		

         return $this->json(array("hello"=>'Huoniao'));
     } 
}
