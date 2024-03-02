<?php

namespace Tests\Unit;

use App\Models\Vendas;
use PHPUnit\Framework\TestCase;

class VendasTest extends TestCase
{    
     /** @test*/
     public function check_if_sales_column_is_correct()
     {
         $vendas = new Vendas();
 
         $expected = [
             'sale_id',
             'amount',             
             'products',
             'status',
         ];                 

         $arrayCompared = array_diff($expected, $vendas->getFillable());                 
 
         $this->assertEquals(0, count($arrayCompared));
     }     
}
