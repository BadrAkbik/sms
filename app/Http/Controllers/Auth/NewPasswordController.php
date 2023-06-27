<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\NewPasswordRequest;
use App\Models\PasswordResetCode;
use App\Traits\AuthRoles;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\JsonResponse;


class NewPasswordController extends Controller
{

    use AuthRoles;
    /**
     * Handle an incoming new password request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(NewPasswordRequest $request): JsonResponse
    {
        $resetCode = PasswordResetCode::firstWhere(['code' => $request->code, 'email' => $request->email]);

        $user = $request->modelName::firstWhere('email', $request->email);

        $user->update($request->safe()->only('password'));

        $resetCode->delete();

        event(new PasswordReset($user));

        return response()->json(['message' =>'password has been successfully reseted'], 200);
    }
}
