<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Account extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'number',
        'current_balance',
        'iban',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}

