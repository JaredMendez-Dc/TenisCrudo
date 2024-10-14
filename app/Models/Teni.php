<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teni extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'color',
        'talla',
        'costo',
        'marca_id',
        'categoria',
    ];

    public function marca()
    {
        return $this->belongsTo(Marca::class);
    }
}
