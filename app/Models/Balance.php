<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Balance extends Model
{
    use HasFactory;

    protected $fillable = [
        'balance',
    ];

    public function movements()
    {
        return $this->hasMany(Movement::class);
    }
}
