<?php

namespace Tests\Unit;

use App\Models\Produtos;
use PHPUnit\Framework\TestCase;

class ProdutosTest extends TestCase
{
    /** @test*/
    public function check_if_products_column_is_correct()
    {
        $produtos = new Produtos();

        $expected = [
            'product_id',
            'name',
            'price',
            'description',
        ];

        $arrayCompared = array_diff($expected, $produtos->getFillable());        

        $this->assertEquals(0, count($arrayCompared));
    }
}
