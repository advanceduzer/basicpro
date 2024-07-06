<?php

namespace App\Orm;

use PDO;

class Sql
{

    protected string|array $tableName = '';
    protected string $tableAlias = '';

    protected PDO $connect;
    protected Where $where;

    public function __construct()
    {
        $this->connect = (new Connect())->getConnect();
        $this->where = new Where();

    }


    public function getTableName()
    {
        return $this->tableName. ' ' . $this->tableAlias;
    }

    public function setTableName($tableName): void
    {
        if (is_array($tableName)){
            foreach ($tableName as $alias => $name){
                $this->tableAlias = $alias;
                $this->tableName = $name;
                break;
            }

        } else {
            $this->tableName = $tableName;
            $this->tableAlias = $tableName;
        }
        $this->where->setTableAlias($this->tableAlias);

    }


    public function getTableNameWithoutAlias()
    {
        return $this->tableName;
    }

    public function setTableNameWithoutAlias($tableName): void
    {
        if (is_array($tableName)) {
            foreach ($tableName as $alias => $name) {
                $this->tableAlias = $alias;
                $this->tableName = $name;
                break;
            }
        } else {
            $this->tableName = $tableName;
        }
        $this->where->setTableAlias($this->tableAlias);
    }



    public function andWhere(string|array $condition): void
    {
        $this->where->andWhere($condition);
    }

    public function orWhere(string|array $condition): void
    {
        $this->where->orWhere($condition);
    }

}