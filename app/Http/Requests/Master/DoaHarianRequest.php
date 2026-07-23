<?php

namespace App\Http\Requests\Master;

use Illuminate\Foundation\Http\FormRequest;

class DoaHarianRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $id = $this->route('doa_harian');

        return [

            'nama'   => 'required|string|max:150|unique:doa_harians,nama,' . $id,

            'urutan' => 'required|integer|min:1',

            'aktif'  => 'required|boolean',

        ];
    }
}
