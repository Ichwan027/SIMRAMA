<?php

namespace App\Http\Requests\Master;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class GuruRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Validation rules.
     */
    public function rules(): array
    {
        $guru = $this->route('guru');

        return [

            'nama' => [
                'required',
                'string',
                'max:150',
            ],

            'jabatan' => [
                'required',
                'string',
                'max:100',
            ],

            'jenis_kelamin' => [
                'required',
                Rule::in([
                    'Laki-laki',
                    'Perempuan',
                ]),
            ],

            'tempat_lahir' => [
                'nullable',
                'string',
                'max:100',
            ],

            'tanggal_lahir' => [
                'nullable',
                'date',
            ],

            'alamat' => [
                'nullable',
                'string',
            ],

            'telepon' => [
                'nullable',
                'string',
                'max:20',
            ],

            'email' => [
                'nullable',
                'email',
                Rule::unique('gurus', 'email')->ignore($guru),
            ],

            'foto' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],

            'status' => [
                'required',
                'boolean',
            ],

        ];
    }

    /**
     * Custom attributes.
     */
    public function attributes(): array
    {
        return [

            'nama'            => 'Nama Guru',
            'jabatan'         => 'Jabatan',
            'jenis_kelamin'   => 'Jenis Kelamin',
            'tempat_lahir'    => 'Tempat Lahir',
            'tanggal_lahir'   => 'Tanggal Lahir',
            'alamat'          => 'Alamat',
            'telepon'         => 'Nomor Telepon',
            'email'           => 'Email',
            'foto'            => 'Foto',
            'status'          => 'Status',

        ];
    }

    /**
     * Custom messages.
     */
    public function messages(): array
    {
        return [

            'required' => ':attribute wajib diisi.',

            'email.email' => 'Format email tidak valid.',

            'image' => 'File harus berupa gambar.',

            'mimes' => 'Format gambar harus JPG, JPEG, PNG atau WEBP.',

            'max' => ':attribute melebihi batas maksimal.',

            'boolean' => ':attribute tidak valid.',

        ];
    }
}
