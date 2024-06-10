<?php

namespace App\Core;

class Viewer
{
    private const DEFAULT_FILE_TYPE = 'php';
    static public function view(string $view, array $data = [], string $fileType = self::DEFAULT_FILE_TYPE): void
    {
        $routeFull = explode('/', $view);
        $route = $routeFull[0];
        $file = $routeFull[1];
        extract($data);
        include __DIR__ . '/../../public/View/' . $route . "/" . $file . "." . $fileType;
    }
}
