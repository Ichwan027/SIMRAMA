<?php

namespace App\Http\Requests\Master;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
{
    /**
     * Authorize.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Validation Rules.
     */
    public function rules(): array
    {
        $userId = $this->route('user');

        return [

            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'username' => [
                'required',
                'string',
                'max:100',
                Rule::unique('users', 'username')->ignore($userId),
            ],

            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore($userId),
            ],

            'password' => [
                $this->isMethod('post') ? 'required' : 'nullable',
                'confirmed',
                'min:8',
            ],

            'role' => [
                'required',
                Rule::in([
                    'admin',
                    'kepala_madrasah',
                    'ustadz',
                ]),
            ],

            'guru_id' => [
                Rule::requiredIf(fn() => $this->role === 'ustadz'),
                'nullable',
                'exists:gurus,id',
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

            'name.required' => 'Nama wajib diisi.',

            'username.required' => 'Username wajib diisi.',
            'username.unique' => 'Username sudah digunakan.',

            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah digunakan.',

            'password.required' => 'Password wajib diisi.',
            'password.confirmed' => 'Konfirmasi password tidak sama.',
            'password.min' => 'Password minimal 8 karakter.',

            'role.required' => 'Role wajib dipilih.',

            'guru_id.required' => 'Guru wajib dipilih.',
            'guru_id.exists'   => 'Guru tidak ditemukan.',

            'status.required' => 'Status wajib dipilih.',

        ];
    }
}
