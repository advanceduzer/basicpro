<?php 

namespace App\Core;

class Router {
    private const CONTROLLER_PATH = 'App\\Controllers\\';
    
    public function run() : void 
    {
        // Извлечение URL
        $url = !empty($_SERVER["REDIRECT_URL"]) ? $_SERVER["REDIRECT_URL"] : '/';
        
        // Разбиение URL на части
        $separateUrl = explode('/', trim($url, '/'));
        
        // Определение контроллера и метода
        $controllerName = !empty($separateUrl[0]) ? ucfirst($separateUrl[0]) : 'Home';
        $methodName = !empty($separateUrl[1]) ? $separateUrl[1] : 'index';
        
        // Полное имя класса контроллера
        $controllerNameSpace = self::CONTROLLER_PATH . $controllerName;
        
        // Проверка существования класса
        if(!class_exists($controllerNameSpace)){
            $controllerNameSpace = self::CONTROLLER_PATH . 'Error';
            $methodName = 'index';
        }
        
        // Создание объекта контроллера
        $controller = new $controllerNameSpace();
        
        // Проверка существования метода
        if(!method_exists($controller, $methodName)){
            $controllerNameSpace = self::CONTROLLER_PATH . 'Error';
            $controller = new $controllerNameSpace();
            $methodName = 'index';
        }
        
        // Вызов метода контроллера
        $controller->$methodName();
    }
}
