<?php

namespace App\Controllers;

use App\Core\Viewer;

class Error
{
    public function index()
    {

        Viewer::view("error/index");
    }
}