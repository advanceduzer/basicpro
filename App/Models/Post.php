<?php

namespace App\Models;

use App\Orm\Select;

class Post
{
    private Select $select;

    public function __construct()
    {
        $this->select = new Select();
    }

    public function findOne()
    {
        return [
            'id' => 1,
            'author_id' => 1,
            'author' => "author1",
            'title' => 'post title',
            'body' => 'text'
        ];
    }
    public function findAll(): ?array
    {
        //$this->select->setTableName($this->tableName);
        $this->select->setTableName('post p');
        $this->select->setField('p.id, p.author_id, u.fullName, p.title, p.body');
        $this->select->join()->inner([[
            'table' => ['u' => 'user'],
            'condition' => 'u.id = p.author_id'
        ]]);
        $this->select->andWhere([
            [
                'field' => 'p.id',
                'operator' => '>',
                'value' => 1,
            ],
            [
                'field' => 'p.author_id',
                'operator' => '=',
                'value' => 2,
            ]
        ]);


        //    $this->select->andWhere('author_id=1');
        //    $this->select->setField('author_id, COUNT(*) AS COUNT');
        //    $this->select->setGroupBy('author_id');
        //    $this->select->setOrderBy([
        //           'author_id' => 'DESC',
        //            'title' => 'ASC'
        //         ]);
        //     $this->select->setLimit($this->limit);
        //     var_dump($this->select->execute());
        return $this->select->execute();
    }
}
