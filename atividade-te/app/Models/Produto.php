<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Categoria;

class Produto extends Model
{
    protected $table = 'produtos';
    protected $fillable = [
        'nome',
        'preco',
        'descricao',
        'categoria_id',
    ];

    protected $casts = [
        'preco' => 'decimal:2',
    ];

    public function categoria(): BelongsTo
    {
        return $this->belongsTo(Categoria::class);
    }
}
