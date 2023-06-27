<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\EmailVerificationRequest;
use App\Models\EmailVerificationCode;
use App\Traits\AuthRoles;
use Illuminate\Auth\Events\Verified;

class VerifyEmailController extends Controller
{

    use AuthRoles;
    public function __invoke(EmailVerificationRequest $request)
    {

        $resetCode = EmailVerificationCode::firstWhere(['code' => $request->code, 'email' => $request->user()->email]);

        if ($request->user()->markEmailAsVerified()) {
            event(new Verified($request->user()));
        }

        $resetCode->delete();

        return response()->json([
            'message' => 'Email successfuly Verified'
        ]);
    }
}
