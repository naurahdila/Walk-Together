<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika nama tabel tidak menggunakan plural convention
    protected $table = 'roles'; 

    // Tentukan kolom yang dapat diisi
    protected $fillable = ['name'];
}
