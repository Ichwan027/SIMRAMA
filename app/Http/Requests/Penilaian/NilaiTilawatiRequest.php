<?php

namespace App\Http\Requests\Penilaian;

use Illuminate\Foundation\Http\FormRequest;

class NilaiTilawatiRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [

            'nilai_id' => [
                'required',
                'exists:nilais,id'
            ],

            'nilai' => [
                'required',
                'array'
            ],

            'nilai.*' => [
                'nullable',
                'numeric',
                'min:0',
                'max:100'
            ],

        ];
    }
}