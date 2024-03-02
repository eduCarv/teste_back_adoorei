<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VendaProdutos;
use App\Models\Vendas;

class VendasController extends Controller
{
    public function cadastrarVenda(Request $request)
    {               
        //Assumindo que o front já calculou o total da venda tenho o amount para inserir no cadastro da venda
        //se nao tivesse, bastava um foreach antes no produtcs para pegar e adicionar ali.
                
        $novaVenda = Vendas::create([
            'amount' => $request->input('amount'),
        ]);

        foreach ($request->input('products') as $produto) {
            VendaProdutos::create([
                'sale_id' => $novaVenda->id,
                'product_id' => $produto['product_id'],
                'name' => $produto['name'],
                'price' => $produto['price'],
                'amount' => $produto['amount'],
            ]);
        }        

        return response()->json(['message' => 'Venda cadastrada com sucesso'], 201);
    }
}
