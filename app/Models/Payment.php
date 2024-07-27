<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;


    protected $guarded;


    function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }


    function invoice()
    {
        return $this->belongsTo(InvoiceSummary::class, 'invoice_id');
    }

    function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
