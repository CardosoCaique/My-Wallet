<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Carteira extends Model
{
    use HasFactory;
    protected $fillable = [
        'period',
        'openning_balance',
        'closed_at',
        'closed',
    ];
    /**
     * Retorna as moviomentações pertecentes a uma carteira
     * @method movements
     * @return object
     */
    public function movements()
    {
        return $this->hasMany(Movimento::class, 'wallet_id');
    }
    /**
     * retorna o saldo da carteira
     * @method getTotal
     * @param  integer   $id
     * @return float
     */
    public function getBalance($id)
    {
        $entry = DB::select("SELECT SUM(total) as total FROM movimentacoes WHERE type = 'entry'");
        $outflow = DB::select("SELECT SUM(total) as total FROM movimentacoes WHERE type != 'entry'");

        $balance = ($entry[0]->total ?? 0) - ($outflow[0]->total ?? 0);

        return number_format($balance,2,",",".");
    }
}
