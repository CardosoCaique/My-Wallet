<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movimento;
use App\Models\Carteira;
use Exception;

class MovimentacoesController extends Controller
{
    public function store(Request $request)
    {
        try {
            $movement = new Movimento();
            $movement->wallet_id = Carteira::max('id');
            $movement->description = $request->input('description');
            $movement->date = $request->input('date');
            $movement->total = $request->input('total');

            $movement->save();

            return redirect()->route('movement.new');
        } catch (Exception $e) {
            return $e->getMessage();
        }

    }
}
