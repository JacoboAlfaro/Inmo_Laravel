<?php

namespace App\Http\Requests\Api\v1\Property;

use Illuminate\Foundation\Http\FormRequest;

class PropertyUpdateRequest extends FormRequest
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
            "adress"        => "required|min:3|max:100",
            "price"         => "required|numeric|decimal:2",
            "user_id"       => "nullable|exists:users,id",
            "location_id"   => "required|exists:locations,id",
            "category_id"   => "required|exists:categories,id",
            "business_id"   => "required|exists:businesses,id"
        ];
    }
}
