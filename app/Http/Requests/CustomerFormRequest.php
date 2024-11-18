<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerFormRequest extends FormRequest
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
            'fName'=>'required|regex:/^[a-zA-Z]+(\s[a-zA-Z]+)*$/',
            'lName'=>'required|regex:/^[a-zA-Z]+(\s[a-zA-Z]+)*$/',
            'faName'=>'required|regex:/^[a-zA-Z]+(\s[a-zA-Z]+)*$/',
            'mName'=>'required|regex:/^[a-zA-Z]+(\s[a-zA-Z]+)*$/',
            'phoneNumber'=>'required|regex:/^09[0-9]{8}$/', 
            'gender'=>'required|alpha:ascii',
            'iss'=>'required|regex:/^[0-9]{11}$/'
        ];
    }
}
