<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    public function leader()
    {
        return $this->belongsTo(User::class);
    }

    public function participants()
    {
        return $this->hasMany(User::class);
    }
}
