<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendaProdutos extends Model
{
    use HasFactory;

    protected $table = 'venda_produtos';    

    protected $fillable = [
        'sale_id',        
        "product_id",
        "name",
        "price",
        "amount",
    ];
}
