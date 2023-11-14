<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CarrinhoController extends Controller
{
    //
    public function carrinhoLista(){
        $itens = \Cart::getContent();
        dd($itens);
    }

    public function adicionaCarrinho(Request $request){
        \Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->qtd,
            'attributes' => array(
                'image' => $request->img
            )
        ]);
    }
}
