<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    use HasFactory;

    protected $fillable = ['marca'];

    // Relación con el modelo Teni
    public function tenis()
    {
        return $this->hasMany(Teni::class);
    }
}
