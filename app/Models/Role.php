<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'role';
    protected $primaryKey = 'id_role';
    public $timestamps = false; // Jika tabel role tidak punya created_at/updated_at

    // Relasi ke User
    public function users()
    {
        return $this->hasMany(User::class, 'id_role', 'id_role');
    }
}