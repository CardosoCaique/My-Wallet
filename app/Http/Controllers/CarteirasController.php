<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carteira;
use Exception;

class CarteirasController extends Controller
{

    /**
     * Retorna a Certeira em aberto
     * @method getWallet
     * @return string retorna a view com o objeto
     */
    public function getWallet()
    {
        $wallet = Carteira::where('closed', false)
            ->first();
            
        return view('carteiras.show')
            ->with('wallet', $wallet);
    }

    /**
     * Lista todas as carteiras
     * @method show
     * @return string retorna a view com o objeto
     */
    public function show()
    {
        $wallets = Carteira::paginate(10)
            ->orderBy('periodo', 'DESC');

        return view('carteiras.all')
            ->with('wallets', $walltes);
    }
    /**
     * Método responsável por criar um nova carteira
     * @method store
     * @param  Request $request   Guarda as informações do corpo da reuisição
     * @return route
     */
    private static function store(Request $request)
    {
        try {
            $wallet = new Carteira();
            $wallet->period = date('Y-m-d');
            $wallet->openning_balance = $request->input('balance');
            $wallet->save();

            return redirect()->route('wallet.get-current');

        } catch (Exception $e) {

        }
    }
}
