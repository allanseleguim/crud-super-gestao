<?php

namespace App\Http\Controllers;

use App\Produto;
use App\Unidade;
use App\ProdutoDetalhe;
use App\Item;
use App\Fornecedor;
use App\Pedido;


use Illuminate\Http\Request;


class ProdutoController extends Controller
{
      /**
       * Display a listing of the resource.
       *
       * @return \Illuminate\Http\Response
       */
      public function index(Request $request)
      {

            /* with permite trazer método juntamente das funções de suas relações */
            $produtos = Item::with(['itemDetalhe'])->paginate(10);

            $pedidos = Pedido::all();

            return view('app.produto.index', ['produtos' => $produtos, 'pedidos' => $pedidos, 'request' => $request->all()]);

            /* Relação 1 para 1 manual 
      foreach ($produtos as $key => $produto) {

            //Collection $produtoDetalhe 

            // print_r($produto->getAttributes());
            // echo '<br><br>';

            $produtoDetalhe = ProdutoDetalhe::where('produto_id', $produto->id)->first();

            if (isset($produtoDetalhe)){
                  // print_r($produtoDetalhe->getAttributes());

                  $produtos[$key]['comprimento'] = $produtoDetalhe->comprimento;
                  $produtos[$key]['largura'] = $produtoDetalhe->largura;
                  $produtos[$key]['altura'] = $produtoDetalhe->altura;
            }

            // echo '<hr>';


      }
      */

            //dd($fornecedores);


      }

      /**
       * Show the form for creating a new resource.
       *
       * @return \Illuminate\Http\Response
       */

      // Métdo para exibir o formulário de inserção

      public function create()
      {

            $unidades = Unidade::all();
            $fornecedores = Fornecedor::all();
            return view('app.produto.create', ['unidades' => $unidades, 'fornecedores' => $fornecedores]);
      }

      /**
       * Store a newly created resource in storage.
       *
       * @param  \Illuminate\Http\Request  $request
       * @return \Illuminate\Http\Response
       */


      // Métdo para gravar o registro, recebe request dos campos 

      public function store(Request $request)
      {


            $regras = [
                  'nome' => 'required|min:3|max:40',
                  'descricao' => 'required|min:3|max:2000',
                  'peso' => 'required|integer',
                  'unidade_id' => 'exists:unidades,id',
                  'fornecedor_id' => 'exists:unidades,id'
            ];

            $feedback = [
                  'required' => 'O campo :attribute deve ser preenchido',
                  'nome.min' => 'O campo nome deve ter no mínimo 3 caracteres',
                  'nome.max' => 'O campo nome deve ter no máximo 40 caracteres',
                  'descricao.min' => 'O campo descrição deve ter no mínimo 3 caracteres',
                  'descricao.max' => 'O campo descrição deve ter no máximo 2000 caracteres',
                  'peso.integer' => 'O campo peso deve ser um número inteiro',
                  'unidade_id.exists' => 'A unidade de medida informada não existe',
                  'fornecedor_id.exists' => 'O Fornecededor não existe'

            ];

            $request->validate($regras, $feedback);
            //Sempre definir model correto neste caso ITEM 
            Item::create($request->all());
            return redirect()->route('produto.index');
      }

      /**
       * Display the specified resource.
       *
       * @param  \App\Produto  $produto
       * @return \Illuminate\Http\Response
       */

      // Métdo para listar detalhes de um registro 

      public function show(Produto $produto)
      {
            //dd($produto);
            return view('app.produto.show', ['produto' => $produto]);
      }

      /**
       * Show the form for editing the specified resource.
       *
       * @param  \App\Produto  $produto
       * @return \Illuminate\Http\Response
       */


      // Métdo para apagar exibir o formulário de ediçao do registro, recebe model instânciado 

      public function edit(Produto $produto)
      {

            $unidades = Unidade::all(); //Recuperando as unidades do MODEL, jogando na var para usar no controller, passar parâmetro 
            $fornecedores = Fornecedor::all();
            return view('app.produto.edit', ['produto' => $produto, 'unidades' => $unidades, 'fornecedores' => $fornecedores]);
            //return view('app.produto.create', ['produto' => $produto, 'unidades' => $unidades]);
      }

      /**
       * Update the specified resource in storage.
       *
       * @param  \Illuminate\Http\Request  $request
       * @param  \App\Item  $produto
       * @return \Illuminate\Http\Response
       */


      // Métdo para atualizar o registro, recebe instância do mesmo + campos

      public function update(Request $request, Item $produto)
      {

            $regras = [
                  'nome' => 'required|min:3|max:40',
                  'descricao' => 'required|min:3|max:2000',
                  'peso' => 'required|integer',
                  'unidade_id' => 'exists:unidades,id',
                  'fornecedor_id' => 'exists:unidades,id'
            ];

            $feedback = [
                  'required' => 'O campo :attribute deve ser preenchido',
                  'nome.min' => 'O campo nome deve ter no mínimo 3 caracteres',
                  'nome.max' => 'O campo nome deve ter no máximo 40 caracteres',
                  'descricao.min' => 'O campo descrição deve ter no mínimo 3 caracteres',
                  'descricao.max' => 'O campo descrição deve ter no máximo 2000 caracteres',
                  'peso.integer' => 'O campo peso deve ser um número inteiro',
                  'unidade_id.exists' => 'A unidade de medida informada não existe',
                  'fornecedor_id.exists' => 'O Fornecededor não existe'

            ];

            $request->validate($regras, $feedback);

            //dd($request->all()); //payload dados úteis 
            $produto->update($request->all());   //Efetua update 
            return redirect()->route('produto.show', ['produto' => $produto->id]);
      }

      /**
       * Remove the specified resource from storage.
       *
       * @param  \App\Produto  $produto
       * @return \Illuminate\Http\Response
       */


      // Métdo para apagar o registro, recebe instância do mesmo 
      public function destroy(Produto $produto)
      {
            //echo 'Destroy!';  
            //dd($produto);
            $produto->delete();
            return redirect()->route('produto.index');
      }
}
