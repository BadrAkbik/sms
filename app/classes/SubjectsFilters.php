<?php

namespace App\Classes;

class SubjectsFilters extends QueryFilter
{
    public function teacher($name)
    {
        return $this->query->whereRelation('teachers', 'name', 'like', '%' . $name . '%');
    }

    public function grade($name)
    {
        return $this->query->whereRelation('grade', 'name', $name);
    }

    public function exam($type)
    {
        return $this->query->whereRelation('exams', 'type', $type);
    }
}
