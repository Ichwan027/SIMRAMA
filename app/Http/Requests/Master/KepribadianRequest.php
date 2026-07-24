<?php

namespace App\Http\Requests\Master;

use Illuminate\Foundation\Http\FormRequest;

class KepribadianRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $id = $this->route('kepribadian');

        return [
            'nama'   => 'required|string|max:100|unique:kepribadians,nama,' . $id,
            'urutan' => 'required|integer|min:1',
            'aktif'  => 'required|boolean',
        ];
    }
}
