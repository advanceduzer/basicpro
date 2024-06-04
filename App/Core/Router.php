<?php 

namespace App\Core;

class Router {
    private const CONTROLLER_PATH = 'App\\Controllers\\';
    public function run() : void 
    {
        if (!empty($_SERVER["REDIRECT_URL"])){
            $separateUrl = explode('/',$_SERVER["REDIRECT_URL"]);
            $route = ucfirst($separateUrl[1]);
            echo $route;
        }else{
            $route = 'Main';
        }

        if (!empty($separateUrl[2])){
            $methodNames = ['Index', ucfirst($separateUrl[2])];
        }else{
            $methodNames = ['Index'];
        }


        $controllerNameSpace = self::CONTROLLER_PATH . $route;
    

        if(!class_exists($controllerNameSpace)){
            $controllerNameSpace = self::CONTROLLER_PATH . 'Error';
        } 
        $controller = new $controllerNameSpace();


   foreach ($methodNames as $methodName){
    if(!method_exists($controller, $methodName)){
            $controllerNameSpace = self::CONTROLLER_PATH . 'Error';
            $controller = new $controllerNameSpace();
            $methodName = 'index';
        }        
        $controller->$methodName();
   }
    }
}

