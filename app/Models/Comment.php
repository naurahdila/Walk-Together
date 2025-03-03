<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comments'; // Nama tabel di database
    protected $primaryKey = 'KOMEN_ID';
    public $timestamps = false;

    protected $fillable = [
        'POSTING_ID',
        'USER_ID',
        'KOMENTAR_TEXT',
        'CREATE_DATE'
    ];
}