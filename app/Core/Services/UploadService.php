<?php

namespace App\Core\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UploadService
{
    public function upload(
        UploadedFile $file,
        string $folder
    ): string {

        $filename = Str::uuid() . '.' . $file->extension();

        $file->storeAs($folder, $filename, 'public');

        return $filename;
    }

    public function remove(
        ?string $filename,
        string $folder
    ): void {

        if (!$filename) {
            return;
        }

        Storage::disk('public')
            ->delete($folder . '/' . $filename);
    }
}
