<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseControllers\GeneralController;
use App\Http\Requests\Store\StoreSectionRequest;
use App\Http\Requests\Update\UpdateSectionRequest;
use App\Http\Resources\Collections\SectionCollcetion;
use App\Http\Resources\SectionResource;
use App\Models\Section;

class SectionController extends GeneralController
{
    protected $model = Section::class;
    protected $resource = SectionResource::class;
    
    
    public function store(StoreSectionRequest $request)
    {
        return parent::storeItem($request);
    }
    
    public function update(UpdateSectionRequest $request, Section $section)
    {
        return parent::updateItem($request, $section);
    }
    
    public function index()
    {
        return new SectionCollcetion(Section::all());
    }
}
