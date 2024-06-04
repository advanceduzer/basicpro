<?php 

namespace App\Core;

class Router {
    private const CONTROLLER_PATH = 'App\\Controllers\\';
    public function run() : void 
    {
        if (!empty($_SERVER["REDIRECT_URL"])){
            //var_dump($_SERVER["REDIRECT_URL"]);
            $separateUrl = explode('/',$_SERVER["REDIRECT_URL"]);
            $route = ucfirst($separateUrl[1]);
            // var_dump($route);
        }
        else{
            $route = 'Main';
        }
        $controllerNameSpace = self::CONTROLLER_PATH . $route;
    

        if(!class_exists($controllerNameSpace)){
            $controllerNameSpace = self::CONTROLLER_PATH . 'Error';
        } 
        $controller = new $controllerNameSpace();
        $controller->index();
    }
}

