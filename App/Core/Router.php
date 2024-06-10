<?php

namespace App\Core;

class Router
{
    private const CONTROLLER_PATH = 'App\\Controllers\\';
    private array $route = [];
    public function __construct()
    {
        $this->route = require_once __DIR__ . '/../../config/router.php';
    }
    public function run(): void
    {


        if (!empty($_SERVER["REDIRECT_URL"])) {
            if (array_key_exists($_SERVER["REDIRECT_URL"], $this->route)) {
                $separateUrl = explode(':', $this->route[$_SERVER["REDIRECT_URL"]]);
                $route = ucfirst($separateUrl[0]);
            } else {
                $route = "Error";
            }
        } else {
            $route = 'Home';
        }

        if (!empty($separateUrl[1])) {
            $methodNames = ['Index', ucfirst($separateUrl[1])];
            $methodNames = array_unique($methodNames);
        } else {
            $methodNames = ['Index'];
        }

        $controllerNameSpace = self::CONTROLLER_PATH . $route;

        if (!class_exists($controllerNameSpace)) {
            $controllerNameSpace = self::CONTROLLER_PATH . 'Error';
        }
        $controller = new $controllerNameSpace();



        foreach ($methodNames as $methodName) {
            if (!method_exists($controller, $methodName)) {
                $controllerNameSpace = self::CONTROLLER_PATH . 'Error';
                $controller = new $controllerNameSpace();
                $methodName = 'Index';
            }
            $controller->$methodName();
        }
    }
}
