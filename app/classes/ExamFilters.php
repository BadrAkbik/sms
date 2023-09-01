<?php

namespace App\Classes;

class ExamFilters extends QueryFilter
{
    public function date($date)
    {
        return $this->query->where('date', $date);
    }

    public function semester($semester)
    {
        return $this->query->where('semester', $semester);
    }

    public function type($type)
    {
        return $this->query->where('type', $type);
    }

    public function subject($name)
    {
        return $this->query->whereRelation('subject', 'name', $name);
    }


}
