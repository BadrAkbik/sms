<?php

namespace App\Classes;

class OutcomeFilters extends QueryFilter
{
    public function subject($name)
    {
        return $this->query->whereRelation('subject', 'name', $name);
    }

    public function student($name)
    {
        return $this->query->whereRelation('student', 'name', 'like', '%' . $name . '%');
    }
}
