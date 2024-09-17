<?php

namespace App\Http\Requests\UserGuide;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreRequest extends FormRequest
{
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */

public function rules(): array
{
    return [
        'key' => [
            'required',
            'string',
            'max:255',
            Rule::unique('user_guides', 'key')->ignore($this->route('user_guide')), // Adjust 'user_guide' as per your route model binding
        ],
        'value' => 'required|string',
        'sup_menu_id' => 'nullable',
    ];
}

}
