<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceSummary extends Model
{
    use HasFactory;

    protected $guarded;


    function items()
    {
        return $this->hasMany(Invoice::class, 'invoice_summary_id');
    }
  
    function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    function doctor()
    {
        return $this->belongsTo(User::class, 'doctor_id');
    }


    function total_paid()
    {
        return $this->hasMany(Payment::class, 'invoice_id')->sum('amount') ;
    }


}
