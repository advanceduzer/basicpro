<?php 

namespace App\Models;

class Gallery {
    public function findOne(){
        return [
            'id' => 1,
            'author_id' => 1,
            'author' => "author1",
            'title' => 'post title',
            'body' => 'text'
        ];
    }
    public function findAll(){
        return [
            [
                'id' => 1,
                'author_id' => 1,
                'author' => "author1",
                'title' => 'post title',
                'body' => 'text'
            ],
            [
                'id' => 2,
                'author_id' => 2,
                'author' => "author2",
                'title' => 'post title',
                'body' => 'text'
            ],
            [
                'id' => 3,
                'author_id' => 3,
                'author' => "author3",
                'title' => 'post title',
                'body' => 'text'
            ]
        ];
    }
}