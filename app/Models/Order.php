<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Carbon\Carbon;

class Order extends Model
{
    protected $fillable = [
        'name', 'phone', 'email', 'instagram', 'nama_jasa', 'date', 'time', 'durasi', 'total_price', 'bukti_pembayaran', 'status', 'unique_code','jasa_id',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($order) {
            // Generate unique code
            $order->unique_code = 'CODE Unik -' . strtoupper(Str::random(10));
        });
    }
}
