<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = ['produto_id', 'quantidade', 'preco_total'];

    public function produto()
    {
        return $this->belongsTo(Produto::class, 'produto_id'); // Relacionamento com Produto
    }
}
