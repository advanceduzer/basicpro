<?php

namespace App\Orm;

use PDO;

class Select
{
    private string|array $field = 'author_id';
    private string|array $tableName;
    private string|array $groupBy;
    private string|array $orderBy;
    private string|array $limit;


    private PDO $connect;

    public function __construct()
    {
        $this->connect = (new Connect())->getConnect();
    }

    public function setField($field): void
    {
        $this->field = $field;
    }

    public function setTableName($tableName): void
    {
        $this->tableName = $tableName;
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
        if (!is_array($this->tableName)) {
            return $this->tableName;
        }
    }

    public function getOrderBy()
    {
        if (!is_array($this->orderBy)) {
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
        if (!is_array($this->limit)) {
            return $this->limit;
        }
    }

    public function build(): string
    {
        $sql =
            "SELECT " . $this->getField() .
            ", COUNT(*) AS id" .
            " FROM " . $this->getTableName() .
            " GROUP BY " . $this->getGroupBy() .
            ", " . $this->getField() . 
            " ORDER BY " . $this->getOrderBy() .
            " LIMIT " . $this->getLimit();
    
            echo ($sql);

        return $sql;
    }

    public function execute(): ?array
    {
        $result = $this->connect->query($this->build(), PDO::FETCH_ASSOC);
        return $result->fetchAll();
    }
}
