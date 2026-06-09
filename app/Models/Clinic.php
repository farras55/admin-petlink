<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Clinic extends Model
{
    protected $table = 'clinic';
    protected $primaryKey = 'id_clinic';

    const CREATED_AT = 'created_on';
    const UPDATED_AT = 'modified_on';

    protected $fillable = [
        'id_user', 'name', 'phone', 'address', 'latitude', 'longitude',
        'operational_hours', 'home_service_radius_km', 'status_verification',
        'profile_picture', 'description', 'is_active', 'created_by', 'modified_by',
        'reviewed_by', 'reviewed_on', 'rejection_reason'
    ];

    // Relasi untuk mengambil dokumen KTP, NIB, dan Foto
    public function documents()
    {
        return $this->hasMany(ClinicDocument::class, 'id_clinic', 'id_clinic');
    }
}