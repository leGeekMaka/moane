<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movement extends Model
{
    use HasFactory;

    const MOVEMENT_TYPE = [
        'deposit',
        'withdrawn'
    ];
    protected $fillable = [
        'movement_type',
        'label',
        'amount',
        'balance_id',
        'operation_id',
        'transaction_id',
        'user_id',
    ];

    public function operation()
    {
        return $this->belongsTo(Operations::class);
    }

    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }

    public function balance()
    {
        return $this->belongsTo(Balance::class);
    }

}
