<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Eletrodomestico;

class Marca extends Model
{
    use HasFactory;

    protected $table = 'marcas';

    protected $fillable = [
        'id',
        'nome',
        'created_at',
        'updated_at',
    ];

    public function eletrodomesticos()
    {
        return $this->hasMany(Eletrodomestico::class, 'marca_id', 'id');
    }
}
