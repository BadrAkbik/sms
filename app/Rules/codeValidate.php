<?php

namespace App\Rules;

use App\Traits\AuthRoles;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class codeValidate implements ValidationRule
{
    use AuthRoles;

    public $user;

    public $model;

    public function __construct($user, $model)
    {
        $this->user = $user;  
        $this->model = $model;
    }

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        
        $resetCode = $this->model::firstWhere(['code' => $value, 'email' => $this->user->email]);

        if(! $resetCode){
            $fail('The code you entered is invalid.');
            return;
        }

        if ($resetCode->created_at->addHour() < now()) {
            $resetCode->delete();
            $fail('The code you entered is expired.');
            return;
        }
    }
}
