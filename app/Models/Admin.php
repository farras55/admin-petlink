<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = 'admin';
    protected $primaryKey = 'id_admin';

    const CREATED_AT = 'created_on';
    const UPDATED_AT = 'modified_on';

    protected $fillable = [
        'id_user', 'name', 'is_active', 'created_by', 'modified_by'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }
}