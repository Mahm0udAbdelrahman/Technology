<?php

namespace App\Http\Requests\Chart;

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
            'charts' => 'required|array',  
            'charts.*.type' => 'required|string|max:255',
            'charts.*.title' => 'nullable|string|max:255',
            'charts.*.text' => 'nullable|string|max:1000',
            'charts.*.series' => 'required|array',
            'charts.*.series.*.name' => 'string|max:255',
            'charts.*.series.*.data' => 'required|max:255',
            'charts.*.categories' => 'required|array',
            'charts.*.categories.*' => 'string|max:255',
            'charts.*.real_time' => 'required|boolean',
            'charts.*.data_insight_id' => 'nullable',
        ];
    }
}
