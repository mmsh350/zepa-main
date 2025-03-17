<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VNIN_TO_NIBSS extends Model
{
    use HasFactory;

    protected $table = 'vnin_to_nibss';

    protected $fillable = [
        'user_id',
        'tnx_id',
        'refno',
        'requestId',
        'nin_number',
        'bvn_number',
    ];
}
