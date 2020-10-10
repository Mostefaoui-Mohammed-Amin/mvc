<?php



class app{

    private $controller = 'home';
    private $method = 'index';
    private $params = [];

    public function __construct()
    {
        $this->url();
        $this->render();
    }


    private function url(){
        if(isset($_SERVER['QUERY_STRING'])){
            $url = explode("/",$_SERVER['QUERY_STRING']);
            $this->controller = isset($url[0]) ? $url[0]."controller" : 'homecontroller';
            $this->method = isset($url[1]) ? $url[1] : 'index';
            unset($url[0],$url[1]);
            $this->params =  array_values($url);
        }
    }

    private function render(){
        if(class_exists($this->controller)){
            $controller = new $this->controller;
            if(method_exists($controller,$this->method)){
                call_user_func_array([$this->controller,$this->method],$this->params);
            }else{
                echo 'method not found';
            }

        }else{
            echo 'class not found';
        }
    }


}