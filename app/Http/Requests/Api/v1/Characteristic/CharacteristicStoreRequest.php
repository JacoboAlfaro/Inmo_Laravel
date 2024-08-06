<?php

namespace App\Http\Requests\Api\v1\Characteristic;

use Illuminate\Foundation\Http\FormRequest;

class CharacteristicStoreRequest extends FormRequest
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
            "name"        => "required|alpha_dash|unique:characteristics,name|min:3|max:100",
            "description" => "required|min:3|max:1000",
            "data_type"   => "required"
        ];
    }
}
