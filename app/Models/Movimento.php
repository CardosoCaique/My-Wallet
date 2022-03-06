<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movimento extends Model
{
    use HasFactory;
    protected $table = 'movimentacoes';
    protected $fillable = [
        'wallet_id',
        'description',
        'date',
        'total',
    ];

    protected function wallet()
    {
        return $this->belongsTo(Carteira::class, 'wallet_id');
    }
}
