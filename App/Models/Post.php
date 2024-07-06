<?php

namespace App\Models;

use App\Orm\Select;
use App\Orm\Delete;
use App\Orm\Insert;
use App\Orm\Update;

class Post
{
    private Select $select;
    private Delete $delete;
    private Insert $insert;
    private Update $update;

    public function __construct()
    {
        $this->select = new Select();
        $this->delete = new Delete();
        $this->insert = new Insert();
        $this->update = new Update();
    }

    public function update(int $id, array $postContent)
    {
        $this->update->setTableNameWithoutAlias(['p' => 'post']);
        $this->update->andWhere([[
                    'field' => 'id',
                    'operator' => '=',
                    'value' => $id,
                ]]);
        $this->update->setPostContent( $postContent );
        return $this->update->execute();
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
        $this->insert->setTableNameWithoutAlias('post');
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

    public function findOneUpdate(int $id)
    {
        $this->select->setTableNameWithoutAlias(['p' => 'post']);
        $this->select->setField('p.id, p.author_id, p.title, p.body');
        $this->select->andWhere([[
                    'field' => 'id',
                    'operator' => '=',
                    'value' => $id,
                ]]);
        $result = $this->select->execute();
        return $result;
    }
    

    public function findAll(): ?array
    {
        $this->select->setTableName(['p' => 'post']);
        $this->select->setField('p.id, p.author_id, u.fullName, p.title, p.body');
        $this->select->join()->inner([[
            'table' => ['u' => 'user'],
            'condition' => 'u.id = p.author_id'
        ]]);
        return $this->select->execute();
    }
}
