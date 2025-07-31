<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceSaveRequest extends FormRequest
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
            'service_category_id' => 'required|exists:service_categories,id',
            'service_description' => 'required|string|max:255',
            'service_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:100',
            'rank' => 'required|integer|min:1',
        ];
    }
}
