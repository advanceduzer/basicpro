<?php 

namespace App\Orm;

use PDO;

class Delete extends Sql
{

    public function __construct()
    {
        parent::__construct();
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