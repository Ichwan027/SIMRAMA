<?php

namespace App\Core\Repositories;

use App\Models\GuruMengajar;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use App\Helpers\AccessHelper;
use Illuminate\Database\Eloquent\Model;

class GuruMengajarRepository extends BaseRepository
{
    public function __construct(GuruMengajar $model)
    {
        parent::__construct($model);
    }

    /**
     * Ambil seluruh data.
     */
    public function all(): Collection
    {
        return $this->model
            ->with([
                'guru',
                'kelas',
                'mapel',
                'tahunAjaran',
                'semester'
            ])
            ->latest()
            ->get();
    }

    /**
     * Pagination.
     */
    public function paginate(int $perPage = 10): LengthAwarePaginator
    {
        $query = $this->model
            ->with([
                'guru',
                'kelas',
                'mapel',
                'tahunAjaran',
                'semester',
            ])
            ->latest();

        // Admin & Kepala Madrasah
        if (AccessHelper::isSuperUser()) {
            return $query->paginate($perPage);
        }

        // Ustadz hanya melihat data mengajarnya sendiri
        if (AccessHelper::isUstadz()) {

            $guruId = AccessHelper::guruId();

            if ($guruId) {
                $query->where('guru_id', $guruId);
            } else {
                $query->whereRaw('1 = 0');
            }
        }

        return $query->paginate($perPage);
    }

    public function find(int $id): ?Model
    {
        $data = $this->model
            ->with([
                'guru',
                'kelas',
                'mapel',
                'tahunAjaran',
                'semester',
            ])
            ->findOrFail($id);

        if (AccessHelper::isSuperUser()) {
            return $data;
        }

        if (AccessHelper::isUstadz()) {

            if ($data->guru_id != AccessHelper::guruId()) {
                abort(403, 'Anda tidak memiliki hak mengakses data ini.');
            }

            return $data;
        }

        abort(403);
    }
    
}
