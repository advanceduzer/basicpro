<?php

namespace App\Orm;

class Join
{
    private array $conditions = [];
    
    public function inner(string|array $input): void
    {
        $this->processor($input, 'INNER');
    }

    public function left(string|array $input): void
    {
        $this->conditions .= 'LEFT JOIN'. $input.' ';
    }
    public function right(string|array $input): void
    {
        $this->conditions .= 'RIGHT JOIN'. $input.' ';
    }

    public function processor(string|array $input, string $joinType): void
    {
        if (is_array($input)) {
            $inputItem =[];
            foreach ($input as $inputChild) {
                $alias = key($inputChild['table']);
                $tableName = $inputChild['table'][$alias];
                $inputItem[] = $tableName . ' ' . $alias . ' ON ' . $inputChild['condition'];
            }
            $this->conditions[] = $joinType. ' JOIN '. implode(" AND ", $inputItem);

        } else {
            $this->conditions[] = $joinType. ' JOIN '. $input;
        }

    }
    public function getJoin(): string
    {
        return implode(' ', $this->conditions);
    }

}