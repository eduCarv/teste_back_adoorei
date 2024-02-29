<?php

namespace Database\Seeders;

use App\Models\Celular;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CelularesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $celulares = [
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
        
        foreach ($celulares as $celular) {
            Celular::create($celular);
        }
    }
}
