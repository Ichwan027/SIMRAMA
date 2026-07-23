<?php

namespace App\Http\Requests\Master;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TilawatiRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [

            'nama' => [

                'required',

                'string',

                'max:100',

                Rule::unique('tilawatis')
                    ->ignore($this->route('tilawati')),

            ],

            'urutan' => [

                'required',

                'integer',

                'min:1',

            ],

            'status' => [

                'required',

                'boolean',

            ],

        ];
    }

    public function messages(): array
    {
        return [

            'nama.required' => 'Nama Tilawati wajib diisi.',

            'nama.unique' => 'Nama Tilawati sudah digunakan.',

            'urutan.required' => 'Urutan wajib diisi.',

        ];
    }
}