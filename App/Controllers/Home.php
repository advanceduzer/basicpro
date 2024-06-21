<?php

namespace App\Controllers;

use App\Core\Viewer;
use App\Orm\Connect;
use App\Models\Post;
use PDO;


class Home
{

    public function index() :void
    {

        $post = new Post();
        $data['data'] = $post->findAll();
        Viewer::view("home/index", $data);
    }
}

