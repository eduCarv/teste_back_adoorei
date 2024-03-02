<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VendaProdutos;
use App\Models\Vendas;
use Illuminate\Support\Facades\DB;

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

    public function consultarVendas(Request $request)
    {
        $vendas = DB::table('vendas')
            ->leftJoin('venda_produtos', 'vendas.sale_id', '=', 'venda_produtos.sale_id')
            ->select('vendas.sale_id', 'vendas.amount', 'vendas.status', 'venda_produtos.product_id', 'venda_produtos.name as nome', 'venda_produtos.price', 'venda_produtos.amount as quantidade')
            ->get();

        $vendasFormatadas = [];

        foreach ($vendas as $venda) {
            $index = array_search($venda->sale_id, array_column($vendasFormatadas, 'sale_id'));

            if ($index === false) {
                $vendasFormatadas[] = [
                    'sale_id' => $venda->sale_id,
                    'amount' => $venda->amount,
                    'status' => $venda->status,
                    'products' => [
                        [
                            'product_id' => $venda->product_id,
                            'nome' => $venda->nome,
                            'price' => $venda->price,
                            'amount' => $venda->quantidade,
                        ],
                    ],
                ];
            } else {
                $vendasFormatadas[$index]['products'][] = [
                    'product_id' => $venda->product_id,
                    'nome' => $venda->nome,
                    'price' => $venda->price,
                    'amount' => $venda->quantidade,
                ];
            }
        }

        return response()->json(['vendas' => $vendasFormatadas], 200);
    }

    public function consultarVenda($saleId)
    {
        $venda = DB::table('vendas')
            ->leftJoin('venda_produtos', 'vendas.sale_id', '=', 'venda_produtos.sale_id')
            ->where('vendas.sale_id', $saleId)
            ->select('vendas.sale_id', 'vendas.amount', 'vendas.status', 'venda_produtos.product_id', 'venda_produtos.name as nome', 'venda_produtos.price', 'venda_produtos.amount as quantidade')
            ->get();

        if ($venda->isEmpty()) {
            return response()->json(['message' => 'Venda não encontrada'], 404);
        }

        $vendaFormatada = [
            'sale_id' => $venda[0]->sale_id,
            'amount' => $venda[0]->amount,
            'status' => $venda[0]->status,
            'products' => [],
        ];

        foreach ($venda as $item) {
            $vendaFormatada['products'][] = [
                'product_id' => $item->product_id,
                'nome' => $item->nome,
                'price' => $item->price,
                'amount' => $item->quantidade,
            ];
        }

        return response()->json(['venda' => $vendaFormatada], 200);
    }

    public function cancelarVenda($saleId)
    {
        $venda = Vendas::where('sale_id', $saleId)->first();

        if (!$venda) {
            return response()->json(['message' => 'Venda não encontrada'], 404);
        }
        
        if ($venda->status === 'C') {
            return response()->json(['message' => 'A venda já está cancelada'], 422);
        }
    
        if ($venda->status !== 'C') {
            $venda->status = 'C';
            $venda->save();
            return response()->json(['message' => 'Venda cancelada com sucesso'], 200);   
        }

        return response()->json(['message' => 'Algo deu errado'], 200);   
    }


}
