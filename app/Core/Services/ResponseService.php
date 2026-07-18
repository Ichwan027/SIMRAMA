<?php

namespace App\Core\Services;

class ResponseService
{
    public static function success(
        string $message = 'Data berhasil disimpan.'
    ) {
        return redirect()
            ->back()
            ->with('success', $message);
    }

    public static function error(
        string $message = 'Terjadi kesalahan.'
    ) {
        return redirect()
            ->back()
            ->with('error', $message);
    }
}
