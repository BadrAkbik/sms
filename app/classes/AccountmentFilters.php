<?php

namespace App\Classes;

class AccountmentFilters extends QueryFilter
{
    public function date($date)
    {
        return $this->query->where('date_of_payment', $date);
    }

    public function afterDate($date)
    {
        return $this->query->where('date_of_payment', '>', $date);
    }

    public function beforeDate($date)
    {
        return $this->query->where('date_of_payment', '<', $date);
    }

    public function betweenDates($dates)
    {
        $dates = explode("to", $dates);
        return $this->query->wherebetween('date_of_payment', [$dates[0], $dates[1]]);
    }
}
