<?php

namespace App\Http\Controllers;

use App\Models\Student;

abstract class PendingUserController extends Controller
{
    protected $model;
    protected $resource;

    public function index()
    {
        return $this->resource::collection($this->model::where('is_approved', 0)->get());
    }

    public function show($id)
    {
        $item = $this->model::findOrFail($id);
        return new $this->resource($item);
    }

    public function update($id)
    {
        $item = $this->model::findOrFail($id);

        if($item->is_approved == 0) {

            $item->update(['is_approved' => 1]);
 
            return response()->json([
                'message' => "This account has been approved"
            ]);

        } else {
            return response()->json([
                'message' => "This account is already approved"
            ]);
        }
    }
}
