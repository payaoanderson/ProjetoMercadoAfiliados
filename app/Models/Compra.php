<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    use HasFactory;

    protected $table = 'sales';  // Tabela no banco de dados

    protected $fillable = [
        'usuario_id',
        'produto_id',
        'quantidade',
        'preco_total',
    ];

    // Relacionamento com o usuário
    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }

    // Relacionamento com o produto
    public function produto()
    {
        return $this->belongsTo(Produto::class, 'produto_id');
    }
}
