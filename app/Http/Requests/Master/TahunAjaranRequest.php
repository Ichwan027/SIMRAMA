<?php

namespace App\Http\Requests\Master;

use Illuminate\Foundation\Http\FormRequest;

class TahunAjaranRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $id = $this->route('tahun_ajaran');

        return [

            'tahun' => 'required|string|max:20|unique:tahun_ajarans,tahun,' . $id,

            'urutan' => 'required|integer|min:1',

            'aktif' => 'required|boolean',

        ];
    }
}
