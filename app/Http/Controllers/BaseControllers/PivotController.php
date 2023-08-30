<?php

namespace App\Http\Controllers\BaseControllers;

use App\Http\Controllers\Controller;


class PivotController extends Controller
{

    protected $firstModelName;
    protected $secondModelName;
    protected $firstModelId;
    protected $secondModelId;
    protected $modelRelation;
    protected $firstModel;
    protected $secondModel;

    public function __construct()
    {
        $this->firstModelId = $this->firstModelName . '_id';
        $this->secondModelId = $this->secondModelName . '_id';
        $this->modelRelation = $this->secondModelName . 's';
        $this->firstModel = 'App\Models\\' . $this->firstModelName;
        $this->secondModel = 'App\Models\\' . $this->secondModelName;
    }

    public function attach($request)
    {
        $item = $this->firstModel::FindOrFail($request->{$this->firstModelId});
        $item->{$this->modelRelation}()->attach($request->{$this->secondModelId});
    }

    public function destroy($firstModelId, $secondModelId)
    {
        $firstItem = $this->firstModel::FindOrFail($firstModelId);
        $secondItem = $this->secondModel::FindOrFail($secondModelId);
        $firstItem->{$this->modelRelation}()->detach($secondItem);
    }
}
