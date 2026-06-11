<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = 'booking';
    protected $primaryKey = 'id_booking';

    // Sesuaikan dengan standar penamaan kolom kamu
    const CREATED_AT = 'created_on';
    const UPDATED_AT = 'modified_on';

    protected $guarded = []; // Atau gunakan $fillable seperti di Clinic

    // 🌟 Relasi Many-to-One balik ke tabel clinic
    public function clinic()
    {
        return $this->belongsTo(Clinic::class, 'id_clinic', 'id_clinic');
    }

    public function invoiceItems()
    {
        return $this->hasMany(BookingInvoiceItem::class, 'id_booking', 'id_booking');
    }
}