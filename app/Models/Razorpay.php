<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Razorpay extends Model
{
    use HasFactory;

    protected $fillable = [
        'paid',
        'order',
        'razorpay',
        'customer',
    ];

    protected $casts = [
        'paid' => 'boolean'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
