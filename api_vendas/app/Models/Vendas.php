<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendas extends Model
{
    use HasFactory;

    protected $table = 'vendas';    
    protected $primaryKey = 'sale_id';

    protected $fillable = [
        'sale_id',
        'amount',
        'products',
    ];
}
