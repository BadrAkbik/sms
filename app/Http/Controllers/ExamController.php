<?php

namespace App\Http\Controllers;

use App\Classes\ExamFilters;
use App\Http\Controllers\BaseControllers\GeneralController;
use App\Http\Requests\Store\StoreExamRequest;
use App\Http\Requests\Update\UpdateExamRequest;
use App\Http\Resources\Collections\ExamCollcetion;
use App\Http\Resources\ExamResource;
use App\Models\Exam;

class ExamController extends GeneralController
{
    protected $model = Exam::class;
    protected $resource = ExamResource::class;
    
    public function store(StoreExamRequest $request)
    {
        return parent::storeItem($request);
    }
    
    public function update(UpdateExamRequest $request, Exam $exam)
    {
        return parent::updateItem($request, $exam);
    }

    public function index(ExamFilters $filters)
    {
        return new ExamCollcetion(Exam::with('subject')->filter($filters)->get());
    }
}
