<?php

namespace App\Http\Controllers;

use App\Http\Requests\Store\StoreSectionRequest;
use App\Http\Requests\Update\UpdateSectionRequest;
use App\Http\Resources\SectionResource;
use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function index()
    {
        return SectionResource::collection(Section::all());
    }


    public function store(StoreSectionRequest $request)
    {
        return new SectionResource(Section::create($request->safe()->all()));
    }


    public function show(Section $section)
    {
        return new SectionResource($section);
    }


    public function update(UpdateSectionRequest $request, Section $section)
    {
        $section->update($request->safe()->all());
        return new SectionResource($section);
    }


    public function destroy(Section $section)
    {
        $section->delete();

        return response()->json([
            'data' => 'This Section has been deleted successfuly'
        ]);
    }
}
