<?php

namespace App\Http\Controllers;

use App\Http\Requests\Store\StoreAttendanceRequest;
use App\Http\Requests\Update\UpdateAttendanceRequest;
use App\Http\Resources\AttendanceResource;
use App\Models\Attendance;

class AttendanceController extends Controller
{
    public function index()
    {
        return AttendanceResource::collection(Attendance::with('student')->get());
    }


    public function store(StoreAttendanceRequest $request)
    {
        return new AttendanceResource(Attendance::create($request->safe()->all()));
    }


    public function show(Attendance $attendance)
    {
        return new AttendanceResource($attendance);
    }


    public function update(UpdateAttendanceRequest $request, Attendance $attendance)
    {
        $attendance->update($request->safe()->all());
        return new AttendanceResource($attendance);
    }


    public function destroy(Attendance $attendance)
    {
        $attendance->delete();

        return response()->json([
            'data' => 'This student has been deleted successfuly'
        ]);
    }
}
