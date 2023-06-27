<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Traits\AuthRoles;
use Illuminate\Http\Request;


class TokenAuthController extends Controller
{
    use AuthRoles;

    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $user = $this->getRoleModel($request)::where('email', $request->email)->first();

        return $user->createToken($request->device_name)->plainTextToken;
    }

    public function destroy(Request $request)
    {
        $request->user()->tokens()->delete();
    }
}
