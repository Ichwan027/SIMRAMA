<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class UploadService
{
    /**
     * Upload file ke storage/public.
     */
    public function upload(
        UploadedFile $file,
        string $folder
    ): string {

        return $file->store($folder, 'public');
    }

    /**
     * Hapus file.
     */
    public function delete(?string $path): void
    {
        if (!$path) {
            return;
        }

        if (Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }
    }

    /**
     * Ganti file lama.
     */
    public function replace(
        UploadedFile $file,
        ?string $oldFile,
        string $folder
    ): string {

        $this->delete($oldFile);

        return $this->upload($file, $folder);
    }
}
