<?php

namespace App\Http\Controllers;

class MostraDadosController extends Controller
{
    public function __construct()
    {
        //metodo construtor
    }

    public function exibemsg($id)
    {
        return "Ola mundo, eu sou o Lumen 5.8.<br>Voce digitou o numero: {$id}";
    }
}
