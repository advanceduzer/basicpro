<?php

namespace App\Controllers;

use App\Core\Viewer;

class Gallery
{
    public function index()
    {
        Viewer::view("gallery/index");
    }

    public function tag()
    {
        Viewer::view("gallery/tag");
    }
}
