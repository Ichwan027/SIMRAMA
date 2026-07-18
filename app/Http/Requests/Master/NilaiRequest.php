<?php

namespace App\Http\Requests\Master;

use Illuminate\Foundation\Http\FormRequest;

class NilaiRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [

            'santri_id'=>[
                'required',
                'exists:santris,id'
            ],

            'tahun_ajaran_id'=>[
                'required',
                'exists:tahun_ajarans,id'
            ],

            'semester_id'=>[
                'required',
                'exists:semesters,id'
            ],

        ];
    }

    public function messages(): array
    {
        return [

            'santri_id.required'=>'Santri wajib dipilih.',

            'tahun_ajaran_id.required'=>'Tahun ajaran wajib dipilih.',

            'semester_id.required'=>'Semester wajib dipilih.',

        ];
    }
}