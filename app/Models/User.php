<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
<<<<<<< HEAD
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'email',
        'password',
    ];
    
=======
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];
>>>>>>> d-putra

    /**
     * The attributes that should be hidden for serialization.
     *
<<<<<<< HEAD
     * @var array<int, string>
=======
     * @var list<string>
>>>>>>> d-putra
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
<<<<<<< HEAD
    } 
    // Model User
public function role()
{
    return $this->belongsTo(Role::class);
}

=======
    }
>>>>>>> d-putra
}
