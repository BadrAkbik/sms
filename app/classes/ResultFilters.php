<?php

namespace App\Classes;

class ResultFilters extends QueryFilter
{
    public function student($name)
    {
        return $this->query->whereRelation('student', 'name', 'like', '%' . $name . '%');
    }
}
