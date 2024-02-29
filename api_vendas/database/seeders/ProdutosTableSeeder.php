<?php

namespace Database\Seeders;

use App\Models\Produtos;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProdutosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $produtos = [
            [
                "name" => "IPHONE XYZ",
                "price" => 1800,
                "description" => "Lorenzo Ipsulum"
            ],
            [
                "name" => "SAMSUMG S900",
                "price" => 3200,
                "description" => "Lorem ipsum dolor"
            ],
            [
                "name" => "XIAOMI XTZ",
                "price" => 9800,
                "description" => "Lorem ipsum dolor sit amet"
            ]
        ];
        
        foreach ($produtos as $produto) {
            Produtos::create($produto);
        }
    }
}
