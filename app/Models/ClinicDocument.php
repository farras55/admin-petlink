<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClinicDocument extends Model
{
    protected $table = 'clinic_document';
    protected $primaryKey = 'id_document';

    const CREATED_AT = 'created_on';
    const UPDATED_AT = 'modified_on';

    protected $fillable = [
        'id_clinic', 'document_type', 'document_url', 'file_name',
        'storage_path', 'mime_type', 'file_size', 'is_active',
        'created_by', 'modified_by'
    ];

    // Relasi balik ke klinik
    public function clinic()
    {
        return $this->belongsTo(Clinic::class, 'id_clinic', 'id_clinic');
    }
}