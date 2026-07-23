<?php

namespace App\Http\Requests\Master;

use Illuminate\Foundation\Http\FormRequest;

class SemesterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $id = $this->route('semester');

        return [

            'nama' => 'required|string|max:20|unique:semesters,nama,' . $id,

            'urutan' => 'required|integer|min:1',

            'aktif' => 'required|boolean',

        ];
    }
}