<?php

namespace App\Classes;

class AttendanceFilters extends QueryFilter
{
    public function date($date)
    {
        return $this->query->where('date', $date);
    }
}
