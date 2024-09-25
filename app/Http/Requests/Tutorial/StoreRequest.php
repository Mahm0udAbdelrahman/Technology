<?php

namespace App\Http\Requests\Tutorial;

use Illuminate\Foundation\Http\FormRequest;

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
            'title' => 'required|string|max:256',
            'content' => 'required|string|max:1000',
            'image' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:1000',
            'video' => 'nullable|file|mimetypes:video/mp4',
         ];
    }
}
