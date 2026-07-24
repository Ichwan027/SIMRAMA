<?php

namespace App\Services;

use App\Core\Repositories\UserRepository;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService extends BaseService
{
    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Simpan user baru.
     */
    public function create(array $data): User
    {
        $data['password'] = Hash::make($data['password']);

        return $this->repository->create($data);
    }

    /**
     * Update user.
     */
    public function update(int $id, array $data): User
    {
        // Jika password dikosongkan, jangan diubah
        if (empty($data['password'])) {
            unset($data['password']);
        } else {
            $data['password'] = Hash::make($data['password']);
        }

        return $this->repository->update($id, $data);
    }
}
