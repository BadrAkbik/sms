<?php

namespace App\Http\Requests\Store\Pivot;

use App\Traits\PivotRules;
use Illuminate\Foundation\Http\FormRequest;

class StoreGradeSectionRequest extends FormRequest
{
    use PivotRules;
    /**
     * Determine if the user is authorized to make this request.
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
    public function rules(): array
    {
        return $this->gradablesStoreRules('section');
    }

    public function messages()
    {
        return $this->message('grade_id', 'section_id');
    }
}
