<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\PasswordResetCode;
use App\Notifications\ResetPassword;
use App\Traits\AuthRoles;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ForgotPasswordController extends Controller
{

    use AuthRoles;

    public function store(Request $request): JsonResponse
    {
        $modelName = $this->getRoleModel($request);

        $data = $request->validate([
            'email' => ['required', 'email', Rule::exists($modelName)],
            'role' => ['required', 'in:student,teacher,admin'],
        ]);

        $user = $modelName::firstWhere('email', $request->email);

        PasswordResetCode::where('email', $request->email)->delete();

        $user->notify(new ResetPassword($data));
        
        return response()->json(['message' => 'password verification code is sent to your email'], 200);
    }
}