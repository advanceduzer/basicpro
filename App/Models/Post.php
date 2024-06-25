<?php

namespace App\Models;

use App\Orm\Select;

class Post
{
    protected $tableName = 'post';
    //     protected $orderBy = 'author_id DESC';
    //     protected $groupBy = 'author_id';
    //    protected $limit = '1,2';

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
        $this->select->setTableName($this->tableName);
        // $this->select->andWhere('id=1');
        $this->select->andWhere('author_id=2');
        //     $this->select->setField('author_id, COUNT(*) AS COUNT');
        //    $this->select->setGroupBy('author_id');
        //     $this->select->setOrderBy([
        //         'author_id' => 'DESC',
        //         'title' => 'ASC'
        //     ]);
        //    $this->select->setLimit($this->limit);
        //    var_dump($this->select->execute());
        return $this->select->execute();
    }
}
