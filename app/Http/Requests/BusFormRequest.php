<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BusFormRequest extends FormRequest
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
            'numberOfBus'=>'required|numeric',
            'driverName'=>'required|alpha:ascii',
            'helpDriverName'=>'required|alpha:ascii',
            'numberOfSeats'=>'required|numeric',
            'type'=>'required|alpha:ascii'
        ];
    }
}
