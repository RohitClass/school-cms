<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User; // Add this line to import the User model

class Attendance extends Model
{

    protected $table = 'attendances';

    public function user()
    {
        return $this->belongsTo(User::class, 'studance_id'); // Fix the reference to User model
    }

}
