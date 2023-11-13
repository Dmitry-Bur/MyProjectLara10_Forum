<?php

namespace App\Http\Requests\Branch;

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
            'title' => 'required|string',
            'section_id' => 'required|integer|exists:sections,id',
            'parent_id' => 'nullable|integer|exists:branches,id',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Поле title необходимо заполнить',
            'section_id.required' => 'Поле section_id необходимо заполнить',
            'title.string' => 'Поле title должна быть строкой',
            'section_id.integer' => 'Поле section_id должна быть целым числом',
            'section_id.exists:sections,id' => 'Поле section_id должна пренадлежать существующему разделу',
        ];
    }
}
