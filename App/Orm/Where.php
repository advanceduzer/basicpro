<?php

namespace App\Orm;

class Where
{
    private string $conditions = '';

    public function andWhere(string|array $condition): void
    {
        if (!empty($this->conditions)) {
            $this->conditions .= ' AND ';
        }
        if (is_array($condition)) {
            $this->conditions .= '(' . implode(' AND ', $condition) . ')';
        } else {
            $this->conditions .= $condition;
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
