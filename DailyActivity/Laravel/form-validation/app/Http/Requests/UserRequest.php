<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
            'name' => 'required|min:5|max:20',
            'email' => 'required|email',
            'age' => [
                'required',
                'numeric',
                function ($attribute, $value, $fail) {
                    if ($value <= 0) {
                        $fail($attribute . " must be a positive number.");
                    }
                }
            ],
            'city' => 'required|string'
        ];
    }

    // public function messages()
    // {
    //     return [
    //         'name.required' => 'Name is required',
    //         'name.min' => 'Name must be at least 5 characters',
    //         'name.max' => 'Name must not exceed 20 characters',
    //         'email.required' => 'Email is required',
    //         'email.email' => 'Email must be a valid email address',
    //         'age.required' => 'Age is required',
    //         'age.numeric' => 'Age must be a number',
    //         'city.required' => 'City is required',
    //         'city.string' => 'City must be a string',
    //     ];
    // }   

    public function attributes()
    {
        return [
            'name' => 'Full Name',
            'email' => 'Email Address',
            'age' => 'User Age',
            'city' => 'User City',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'name' => trim($this->name),
            'email' => strtolower($this->email),
            'city' => ucwords(strtolower($this->city)),
        ]);
    }

    protected $stopOnFirstFailure = true;

}
