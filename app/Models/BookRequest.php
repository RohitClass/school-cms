<?php

namespace App\Models;

use App\Models\Book;
use App\User;
use Illuminate\Database\Eloquent\Model;

class BookRequest extends Model
{
    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function student()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
