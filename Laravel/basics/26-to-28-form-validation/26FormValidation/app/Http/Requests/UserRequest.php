<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use illuminate\Support\Str;

class UserRequest extends FormRequest
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
            "userName" => "required",
            "userEmail" => "required|email",
            "userAge" => "required|integer|min:18",
            "userCity" => "required"
        ];
    }

    public function messages(){
        return [
            "userName.required" => "Please fill :attribute!",
            "userEmail.required" => "Please fill :attribute!",
            "userEmail.email" => "Please enter correct :attribute!",
            "userAge.required" => "Please Fill your :attribute!",
            "userAge.integer" => "Please fill correct :attribute number!",
            "userAge.min" => "Minimum :attribute 18 years required!",
            "userCity.required" => ":attribute field is required!"
        ];
    }

    public function attributes(){
        return [
            "userName" => "User Name",
            "userEmail" => "E-Mail",
            "userAge" => "Age",
            "userCity" => "City",
        ];
    }

    protected function prepareForValidation(){
        $this->merge([
            // "userName" => strtoupper($this->userName)
            "userName" => Str::slug($this->userName),
        ]);
    }

    protected $stopOnFirstFailure = true;
}
