<?php

namespace App\Controllers;

use App\Core\Viewer;

class About
{
    public function index()
    {
        $data = [
            "first" => ['first' => '1', 'two' => '2', 'three' => '3', 'four' => '4'],
            "second" => ['ten' => '111', 'twenty' => '222']
        ];
        Viewer::view("about/index", $data);
    }
    public function error()
    {

        Viewer::view("about/error");
    }
}
