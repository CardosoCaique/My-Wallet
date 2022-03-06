<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarteirasController;
use App\Http\Controllers\MovimentacoesController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::controller(CarteirasController::class)->prefix('wallet')->group(function(){
    Route::get('current-wallet', 'getWallet')->name('wallet.get-current');
});

Route::controller(MovimentacoesController::class)->prefix('movement')->group(function(){
    Route::post('save', 'store')->name('movement.new');
});
