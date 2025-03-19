<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VirtualAccount extends Model
{
    use HasFactory;

    protected $table = 'virtual_accounts';

    protected $fillable = [
        'user_id',
        'accountNo',
        'accountName',
        'bankName',
        'status',
    ];
}
