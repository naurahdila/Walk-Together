<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts'; // Nama tabel di database
    protected $fillable = ['SENDER', 'MESSAGE_TEXT', 'MESSAGE_GAMBAR', 'CREATE_DATE'];

    public function comments()
    {
        return $this->hasMany(Comment::class, 'POSTING_ID');
    }

    public function likes()
    {
        return $this->hasMany(Like::class, 'POSTING_ID');
    }
}