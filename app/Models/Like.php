<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    protected $table = 'LIKE_ID'; // Nama tabel di database
    protected $primaryKey = 'LIKE_ID';
    public $timestamps = false;

    protected $fillable = [
        'POSTING_ID',
        'USER_ID',
        'CREATE_DATE'
    ];
}
