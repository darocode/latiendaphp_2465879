<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    //relacionar producto con marca
    public function marca(){
        return $this->belongsTo(Marca::class);
    }

    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }
}