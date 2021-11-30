<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operations extends Model
{
    use HasFactory;
    
    protected $fillable=['libelle','operation_type'];

    public function movements()
    {
        return $this->hasMany(Movement::class);
    }

}
