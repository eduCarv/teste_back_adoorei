<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */

     //Adicionando exceções a verificação do token csrf para fins de agilidade (ja que eh um teste e nao um api de produçao);
    protected $except = [
        '/cadastrarVenda',
    ];
}
