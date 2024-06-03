<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;

    // Define the one-to-one relationship with User
    public function user()
    {
        return $this->hasOne(User::class);
    }
}
