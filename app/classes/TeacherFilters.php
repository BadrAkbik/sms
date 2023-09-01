<?php

namespace App\Classes;

class TeacherFilters extends QueryFilter
{
    public function subject($name)
    {
        return $this->query->whereRelation('subjects', 'name', $name);
    }

    public function section($name)
    {
        return $this->query->whereRelation('sections', 'name', $name);
    }
}
