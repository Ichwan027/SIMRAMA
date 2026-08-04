<?php

namespace App\Core\Repositories;

use App\Helpers\AccessHelper;
use App\Models\Santri;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Symfony\Component\HttpKernel\Exception\HttpException;

class SantriRepository extends BaseRepository
{
    public function __construct(Santri $santri)
    {
        parent::__construct($santri);
    }

    /**
     * Pagination sesuai hak akses user.
     */
    public function paginate(int $perPage = 10, ?string $search = null): LengthAwarePaginator
    {
        $query = $this->model
            ->with('kelas')
            ->latest();

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                    ->orWhere('nomor_induk', 'like', "%{$search}%")
                    ->orWhere('jenis_kelamin', 'like', "%{$search}%")
                    ->orWhereHas('kelas', function ($kelas) use ($search) {
                        $kelas->where('nama', 'like', "%{$search}%");
                    });
            });
        }

        // Admin & Kepala Madrasah melihat semua data
        if (AccessHelper::isSuperUser()) {
            return $query->paginate($perPage);
        }

        // Ustadz hanya melihat kelas yang diwalinya
        if (AccessHelper::isUstadz()) {

            $kelasId = AccessHelper::kelasId();

            if ($kelasId) {
                $query->where('kelas_id', $kelasId);
            } else {
                // Jika ustadz belum menjadi wali kelas
                $query->whereRaw('1 = 0');
            }
        }

        return $query->paginate($perPage);
    }

    /**
     * Ambil data berdasarkan hak akses.
     */
    public function find(int $id): ?\Illuminate\Database\Eloquent\Model
    {
        $santri = $this->model
            ->with('kelas')
            ->findOrFail($id);

        // Admin & Kepala Madrasah bebas akses
        if (AccessHelper::isSuperUser()) {
            return $santri;
        }

        // Ustadz hanya boleh mengakses kelas yang diwalinya
        if (AccessHelper::isUstadz()) {

            $kelasId = AccessHelper::kelasId();

            if ($santri->kelas_id != $kelasId) {
                abort(403, 'Anda tidak memiliki hak mengakses data ini.');
            }

            return $santri;
        }

        abort(403, 'Anda tidak memiliki hak mengakses data ini.');
    }
    
}
