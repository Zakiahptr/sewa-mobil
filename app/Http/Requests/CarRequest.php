<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarRequest extends FormRequest
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
            'merk' => ['required'],
            'model' => ['required'],
            'plat' => ['required'],
            'price' => ['required', 'numeric'],
        ];

        if ($this->isMethod('post')) {
            $validation['img'] = ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2000'];
        }

        if (!$this->isMethod('post')) {
            $validation['img'] = ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2000'];
        }

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
            'merk.required' => 'merek mobil tidak boleh kosong',
            'model.required' => 'model mobil tidak boleh kosong',
            'plat.required' => 'no. plat mobil tidak boleh kosong',
            'price.required' => 'harga sewa tidak boleh kosong',
            'price.numeric' => 'harga harus berupa angka',
            'img.required' => 'gambar artikel tidak boleh kosong',
            'img.max' => 'ukuran gambar harus dibawah 2mb',
        ];
    }
}
