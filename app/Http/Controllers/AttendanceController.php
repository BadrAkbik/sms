<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseControllers\GeneralController;
use App\Http\Requests\Store\StoreAttendanceRequest;
use App\Http\Requests\Update\UpdateAttendanceRequest;
use App\Http\Resources\AttendanceResource;
use App\Http\Resources\Collections\AttendanceCollection;
use App\Models\Attendance;

class AttendanceController extends GeneralController
{
    protected $model = Attendance::class;
    protected $resource = AttendanceResource::class;
    
    public function store(StoreAttendanceRequest $request)
    {
        return parent::storeItem($request);
    }
    
    public function update(UpdateAttendanceRequest $request, Attendance $attendance)
    {
        return parent::updateItem($request, $attendance);
    }

    public function index()
    {
        return new AttendanceCollection(Attendance::with('student')->get());
    }
}
