<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Author extends Model
{
    use HasFactory;

    public function books(){
        return $this->hasMany(Book::class)->latest();
    }
}
