<?php

namespace App\Controllers;

use App\Core\Viewer;
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

    public function create() :void
    {

    }

    public function update() :void
    {
        
    }

    public function delete() :void
    {
        $id = $_GET['id'] ?? NULL;
        $post = new Post();
        if ($id != NULL)
        {
         $post->delete($id);
        }
        header('Location: /');
    }

    public function insert() : void
    {
        $postContent = $_POST;
        $post = new Post();
        $post->insert($postContent);

        var_dump( $_POST);
        header('Location: /');
 
    }
    

}

