<?php 

namespace App\Models;

class Post {
    public function findOne(){
        return [
            'id' => 1,
            'login' => 1,
            'password' => "pass1",
            'email' => 'post title',
            'fullName' => 'Full Name'
        ];
    }
    public function findAll(){
        return [
            [
                'id' => 2,
                'login' => 2,
                'password' => "pass2",
                'email' => 'post title',
                'fullName' => 'Full Name'
            ],
            [
                'id' => 3,
                'login' => 3,
                'password' => "pass3",
                'email' => 'post title',
                'fullName' => 'Full Name'
            ],
            [
                'id' => 4,
                'login' => 4,
                'password' => "pass4",
                'email' => 'post title',
                'fullName' => 'Full Name'
            ]
        ];
    }
}