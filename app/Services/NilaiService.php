<?php

namespace App\Services;

use App\Core\Repositories\NilaiRepository;
use Illuminate\Database\Eloquent\Model;
use App\Services\BaseService;

class NilaiService extends BaseService
{
    public function __construct(
        NilaiRepository $repository
    ) {
        $this->repository = $repository;
    }

    public function create(array $data): Model
    {
        $data['nomor_raport'] = $this->generateNomorRaport($data);

        return parent::create($data);
    }

    private function generateNomorRaport(array $data): string
    {
        $semester = \App\Models\Semester::findOrFail($data['semester_id']);

        $santri = \App\Models\Santri::with('kelas')
            ->findOrFail($data['santri_id']);

        $tahun = \App\Models\TahunAjaran::findOrFail($data['tahun_ajaran_id']);

        $semesterKode = strtoupper($semester->nama);

        $kelas = strtoupper(
            str_replace(' ', '', $santri->kelas->nama)
        );

        $tahun2Digit = substr($tahun->tahun, 2, 2);

        $last = \App\Models\Nilai::count() + 1;

        return sprintf(
            'RPT-%s-%s-%s-%04d',
            $semesterKode,
            $kelas,
            $tahun2Digit,
            $last
        );
    }
}
