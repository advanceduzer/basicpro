<?php

namespace App\Models;

use App\Orm\Select;
use App\Orm\Delete;
use App\Orm\Insert;

class Post
{
    private Select $select;
    private Delete $delete;
    private Insert $insert;

    public function __construct()
    {
        $this->select = new Select();
        $this->delete = new Delete();
        $this->insert = new Insert();
    }

    public function delete(int $id)
    {
        $this->delete->setTableName(['p' => 'post']);
        $this->delete->andWhere([[
                    'field' => 'id',
                    'operator' => '=',
                    'value' => $id,
                ]]);
        return $this->delete->execute();
    }


    public function insert(array $postContent)
    {
        $this->insert->setTableName('post');
        $this->insert->setPostContent( $postContent );
        return $this->insert->execute();
                    var_dump($this->insert->execute());

    }


    public function findOne(int $id)
    {
        $this->select->setTableName(['p' => 'post']);
        $this->select->setField('p.id, p.author_id, u.fullName, p.title, p.body');
        $this->select->join()->inner([[
            'table' => ['u' => 'user'],
            'condition' => 'u.id = p.author_id'
        ]]);
        $this->select->andWhere([[
                    'field' => 'id',
                    'operator' => '=',
                    'value' => $id,
                ]]);
        return $this->select->execute();
    }
    public function findAll(): ?array
    {
        $this->select->setTableName(['p' => 'post']);
        $this->select->setField('p.id, p.author_id, u.fullName, p.title, p.body');
        $this->select->join()->inner([[
            'table' => ['u' => 'user'],
            'condition' => 'u.id = p.author_id'
        ]]);

        
        // $this->select->andWhere([
        //     [
        //         'field' => 'id',
        //         'operator' => '>',
        //         'value' => 1,
        //     ],
        //     [
        //         'field' => 'author_id',
        //         'operator' => '=',
        //         'value' => 2,
        //     ]
        // ]);


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
