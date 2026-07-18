<?php

namespace App\Http\Requests\Akademik;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class GuruMengajarRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $id = $this->route('guru_mengajar');

        return [

            'guru_id' => [
                'required',
                'exists:gurus,id',
            ],

            'kelas_id' => [
                'required',
                'exists:kelas,id',
            ],

            'mapel_id' => [
                'required',
                'exists:mapels,id',
            ],

            'tahun_ajaran_id' => [
                'required',
                'exists:tahun_ajarans,id',
            ],

            'semester_id' => [

                'required',

                'exists:semesters,id',

                \Illuminate\Validation\Rule::unique('guru_mengajars')
                    ->ignore($id)
                    ->where(function ($query) {

                        return $query

                            ->where('guru_id', request('guru_id'))

                            ->where('kelas_id', request('kelas_id'))

                            ->where('mapel_id', request('mapel_id'))

                            ->where('tahun_ajaran_id', request('tahun_ajaran_id'));
                    }),

            ],

        ];
    }

    public function messages(): array
    {
        return [

            'guru_id.required' => 'Guru wajib dipilih.',

            'kelas_id.required' => 'Kelas wajib dipilih.',

            'mapel_id.required' => 'Mapel wajib dipilih.',

            'tahun_ajaran_id.required' => 'Tahun ajaran wajib dipilih.',

            'semester_id.required' => 'Semester wajib dipilih.',

            'semester_id.unique' =>
            'Guru sudah mengajar mapel tersebut pada kelas, semester dan tahun ajaran yang sama.',

        ];
    }
}
