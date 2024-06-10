<?php

namespace App\Controllers;

use App\Core\Viewer;

class Home
{
    public function index()
    {

        Viewer::view("home/index");
    }
}
