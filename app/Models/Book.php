<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'author', 'content', 'cover', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
