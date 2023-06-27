<?php

namespace App\Http\Requests\Auth;

use App\Models\PasswordResetCode;
use App\Rules\codeValidate;
use App\Traits\AuthRoles;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class NewPasswordRequest extends FormRequest
{

    use AuthRoles;

    public $modelName;

    function __construct(Request $request)
    {
        $this->modelName = $this->getRoleModel($request);
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(Request $request): array
    {
        return [
            'email' => ['required', 'email', Rule::exists($this->modelName)],
            'code' => ['required', 'string', new codeValidate($request, PasswordResetCode::class)],
            'role' => ['required', 'in:student,teacher,admin'],
            'password' => ['required', 'confirmed', Password::defaults()]
        ];
    }
}
