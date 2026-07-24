<?php

namespace App\Http\Requests\Master;

use Illuminate\Foundation\Http\FormRequest;

class TahfidzRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $id = $this->route('tahfidz');

        return [
            'nama'   => 'required|string|max:150|unique:tahfidzs,nama,' . $id,
            'urutan' => 'required|integer|min:1',
            'aktif'  => 'required|boolean',
        ];
    }
}
