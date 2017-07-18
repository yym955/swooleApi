<?php
namespace Huoniao\SwooleApi;
/**
 * Controller的基类，控制器基类
 */
class Controller extends Object
{
    
    protected $config;
    protected $request;
    protected $response;

    function __construct($request,$response,$config=array())
    {   parent::__construct();
        $this->response = $response;
        $this->request = $request;
        $this->config = $config;
    }


    /*function __set($key,$obj)
    {
         $this->$key = $obj;
    } */
 
    /**
     * 输出JSON字串
     * @param string $data
     * @param int    $code
     * @param string $message
     *
     * @return string
     */
    function json($data = '', $code = 0, $message = '')
    {
        $json = array('code' => $code, 'message' => $message, 'data' => $data);
        if (!empty($_REQUEST['jsonp']))
        {
            $this->response->header('Content-type', 'application/x-javascript');
            return $_REQUEST['jsonp'] . "(" . json_encode($json) . ");";
        }
        else
        {
            $this->response->header('Content-type', 'application/json');
            return json_encode($json);
        }
    }

    function message($code = 0, $msg = 'success')
    {
        $ret = array('code' => $code, 'message' => $msg);
        return $this->is_ajax ? $ret : json_encode($ret);
    }
 

    /**
     * 显示运行时间和内存占用
     *
     * @return string
     */
    protected function showTime()
    {
        $runtime = $this->swoole->runtime();
        // 显示运行时间
        $showTime = '执行时间: ' . $runtime['time'];
        // 显示内存占用
        $showTime .= ' | 内存占用:' . $runtime['memory'];
        return $showTime;
    }
 

    function __destruct()
    {
       //销毁
    }
}
