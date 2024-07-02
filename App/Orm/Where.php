<?php

namespace App\Orm;

class Where
{
    private string $conditions = '';

    public function andWhere(string|array $conditions): void
    {
        if (!empty($this->conditions)) {
            $this->conditions .= ' AND ';
        }
        if (is_array($conditions)) {
            $whereItem =[];
            foreach ($conditions as $condition) {
                $whereItem[] = $condition['field']. $condition['operator']. $condition['value'];
            }
             $this->conditions .= implode(" AND ", $whereItem);

        } else {
            $this->conditions .= $conditions;
        }
    }

    public function orWhere(string|array $condition): void
    {
        if (!empty($this->conditions)) {
            $this->conditions .= ' OR ';
        }
        if (is_array($condition)) {
            $this->conditions .= '(' . implode(' OR ', $condition) . ')';
        } else {
            $this->conditions .= $condition;
        }
    }

    public function getWhere(): string
    {
        return $this->conditions;
    }
}
