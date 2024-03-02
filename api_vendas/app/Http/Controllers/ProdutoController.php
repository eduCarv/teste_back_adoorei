<?php

namespace App\Http\Controllers;

use App\Models\Produtos;

class ProdutoController extends Controller
{
    public function listarProdutos()
    {
        $produtos = Produtos::all();

        return response()->json(['produtos' => $produtos], 200);
    }
}
