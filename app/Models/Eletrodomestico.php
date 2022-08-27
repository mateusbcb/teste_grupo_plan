<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Marca;

class Eletrodomestico extends Model
{
    use HasFactory;

    protected $table = 'eletrodomesticos';

    protected $fillable = [
        'id',
        'nome',
        'descricao',
        'tensao',
        'marca_id',
        'preco',
        'cor',
        'created_at',
        'updated_at',
    ];

    public function marca()
    {
        return $this->belongsTo(Marca::class, 'marca_id', 'id');
    }
}
