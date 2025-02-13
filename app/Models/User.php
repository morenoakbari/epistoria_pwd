<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    public $timestamps = true; 
    use HasFactory, Notifiable;

    protected $fillable = ['name', 'email', 'password', 'profile_picture', 'bio'];

    // Tambahkan relasi ke model Book
    public function books()
    {
        return $this->hasMany(Book::class);
    }
    
}
