<?php

namespace App\Models;

use App\Orm\Select;

class Post
{
    protected $tableName = 'post';
    protected $orderBy = 'author_id';
    protected $groupBy = 'author_id';
    protected $limit = '0,100';

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
        $this->select->setGroupBy($this->groupBy);
        $this->select->setOrderBy($this->orderBy);
        $this->select->setLimit($this->limit);
        return $this->select->execute();
    }
}
