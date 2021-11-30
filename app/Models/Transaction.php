<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable=['libelle'];

    public function movements()
    {
        return $this->hasMany(Movement::class);
    }

}
