<?php

namespace App\Orm;

use PDO;

class Select
{
    private string $tableAlias = '';
    private string|array $field = '*';
    private string|array $tableName = '';
    private string|array $groupBy = '';
    private string|array $orderBy = '';
    private string $limit = '';

    //private string $mainAlias = '';


    private PDO $connect;
    private Where $where;
    private Join $join;


    public function __construct()
    {
        $this->connect = (new Connect())->getConnect();
        $this->where = new Where();
        $this->join = new Join();
        // var_dump($this->where);
    }

    public function setField($field): void
    {
        $this->field = $field;
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

    public function setOrderBy($orderBy): void
    {
        $this->orderBy = $orderBy;
    }

    public function setGroupBy($groupBy): void
    {
        $this->groupBy = $groupBy;
    }

    public function setLimit($limit): void
    {
        $this->limit = $limit;
    }

    public function getField()
    {
        if (!is_array($this->field)) {
            return $this->field;
        }
    }

    public function getTableName()
    {
        return $this->tableName. ' ' . $this->tableAlias;
    }

    public function getOrderBy()
    {
        if (is_array($this->orderBy)) {
            $orderItem = [];
            foreach ($this->orderBy as $key => $value) {
                $orderItem[] = $key . " " . $value;
            }
            return implode(", ", $orderItem);
        } else {
            return $this->orderBy;
        }
    }

    public function getGroupBy()
    {
        if (!is_array($this->groupBy)) {
            return $this->groupBy;
        }
    }

    public function getLimit()
    {
        return $this->limit;
    }

    public function andWhere(string|array $condition): void
    {
        $this->where->andWhere($condition);
    }

    public function orWhere(string|array $condition): void
    {
        $this->where->orWhere($condition);
    }

    public function getJoin()
    {
        return $this->join->getJoin();
    }

    public function join()
    {
        return $this->join;
    }


    public function build(): string
    {
        $sql =
            "SELECT " . $this->getField() .
            " FROM " . $this->getTableName();
            
        if (!empty($this->getJoin())) {
            $sql .= " " . $this->getJoin();
        }
        if (!empty($this->where->getWhere())) {
            $sql .= " WHERE " . $this->where->getWhere();
        }

        if (!empty($this->getGroupBy())) {
            $sql .= " GROUP BY " . $this->getGroupBy();
        }
        if (!empty($this->getOrderBy())) {
            $sql .= " ORDER BY " . $this->getOrderBy();
        }
        if (!empty($this->getLimit())) {
            $sql .= " LIMIT " . $this->getLimit();
        }





        var_dump($sql);

        return $sql;
    }

    public function execute(): ?array
    {
        $result = $this->connect->query($this->build(), PDO::FETCH_ASSOC);
        return $result->fetchAll();
    }
}
