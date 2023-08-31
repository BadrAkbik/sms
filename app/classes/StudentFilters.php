<?php

namespace App\Classes;

class StudentFilters extends QueryFilter
{
    public function name($name)
    {
        return $this->query->where('name', 'like', '%' . $name . '%');
    }

    public function grade($grade)
    {
        return $this->query->whereRelation('grade', 'name', $grade);
    }

    public function section($section)
    {
        return $this->query->whereRelation('section', 'name', $section);
    }

    public function failure($subjectCount)
    {
        return $this->query->whereHas('results', function ($query) {
            $query->whereHas(
                'subject',
                fn ($query) =>
                $query->whereColumn('results.mark', '<', 'subjects.min_mark')
            );
        }, '>=', $subjectCount);
    }

    public function absence($absenceCount)
    {
        return $this->query->whereRelation('attendances', 'status', false, '>=', $absenceCount);
    }

    public function mother($name)
    {
        return $this->query->whereHas(
            'mother',
            fn ($query) =>
            $query->where('name', 'like', '%' . $name . '%')
        );
    }

    public function father($name)
    {
        return $this->query->whereHas(
            'father',
            fn ($query) =>
            $query->where('name', 'like', '%' . $name . '%')
        );
    }

    public function hasRemainingPayment()
    {
        return $this->query->whereHas(
            'accountments',
            fn ($query) =>
            $query->whereColumn('payments', '<', 'total')
        );
    }

    public function payed($amount)
    {
        return $this->query->whereRelation('accountments', 'payments', '>=', $amount);
    }

    public function outcome($subject)
    {
        return $this->query->whereHas(
            'outcomes',
            fn ($query) =>
            $query->whereHas('subject', fn ($query) => $query->where('name', $subject))
        );
    }
}
