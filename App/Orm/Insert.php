<?php 

namespace App\Orm;

use PDO;


class Insert
{
    private string $tableAlias = '';
    private PDO $connect;
    private Where $where;
    private array $postContent;

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
        }
        $this->where->setTableAlias($this->tableAlias);

    }

    public function setPostContent($postContent): void
    {
        $this->postContent = $postContent;
    }

    public function getPostContent()
    {
        if (is_array($this->postContent)) {
            unset($this->postContent['submit']);
            
            $keys = array_keys($this->postContent);
            $values = array_values($this->postContent);
            
            $cols = implode(", ", $keys);
            $vals = "'" . implode("', '", $values) . "'";
            
            return ['cols' => $cols, 'vals' => $vals];
            
        } else {
            return $this->postContent;
        }
    }






    public function build(): string
    {
        $postContent = $this->getPostContent();

        $sql = 
        "INSERT INTO " . $this->getTableName(). " (" . $postContent['cols'] . ") VALUES (" . $postContent['vals'] . ");";
        var_dump($sql);
        return $sql;
        

    }

    public function execute(): void
    {
        $this->connect->exec($this->build());

    }


}