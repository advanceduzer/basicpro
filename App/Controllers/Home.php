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
        $data = array_filter($_POST);
        if (!empty($data)) {
            $post = new Post();
            $post->insert($data);
            header('Location: /');
        }
        Viewer::view("home/create");
    }


    public function update() :void
    {
        $id = $_GET['id'] ?? NULL;
        $post = new Post();
        $data = [];
        
        if ($id != NULL) {
            $data = $post->findOneUpdate($id);
        
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $postContent = [];
                $postContent = array_filter($_POST);
                $post->update($id, $postContent);
                header('Location: /');
            }
        }
        Viewer::view("home/update", $data);
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
    
}

