<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransactionHistory extends Model
{
    // Tentukan nama tabel
    protected $table = 'transaction_history';

    // Tentukan kolom yang bisa diisi
     // Tentukan kolom yang bisa diisi
     protected $fillable = [
        'user_id', 'transaction_type', 'name', 'email', 'phone', 
        'status_pembayaran', 'snap_token', 'order_id', 'product_name', 'product_price'
    ];

    // Tentukan kolom yang tidak bisa diisi
    // protected $guarded = ['id'];

    //  // Tentukan default value untuk status_pembayaran
    // //   // Menetapkan nilai default
    // ];

    // Pastikan timestamps diatur dengan benar
    public $timestamps = true;
}
