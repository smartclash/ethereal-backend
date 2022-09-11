<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'college',
        'course',
        'passing'
    ];

    protected $casts = [
        'passing' => 'integer'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
