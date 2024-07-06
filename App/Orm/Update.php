<?php

namespace App\Orm;

use PDO;

class Update extends Sql
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

    public function getPostContent(): array
    {
        if (is_array($this->postContent)) {
            $updateFields = [];
            foreach ($this->postContent as $key => $value) {
                $updateFields[] = "$key = '$value'";
            }
            return $updateFields;
        } else {
            return [];
        }
    }

    public function build(): string
    {
        $postContent = $this->getPostContent();
        $sql = 
        "UPDATE " . $this->getTableNameWithoutAlias() . 
        " AS " . $this->tableAlias . 
        " SET " . implode(", ", $postContent);

        if (!empty($this->where->getWhere())) {
            $sql .= " WHERE " . $this->where->getWhere();
        }
        return $sql;
    }

    public function execute(): void
    {
        $this->connect->exec($this->build());
    }
}
