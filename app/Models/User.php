<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Guru;
use Spatie\Permission\Traits\HasRoles; // tambahkan ini

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Mass Assignment.
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'role',
        'status',
        'guru_id',
        'last_login_at',
    ];

    /**
     * Hidden Attributes.
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Attribute Casting.
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password'          => 'hashed',
            'status'            => 'boolean',
            'last_login_at'     => 'datetime',
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Helper Role
    |--------------------------------------------------------------------------
    */

    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    public function isKepalaMadrasah(): bool
    {
        return $this->role === 'kepala_madrasah';
    }

    public function isUstadz(): bool
    {
        return $this->role === 'ustadz';
    }

    public function guru()
    {
        return $this->belongsTo(Guru::class, 'guru_id');
    }

    public function isActive(): bool
    {
        return $this->status;
    }
}
