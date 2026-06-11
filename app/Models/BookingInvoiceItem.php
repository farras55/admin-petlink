<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookingInvoiceItem extends Model
{
    protected $table = 'booking_invoice_item';
    protected $primaryKey = 'id_item';
    
    public $timestamps = false;

    public function booking()
    {
        return $this->belongsTo(Booking::class, 'id_booking', 'id_booking');
    }
}