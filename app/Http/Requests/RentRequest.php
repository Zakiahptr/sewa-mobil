<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        $validation =
        [
            'car_id' => ['required'],
            'start' => ['required', 'date'],
            'end' => ['required', 'date', 'after:start'],
        ];
        return $validation;
    }

     /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'start.required' => 'tanggal mulai tidak boleh kosong',
            'end.required' => 'tanggal selesai tidak boleh kosong',
            'end.after' => 'tanggal selesai harus setelah tanggal mulai'
        ];
    }
}
