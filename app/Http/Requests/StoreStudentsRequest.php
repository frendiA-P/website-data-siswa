<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentsRequest extends FormRequest
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
            'txtid' => 'required|unique:students,idstudents|min:7|max:7',
            'txtfullname' => 'required',
            'txtgender' => 'required',
            'txtemail' => 'required|email|unique:students,emailaddress',
            'txtphone' => 'required|numeric',
            'txtaddress' => 'required'
        ];
    }

    public function messages(): array
    {
    return [
        'txtid.required' => ':attribute Tidak Boleh Kosong',
        'txtid.unique' => ':attribute Sudah ada didalam tabel',
        'txtfullname.required' => ':attribute Tidak Boleh Kosong',
        'txtaddress.required' => ':attribute Tidak Boleh Kosong',
        'txtemail.required' => ':attribute Tidak Boleh Kosong',
        'txtphone.required' => ':attribute Tidak Boleh Kosong',


    ];
    }

    public function attributes(): array
{
    return [
        'txtid' => 'ID Students',
        'txtfullname' => 'Nama Lengkap',
        'txtaddress' => 'Alamat',
        'txtemail' => 'Email',
        'txtphone' => 'Nomor HP',




    ];
}
}
