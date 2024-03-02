<?php

use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\VendasController;
use Illuminate\Support\Facades\Route;

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

//Rota Produto
Route::get('/listar-produtos', [ProdutoController::class, 'listarProdutos']);

//Rotas Vendas
Route::post('/cadastrar-venda', [VendasController::class, 'cadastrarVenda']);
Route::get('/consultar-vendas', [VendasController::class, 'consultarVendas']);
Route::get('/consultar-venda/{saleId}', [VendasController::class, 'consultarVenda']);
Route::put('/cancelar-venda/{saleId}', [VendasController::class, 'cancelarVenda']);


Route::get('/', function () {
    return view('welcome');
});
