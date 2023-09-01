<?php

namespace App\Http\Controllers;

use App\Classes\SubjectsFilters;
use App\Http\Controllers\BaseControllers\GeneralController;
use App\Http\Requests\Store\StoreSubjectRequest;
use App\Http\Requests\Update\UpdateSubjectRequest;
use App\Http\Resources\Collections\SubjectCollcetion;
use App\Http\Resources\SubjectResource;
use App\Models\Subject;

class SubjectController extends GeneralController
{
    protected $model = Subject::class;
    protected $resource = SubjectResource::class;
    
    
    public function store(StoreSubjectRequest $request)
    {
        return parent::storeItem($request);
    }
    
    public function update(UpdateSubjectRequest $request, Subject $subject)
    {
        return parent::updateItem($request, $subject);
    }

    public function index(SubjectsFilters $filters)
    {
        return new SubjectCollcetion(Subject::filter($filters)->get());
    }
}
