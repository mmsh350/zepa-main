<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BonusHistory extends Model
{
    protected $fillable = [
        'user_id',
        'referred_user_id',
        'amount',
        'type',
    ];

    // Define the inverse relationship
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
