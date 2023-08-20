<?php

namespace App\Classes;

use Illuminate\Support\Facades\DB;

class StudentFilters extends QueryFilter
{
    public function search($search)
    {
        return $this->query->where('name', 'like', '%' . $search . '%');
    }

    public function grade($grade)
    {
        return $this->query->whereRelation('grade', 'name', $grade);
    }

    public function section($section)
    {
        return $this->query->whereRelation('section', 'name', $section);
    }
}
