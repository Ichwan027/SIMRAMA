<?php

namespace App\Http\Requests\Master;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SantriRequest extends FormRequest
{
    /**
     * Authorize.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Rules.
     */
    public function rules(): array
    {
        $id = $this->route('santri');

        return [

            'nama' => [
                'required',
                'string',
                'max:255',
            ],

            'nomor_induk' => [
                'nullable',
                'string',
                'max:30',
            ],

            'jenis_kelamin' => [
                'required',
                Rule::in([
                    'Laki-laki',
                    'Perempuan',
                ]),
            ],

            'tempat_lahir' => [
                'required',
                'string',
                'max:100',
            ],

            'tanggal_lahir' => [
                'required',
                'date',
            ],

            'nama_wali' => [
                'nullable',
                'string',
                'max:255',
            ],

            'alamat' => [
                'required',
                'string',
            ],

            'kelas_id' => [
                'required',
                'exists:kelas,id'
            ],

            'foto' => [
                $this->isMethod('post')
                    ? 'nullable'
                    : 'sometimes',
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
     * Pesan validasi.
     */
    public function messages(): array
    {
        return [

            'nama.required' => 'Nama santri wajib diisi.',

            'jenis_kelamin.required' => 'Jenis kelamin wajib dipilih.',
            'jenis_kelamin.in:Laki-laki,Perempuan' => 'Jenis kelamin tidak valid.',

            'tanggal_lahir.required' => 'Tanggal lahir wajib diisi.',

            'alamat.required' => 'Alamat wajib diisi.',

            'kelas_id' => 'required|exists:kelas,id',

            'foto.image' => 'File harus berupa gambar.',
            'foto.max' => 'Ukuran foto maksimal 2 MB.',

            'status.required' => 'Status wajib dipilih.',
            'status.boolean' => 'Status tidak valid.',

        ];
    }
}
