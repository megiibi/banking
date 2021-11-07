<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Transaction extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'sender_id',
        'receiver_id',
        'user_id',
        'iban',
        'type',
        'amount'
    ];

    public function sender(): BelongsTo
    {
        return $this->belongsTo(Account::class, 'sender_id', 'id');
    }

    public function receiver(): BelongsTo
    {
        return $this->belongsTo(Account::class, 'receiver_id', 'id');
    }
}
