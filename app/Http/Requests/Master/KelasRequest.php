<?php

namespace App\Http\Requests\Master;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class KelasRequest extends FormRequest
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
            ],

            'kode' => [

                'required',

                'string',

                'max:20',

                Rule::unique('kelas')
                    ->ignore(optional($this->route('kelas'))->id),

            ],

            'wali_guru_id' => [

                'nullable',

                'exists:gurus,id',

                Rule::unique('kelas', 'wali_guru_id')
                    ->ignore(optional($this->route('kelas'))->id),

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

            'nama.required' => 'Nama kelas wajib diisi.',

            'urutan.required' => 'Urutan wajib diisi.',

            'status.required' => 'Status wajib dipilih.',

        ];
    }
}
