<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    use HasFactory;

    public $table = 'phones';

    // Define the many-to-one relationship with User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
