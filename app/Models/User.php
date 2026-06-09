<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'user'; // Nama tabel di Supabase
    protected $primaryKey = 'id_user'; // Primary key di Supabase

    const CREATED_AT = 'created_on';
    const UPDATED_AT = 'modified_on';

    protected $fillable = [
        'id_role', 'username', 'email', 'password', 'is_active', 'auth_id'
    ];

    protected $hidden = [
        'password',
    ];

    // Relasi ke tabel admin
    public function admin()
    {
        return $this->hasOne(Admin::class, 'id_user', 'id_user');
    }

    // Cek apakah user adalah admin
    public function isAdmin()
    {
        return $this->admin()->exists();
    }

    // Tambahkan relasi ini di dalam class User
    public function role()
    {
        return $this->belongsTo(Role::class, 'id_role', 'id_role');
    }
}