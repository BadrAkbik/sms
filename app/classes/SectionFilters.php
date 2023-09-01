<?php

namespace App\Classes;

class SectionFilters extends QueryFilter
{
    public function teacher($name)
    {
        return $this->query->whereRelation('teachers', 'name', 'like', '%' . $name . '%');
    }
}
