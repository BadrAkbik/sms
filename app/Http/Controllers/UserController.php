<?php

namespace App\Http\Controllers;

use App\Traits\EmailUpdate;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{
    protected $model;
    protected $resource;


    use EmailUpdate;

    
    public function index()
    {  
        return $this->resource::collection($this->model::all());
    }

    public function show($id)
    {
        $item = $this->model::findOrFail($id);
        return new $this->resource($item);
    }

    public function storeUser($request)
    {
        return DB::transaction(function () use ($request) {
        
        $user = $this->model::create($request->safe()->all());

        event(new Registered($user));

        return $user->createToken($request->device_name)->plainTextToken;   
        });
    }

   
    public function updateUser($item, $request)
    {
        return DB::transaction(function () use ($item, $request) {

            $item->update($request->safe()->all());

            $this->emailVerificationReset($item);

            return new $this->resource($item);

        });
    }

   
    public function destroy($id)
    {
        $item = $this->model::findOrFail($id);
        
        $item->delete();

        return response()->json([
            'data' => 'This Item has been deleted successfuly'
        ]);
    }
}
