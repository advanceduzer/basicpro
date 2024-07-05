<?php 

namespace App\Orm;

use PDO;

class Delete
{
    private string $tableAlias = '';
    private string|array $tableName = '';

    private PDO $connect;
    private Where $where;

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

    public function andWhere(string|array $condition): void
    {
        $this->where->andWhere($condition);
    }

    public function orWhere(string|array $condition): void
    {
        $this->where->orWhere($condition);
    }

    public function build(): string
    {
        $sql = 
        "DELETE FROM " . $this->getTableName();
        if (!empty($this->where->getWhere())) {
            $sql .= " WHERE " . $this->where->getWhere();
        }
        var_dump($sql);
        return $sql;
        

    }

    public function execute(): void
    {
       $this->connect->exec($this->build());
    }
}