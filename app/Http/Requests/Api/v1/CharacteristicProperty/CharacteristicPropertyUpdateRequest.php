<?php

namespace App\Http\Requests\Api\v1\CharacteristicProperty;

use Illuminate\Foundation\Http\FormRequest;

class CharacteristicPropertyUpdateRequest extends FormRequest
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
            "value"                 => "required|alpha_dash|max:100",
            "characteristic_id"     => "required|exists:characteristics,id",
            "property_id"           => "required|exists:properties,id"
        ];
    }
}
