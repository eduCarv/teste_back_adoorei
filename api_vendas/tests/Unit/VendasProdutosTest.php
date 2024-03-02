<?php

namespace Tests\Unit;

use App\Models\VendaProdutos;
use PHPUnit\Framework\TestCase;

class VendasProdutosTest extends TestCase
{
     /** @test*/
     public function check_if_sales_product_column_is_correct()
     {
         $vendasProdutos = new VendaProdutos();
 
         $expected = [
            'sale_id',        
            "product_id",
            "name",
            "price",
            "amount",
         ];                 

         $arrayCompared = array_diff($expected, $vendasProdutos->getFillable());                 
 
         $this->assertEquals(0, count($arrayCompared));
     }     
}
