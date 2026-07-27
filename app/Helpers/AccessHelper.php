<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Auth;

class AccessHelper
{
    /**
     * User yang sedang login
     */
    public static function user()
    {
        return Auth::user();
    }

    /**
     * Admin atau Kepala Madrasah
     */
    public static function isSuperUser(): bool
    {
        $user = self::user();

        if (!$user) {
            return false;
        }

        return $user->isAdmin() || $user->isKepalaMadrasah();
    }

    /**
     * Ustadz
     */
    public static function isUstadz(): bool
    {
        $user = self::user();

        return $user && $user->isUstadz();
    }

    /**
     * ID kelas yang menjadi wali
     */
    public static function kelasId(): ?int
    {
        $user = self::user();

        return $user?->guru?->kelasWali?->id;
    }

    /**
     * ID guru login
     */
    public static function guruId(): ?int
    {
        $user = self::user();

        return $user?->guru?->id;
    }
}
