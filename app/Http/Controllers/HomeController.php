<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;
use App\Cliente;
use App\Pedido;
use App\Fornecedor;

class HomeController extends Controller
{
    //
    public function index() {


      $produtos = Produto::paginate(10000);
      $clientes = Cliente::paginate(10000);
      $pedidos = Pedido::paginate(10000);
      $fornecedores = Fornecedor::paginate(10000);
      return view('app.home', compact("produtos", "clientes", "pedidos", "fornecedores"));
      }
}
