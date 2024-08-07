<?php 

namespace App\Orm;

use PDO;

class Insert extends Sql
{
    private array $postContent;

    public function __construct()
    {
        parent::__construct();
    }

    public function setPostContent($postContent): void
    {
        $this->postContent = $postContent;
    }

    public function getPostContent()
    {
        if (is_array($this->postContent)) {
            
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
        "INSERT INTO " . $this->getTableName(). 
        " (" . $postContent['cols'] . ") VALUES (" . $postContent['vals'] . ");";
        return $sql;
    }

    public function execute(): void
    {
        $this->connect->exec($this->build());
    }

}